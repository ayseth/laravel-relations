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

$post = new Post(['title'=>'My first post dfkgdfk', 'body'=>'I love laravel']);

$user->posts()->save($post);

});



Route::get('/', function () {
    return view('welcome');
});
