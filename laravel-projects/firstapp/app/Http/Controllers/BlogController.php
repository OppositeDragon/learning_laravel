<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller {
	public function createPost() {

		return view('create-post');
	}

	public function storePost(Request $request) {
		$postFields = $request->validate([
			'title' => 'required',
			'body' => 'required'
		]);
		$postFields['title'] = strip_tags($postFields['title']);
		$postFields['body'] = strip_tags($postFields['body']);
		$postFields['user_id'] = auth()->id();
		$newPost =	Post::create($postFields);
		return redirect("/post/{$newPost->id}")->with('success', "New post created successfully");
	}

	public function viewPost(Post $post) {
		$post['body'] = Str::markdown($post->body);
		return view("single-post", ['post' => $post]);
	}
}
