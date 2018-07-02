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
// \URL::forceScheme('https'); 

Route::get('/', 'HomeController@index');

Route::get('/test', 'HomeController@test');

Route::get('/site/machine/list', 'SiteController@list_machine');

Route::get('/site/ajaxcreate/{id}', [
	'as' => 'site.ajaxcreate',
	'uses' => 'SiteController@ajaxcreate' 
]);

Route::get('/site/ajaxremove/{id}', [
	'as' => 'site.ajaxcreate',
	'uses' => 'SiteController@ajaxremove' 
]);

Route::get('/site/{id}', 'SiteController@get_site');




Route::get('/customer/site/list', 'CustomerController@list_site');
Route::get('/customer/machine/list', 'CustomerController@list_machine');
Route::resources([
    'customer' => 'CustomerController',
]);

Route::resources([
    'site' => 'SiteController',
]);
Route::put( '/site/ajaxupdate/{site}', [
	'as' => 'site.ajaxupdate',
	'uses' => 'SiteController@ajaxupdate' 
]);
Route::post( '/site/ajaxstore', [
	'as' => 'site.ajaxstore',
	'uses' => 'SiteController@ajaxstore' 
]);

Route::resources([
    'machine' => 'MachineController',
]);

Route::get( '/report/step-{step}', 'ReportController@step' );
Route::get( '/report/step-{step}/{report}', 'ReportController@step' );
Route::post( '/report/step-{step}', 'ReportController@step' );
Route::get( '/report/validate/{report}', 'ReportController@validate_report' );
Route::get( '/report/cri', 'ReportController@cri_view' );
Route::get( '/report/photo', 'ReportController@photo' );
Route::post( '/report/camera/add', 'ReportController@camera_add' );
Route::resources([
    'report' => 'ReportController',
]);



Route::resources([
    'user' => 'UserController',
]);

Route::resources([
    'role' => 'RoleController',
]);

Route::resources([
    'fluid' => 'FluidController',
]);

// Route::get( '/machine/create', 'MachineController@create' );
// Route::get( '/machine', 'MachineController@index' );
// Route::get( '/machine/{machine}', 'MachineController@show' );
// Route::post( '/machine', 'MachineController@store' );


// Route::get( '/report', 'ReportController@index' );
Route::get('pdfview',array('as'=>'pdfview','uses'=>'ReportController@pdfview'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/config', 'HomeController@config');
Route::get('/config/modifycpy', 'HomeController@modifycpy');
Route::put('/config/update-cpy/{company}', 'HomeController@updatecpy');

Route::get('/report/pdf/get-fields', 'ReportController@pdffields');
