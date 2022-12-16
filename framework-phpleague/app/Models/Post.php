<?php
namespace Application\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent {
	protected $fillable = ['title', 'body', 'user_id'];

	public function user () {
		return $this->belongsTo(User::class);
	}
}