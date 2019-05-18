<?php

use App\User;
use App\Address;

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

/************************************************************************
							INSERT
************************************************************************/

Route::get('/insert', function(){
	$user = User::findOrFail(1);

	$address = new Address(['name'=>'333 ABC London UK']);

	$user->address()->save($address);    //save will take instance, here addess is instance

});

/************************************************************************
							UPDATE
************************************************************************/

Route::get('/update', function(){

	$address = Address::whereUserId(1)->first();
	$address->name = "ABB Update Bangor UK";

	$address->save();

	//if there's more than one record this will update them all so a second constraint is needed to update the required field
});

/************************************************************************
							READ
************************************************************************/

Route::get('/read', function(){
$user = User::findOrFail(1);

echo $user->address->name;
});


