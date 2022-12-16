<?php
namespace Application\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $fillable = ['name', 'email', 'password'];

	public function scopeRandom () {
		return $this->orderByRaw("RAND()")->first();
	}

	public function posts () {
		return $this->hasMany(Post::class);
	}
}