<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
			return redirect('/')->with('success', 'You have been logged in.');
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
}
