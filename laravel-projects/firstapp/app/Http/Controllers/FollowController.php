<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller {
	public function assignFollower(User $user) {
		//cant follow self
		if ($user->id == auth()->user()->id) {
			return back()->with('fail', 'Cannot follow self');
		}
		//cant follow if already following
		$existFollow = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]],)->count();
		if ($existFollow) {
			return back()->with('fail', 'Already following');
		}
		$newFollow = new Follow;
		$newFollow->user_id = auth()->user()->id;
		$newFollow->followeduser = $user->id;
		$newFollow->save();
		return	back()->with('success', 'Followed user');
	}
	public function unassignFollower(User $user) {
		Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id],])->delete();
		return back()->with('success', 'Unfollowed user');
	}
}
