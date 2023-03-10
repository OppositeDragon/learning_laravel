<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller {
	public function storePostAPI(Request $request) {
		$postFields = $request->validate([
			'title' => 'required',
			'body' => 'required'
		]);
		$postFields['title'] = strip_tags($postFields['title']);
		$postFields['body'] = strip_tags($postFields['body']);
		$postFields['user_id'] = auth()->id();
		$newPost =	Post::create($postFields);
		dispatch(new SendEmailJob([
			'user' => auth()->user(),
			'title' => $newPost->title,
		]));	//

		return response(['message' => 'Post created successfully', 'post' => $newPost], 201);
	}
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
		dispatch(new SendEmailJob([
			'user' => auth()->user(),
			'title' => $newPost->title,
		]));	//

		return redirect("/post/{$newPost->id}")->with('success', "New post created successfully");
	}

	public function viewPost(Post $post) {
		$post['body'] = Str::markdown($post->body);
		return view("single-post", ['post' => $post]);
	}
	public function editPostForm(Post $post) {
		return view('edit-post', ['post' => $post]);
	}

	public function updatePost(Post $post, Request $request) {
		$fields = $request->validate([
			'title' => 'required',
			'body' => 'required'
		]);
		$fields['title'] = strip_tags($fields['title']);
		$fields['body'] = strip_tags($fields['body']);
		$post->update($fields);
		return back()->with('success', "Post updated successfully");
	}

	public function search($term) {
		$posts = Post::search($term)->get();
		$posts->load('user:id,username,avatar');
		return $posts;
		//return Post::where('title', 'LIKE', '%' . $term . '%')->orWhere('body', 'LIKE', '%' . $term . '%')->with('user:id,username,avatar')->get();

	}
}
