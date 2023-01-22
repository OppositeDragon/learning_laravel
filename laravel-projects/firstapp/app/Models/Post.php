<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
	 protected $fillable = ['title', 'body', 'user_id'];

	 public function userFromPost(){
		 return $this->belongsTo(User::class, 'user_id');
	 }
}
