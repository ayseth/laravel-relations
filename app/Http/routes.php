<?php

use App\User;
use App\Role;
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


/***************************************************************************************************
											INSERT
***************************************************************************************************/
Route::get('/create', function(){
$user = User::find(1);
$role = new Role(['name'=>'Administrator']);      //role is class, where we're injecting

$user->roles()->save($role);

});

/***************************************************************************************************
											INSERT
***************************************************************************************************/

Route::get('/read', function(){
	$user = User::findOrFail(1);


//	dd($user->roles);

	// foreach($user->roles as $role){
	// 	dd($role);
	// }

	foreach($user->roles as $role){
		echo $role->name;
	}


});

/***************************************************************************************************
								UPDATE
***************************************************************************************************/

Route::get('/update', function(){

	$user = User::findOrFail(1);

	if($user->has('roles')){
		foreach($user->roles as $role){
			if($role->name == 'administrator'){
				$role->name = 'subscriber';

				$role->save();

			}
		}
	}

});

/***************************************************************************************************
								DELETE
***************************************************************************************************/

Route::get('/delete', function(){
	$user = User::findOrFail(1);

	// $user->roles()->delete();      //deletes all roles in db
	foreach($user->roles as $role){

		$role->whereId(1)->delete();			//deletes according to condition

	}
	


});

/***************************************************************************************************
								ATTACH ROLE TO USER
***************************************************************************************************/

Route::get('/attach', function(){

	$user = User::findOrFail(1);

	$user->roles()->attach(2);
});









