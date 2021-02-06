<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web','auth']], function() {
    Route::get('/home', function(){
        if (Auth::user()->role_id == 1) {
            return view('users');
        }elseif(Auth::user()->role_id == 2){
            
            return view('cleaner');
        }
    });
    Route::get('/useractivity','JobpostController@index');
    
 });


 


Route::patch('/updatecleaner/{id}','HomeController@update');

Route::post('/postjob','JobpostController@store');
Route::get('/editjobpost/{id}','JobpostController@edit');
Route::patch('/postjob/{id}','JobpostController@update');
Route::delete('/postjob/{id}','JobpostController@destroy');

// display avalable jobs to cleaners
Route::get('/cleanerjobs','JobpostController@indexCleaner');
//show job detail
Route::get('/jobdetail/{id}','JobpostController@cleanerJobDetail');

//applying for a job
Route::post('/apply','JobpostController@application');

//view jobrequest for users
Route::get('/viewrequest','JobpostController@viewJob');

//approve job
Route::patch('/approve/{id}','JobpostController@approve');
Route::patch('/disapprove/{id}','JobpostController@disapprove');

//approved jobs view
Route::get('/approvedjobs','JobpostController@approvedJobs');
