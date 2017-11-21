<?php

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
	if(Auth::check()){
		return redirect('/main');
	}
	else{
		return redirect('/login');
	}
});

Route::auth();

Route::group(['middleware'=>['auth']], function(){

	Route::get('/home', 'HomeController@index');

	Route::get('/main', 'AdminController@index')->name('main');

	Route::get('/uploadexcel', 'AdminController@uploadExcel')->name('uploadexcel');

	Route::post('/uploadexcelparticipant', ['uses'=>'AdminController@uploadExcelParticipant'])->name('uploadexcelparticipant');

});

