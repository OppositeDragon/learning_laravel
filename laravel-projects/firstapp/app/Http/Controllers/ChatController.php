<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller {
	public function sendMessage(Request $request) {
		$fields = $request->validate([
			'message' => 'required',
		]);
		$message = trim(strip_tags($fields['message']));
		if (!$message) {
			return response()->noContent();
		}
		broadcast(new ChatMessage(['user' => auth()->user(), 'message' => $message]))->toOthers();
		return response()->noContent();
	}
}
