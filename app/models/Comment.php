<?php

class Comment extends Eloquent	{
	public function post()	{
		$this->belongsTo('Post');
	}
}