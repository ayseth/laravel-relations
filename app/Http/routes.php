<?php

use App\User;
use App\Post;

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
/*********************************************************************
					INSERT
**********************************************************************/

Route::get('/create', function(){

$user = User::findOrFail(2);

$post = new Post(['title'=>'My first 2nd dfkgdfk', 'body'=>'I love laravel toooo']);

$user->posts()->save($post);

});

/*********************************************************************
					READ
**********************************************************************/
Route::get('/read', function(){

$user = User::findOrFail(2);

//  dd($user->posts);        //dd = die dump, shows if collecton or object  -------returns collection

//  dd($user); //returns object

foreach($user->posts as $post){
	echo $post->title . "<br>";
}

});



/********************************************************************
					HOME
**********************************************************************/
Route::get('/', function () {
    return view('welcome');
});
