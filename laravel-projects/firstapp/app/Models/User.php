<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Follow;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'username',
		'email',
		'password',
	];
	protected function avatar(): Attribute {
		return Attribute::make(get: function ($value) {
			return $value ? '/storage/avatars/' . $value : '/fallback-avatar.jpg';
		});
	}

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function postsOfUser() {
		return $this->hasMany(Post::class, 'user_id');
	}
	public function followed() {
		return $this->hasMany(Follow::class, 'followeduser');
	}
	public function following() {
		return $this->hasMany(Follow::class, 'user_id');
	}
	public function feedPosts() {
		//arguments on te hasManyThrough:
		//1 - Table on the other side of the relationship
		//2 - Table on the middle of the relationship
		//3 - Foreign key on the middle table
		//4 - Foreign key on the other side of the relationship
		//5 - Local key on the current table
		//6 - Local key on the middle table
		return $this->hasManyThrough(Post::class, Follow::class, 'user_id', 'user_id', 'id', 'followeduser');
	}
}
