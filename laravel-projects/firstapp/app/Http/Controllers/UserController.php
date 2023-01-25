<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {

	public function register(Request $request) {
		$inputData = $request->validate([
			'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username'),],
			'email' => ['required', 'email', Rule::unique('users', 'email'),],
			'password' => ['required', 'min:8', 'confirmed',],
		]);
		$inputData['password'] = bcrypt($inputData['password']);
		$userData = 	User::create($inputData);
		auth()->login($userData);
		return redirect('/')->with('success', 'You have been registered.');
	}

	public function login(Request $request) {
		$inputData = $request->validate([
			'loginusername' => ['required',],
			'loginpassword' => ['required',],
		]);
		if (auth()->attempt([
			'username' => $inputData['loginusername'],
			'password' => $inputData['loginpassword'],
		],)) {
			$request->session()->regenerate();
			return redirect('/')->with('success', 'You have successfully logged in.');
		} else {
			return redirect('/')->with('faillogin', 'Invalid login credentials.');
		}
	}

	public function logout(Request $request) {
		auth()->logout();

		return redirect('/')->with('success', 'You have been logged out.');
	}
	public function showHomePage() {
		if (auth()->check()) {
			return view('homepage-feed', ['posts' => auth()->user()->feedPosts()->latest()->paginate(4)]);
		} else {
			$postCount=Cache::remenber('postCount', 60, function(){
				return Post::count();
			});
			return view('homepage',['postCount'=>$postCount]);
		}
	}
	public function profile(User $user) {
		$this->sharedProfileData($user);
		return view(
			'profilepage',
			['posts' => $user->postsOfUser()->latest()->get()]
		);
	}
	public function adminPage() {
		if (Gate::allows('accessAdminPage'))
			return '<h1>Only admins page</h1>';
		else
			return '<h4>Only admins page</h4>';
	}
	public function manageAvatarForm() {
		return view('manage-avatar-form');
	}
	public function storeAvatar(Request $request) {
		$request->validate([
			'avatar' => 'required|image|max:3000',
		]);
		$rawImg = Image::make($request->file('avatar'))->fit(256)->encode('jpg');

		$user = auth()->user();
		$filename = $user->id . '-' . uniqid() . '.jpg';

		Storage::put('public/avatars/' . $filename, $rawImg);
		$oldAvatar = $user->avatar;
		$user->avatar = $filename;
		$user->save();
		if ($oldAvatar != "/fallback-avatar.jpg") {
			Storage::delete(str_replace("/storage", "public", $oldAvatar));
		}
		return redirect("profile/{$user->username}")->with('success', 'Avatar updated.');
	}
	public function profileFollowers(User $user) {
		$this->sharedProfileData($user);
		return view(
			'profile-followers',
			['followers' => $user->followed()->latest()->get(),]
		);
	}
	public function profileFollowing(User $user) {
		$this->sharedProfileData($user);
		return view(
			'profile-following',
			['following' => $user->following()->latest()->get(),]
		);
	}

	private function sharedProfileData($user) {
		$isFollowing = 0;
		if (auth()->check()) {
			$isFollowing = Follow::where([
				['user_id', '=', auth()->user()->id],
				['followeduser', '=', $user->id]
			],)->count();
		}
		View::share('sharedData', [
			'user' => $user,
			'isFollowing' => $isFollowing,
			'posts' => $user->postsOfUser()->latest()->get(),
			'followersCount' => $user->followed()->count(),
			'followingCount' => $user->following()->count(),
		]);
	}
}
