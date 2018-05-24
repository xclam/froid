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

Route::get('/', function () 
{
    return view('index');
});

Route::resources([
    'customer' => 'CustomerController',
]);

Route::resources([
    'machine' => 'MachineController',
]);

Route::resources([
    'report' => 'ReportController',
]);

// Route::get( '/machine/create', 'MachineController@create' );
// Route::get( '/machine', 'MachineController@index' );
// Route::get( '/machine/{machine}', 'MachineController@show' );
// Route::post( '/machine', 'MachineController@store' );


// Route::get( '/report', 'ReportController@index' );
Route::get('pdfview',array('as'=>'pdfview','uses'=>'ReportController@pdfview'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
