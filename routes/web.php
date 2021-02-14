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
    return view('welcome')->name('mainhome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('mainhome');
Route::get('department/{id}', 'HomeController@departmentWise')->name('departmentwiseShowPage');
Route::get('/search' , 'HomeController@search')->name('search');

Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']],
function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('student', 'StudentController');

});

Route::group([ 'as'=>'SubAdmin.', 'prefix'=>'SubAdmin', 'namespace'=>'SubAdmin', 'middleware'=>['auth','SubAdmin']],
function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

View::composer('layouts.frontend.partial.header', function($view){
    $departments = App\Department::latest()->get();
    $view->with('departments', $departments);
});