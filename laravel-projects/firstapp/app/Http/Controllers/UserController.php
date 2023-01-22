<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
			return view('homepage-feed');
		} else {
			return view('homepage');
		}
	}
	public function profile(User $user) {
		return view(
			'profilepage',
			[
				'user' => $user,
				'posts' => $user->postsOfUser()->latest()->get(),
			]
		);
	}
	public function adminPage() {
		if (Gate::allows('accessAdminPage'))
			return '<h1>Only admins page</h1>';
		else
			return '<h4>Only admins page</h4>';
	}
}
