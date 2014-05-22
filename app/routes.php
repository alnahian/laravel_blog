<?php

Route::model('post', 'Post');

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('post/{post}', function(Post $post)	{
	echo $post->title;
});