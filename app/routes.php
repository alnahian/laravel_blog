<?php

// model bindings
Route::model('post', 'Post');
Route::model('comment', 'Comment');

// User routes
Route::get('/post/{post}/show', ['as'=>'post.show', 'uses'=>'PostController@showPost']);
Route::post('/post/{post}/comment', ['as'=>'comment.new', 'uses'=>'CommentsController@newComment']);

// Admin routes
Route::group(['prefix'=>'admin','before'=>'auth'], function() {
	Route::get('dash-board', function() {
		$layout= View::make('master');
		$layout->title = "DashBoard";
		$layout->main = View::make('dash')->with('content', 'Hi admin, Welcome to Dashboard!');
		return $layout;
	});
	Route::get('/post/list',['as' => 'post.list', 'uses'=> 'PostController@listPost']);
	Route::get('/post/new', ['as'=> 'post.new','uses'=>'PostController@newPost']);
	Route::get('/post/{post}/edit', ['as'=>'post.edit', 'uses'=>'PostController@editPost']);
	Route::get('/post/{post}/delete', ['as'=>'post.delete', 'uses'=> 'PostController@deletePost']);
	Route::get('/comment/list', ['as'=>'comment.list', 'uses'=>'CommentController@listComment']);
	Route::get('comment/{comment}/show', ['as'=>'comment.show','uses'=>'CommentController@showComment']);
	Route::get('/comment/{comment}/delete', ['as'=>'comment.delete', 'uses'=> 'CommentController@deleteComment']);
	
	Route::post('/post/save', ['as'=> 'post.save', 'uses'=>'PostController@updatePost']);
	Route::post('/comment/{comment}/update', ['as'=>'comment.update', 'uses'=>'CommentController@updateComment']);
});

Route::controller('/', 'BlogController');

/* View Composer */
View::composer('sidebar', function ($view) {
    $view->recentPosts = Post::orderBy('id', 'desc')->take(5)->get();
});

