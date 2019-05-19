<?php
use App\Staff;
use App\Photo;


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

/********************************************************************************
			Create
*********************************************************************************/

Route::get('/create', function(){

$staff = Staff::find(1);

$staff->photos()->create(['path'=>'example.jpg']);

});

/********************************************************************************
			READ
*********************************************************************************/

Route::get('/read', function(){

$staff = Staff::findOrFail(1);

foreach($staff->photos as $photo){
	return $photo->path;


}


});

/********************************************************************************
			UPDATE
*********************************************************************************/

Route::get('/update', function(){

$staff = Staff::findOrFail(1);

$photo = $staff->photos()->whereId(1)->first();

$photo->path = "Update example glg.jpg";
$photo->save();


});

/********************************************************************************
			DELETE
*********************************************************************************/

Route::get('/delete', function(){

$staff = Staff::findOrFail(1);

// $staff->photos()->whereName('zzz.jpg')->delete();

$staff->photos()->delete();


});

/********************************************************************************
			ASSIGN
*********************************************************************************/

Route::get('/assign', function(){

$staff = Staff::findOrFail(1);

$photo = Photo::findOrFail(3);

$staff->photos()->save($photo);

});

/********************************************************************************
			UN-ASSIGN
*********************************************************************************/
Route::get('/unassign', function(){

$staff = Staff::findOrFail(1);

$photo = Photo::findOrFail(3);

$staff->photos()->whereId(4)->update(['imageable_id'=>'', 'imageable_type'=>'']);

});



