<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller {
	public function homePage() {
		//to pass data to view from controller
		$myName = 'Steeven L';
		$listOfThings = ['camera', 'laptop', 'phone'];
		return view(
			'homepage',
			['name' => $myName, 'things' => $listOfThings],
		);
	}
	public function aboutPage() {
		return "<h1>About Page</h1><a href='/'>Back to home</a>";
	}
}
