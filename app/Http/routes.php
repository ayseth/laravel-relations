<?php
use App\Post;
use App\tag;
use App\Video;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*************************************************************************************************8
						CREATE
****************************************************************************************************/
Route::get('/create', function(){

$post = Post::create(['name'=>'My first pst']);

$tag1 = Tag::find(1);

$post->tags()->save($tag1);

$video = Video::create(['name'=>'My first vid.mov']);

$tag2 = Tag::find(2);

$video->tags()->save($tag2);


});

/*************************************************************************************************
						READ
****************************************************************************************************/
Route::get('/read', function(){
	$post = Post::findOrFail(1);

	foreach($post->tags as $tag){

		echo $tag;

	}


});

/*************************************************************************************************
						UPDATE
****************************************************************************************************/

Route::get('/update', function(){


	$post = Post::findOrFail(1);

	foreach($post->tags as $tag){

		return $tag->whereName('PHP')->update(['name'=>'PHoo']);

	}


});


Route::get('/update2 ', function(){

	
	$post = Post::findOrFail(1);

	$tag = Tag::find(2);
	$post->tags()->save($tag);

	


});

