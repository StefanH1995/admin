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

use App\Notifications\ResetNotification;

Auth::routes();

/** All */
Route::group(['middleware'=>'auth'],function(){
	Route::get('/',['as'=>'dashboard','uses'=>'DashboardController@index']);
	Route::get('/home',['as'=>'dashboard','uses'=>'DashboardController@index']);
	// Route::get('/typography',['as'=>'typography','uses'=>'TypographyController@index']);
	// Route::get('/helper',['as'=>'helper','uses'=>'HelperController@index']);
	// Route::get('/widget',['as'=>'widget','uses'=>'WidgetController@index']);
	// Route::get('/table',['as'=>'table','uses'=>'TableController@index']);
	// Route::get('/media',['as'=>'media','uses'=>'MediaController@index']);
	// Route::get('/chart',['as'=>'chart','uses'=>'ChartController@index']);

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	
/** Service */ 
	Route::get('/service',['as'=>'service','uses'=>'ServiceController@index']);
	Route::get('/service/create/',['as'=>'service_create','uses'=>'ServiceController@create']);
	Route::post('/service/store',['as'=>'service_store','uses'=>'ServiceController@store']);
	Route::get('/service/show/{service}',['as'=>'service_show','uses'=>'ServiceController@show']);
	Route::post('/service/search',['as'=>'service_raport_zilnic','uses'=>'ServiceController@raportZilnicRequest']);


/** Reglarea */
	Route::get('/reglarea',['as'=>'reglarea','uses'=>'ReglareaUnghiuluiController@index']);
	Route::get('/reglarea/create/',['as'=>'reglarea_create','uses'=>'ReglareaUnghiuluiController@create']);
	Route::post('/reglarea/store',['as'=>'reglarea_store','uses'=>'ReglareaUnghiuluiController@store']);
	Route::get('/reglarea/show/{reglarea}',['as'=>'reglarea_show','uses'=>'ReglareaUnghiuluiController@show']);
	Route::post('/reglarea/search',['as'=>'reglarea_raport_zilnic','uses'=>'ReglareaUnghiuluiController@raportZilnicRequest']);
	

/** Vulcanizare */
	Route::get('/vulcanizare/',['as'=>'vulcanizare','uses'=>'VulcanizareController@index']);
	Route::get('/vulcanizare/create',['as'=>'vulcanizare_create','uses'=>'VulcanizareController@create']);
	Route::post('/vulcanizare/store',['as'=>'vulcanizare_store','uses'=>'VulcanizareController@store']);
	Route::get('/vulcanizare/show/{vulcanizare}',['as'=>'vulcanizare_show','uses'=>'VulcanizareController@show']);
	Route::post('/vulcanizare/search',['as'=>'vulcanizare_raport_zilnic','uses'=>'VulcanizareController@raportZilnicRequest']);
   

/** Mecanic */
	Route::get('/mecanic',['as'=>'mecanic','uses'=>'MecanicController@index']);
	Route::get('/mecanic/raport-zilnic/{mecanic}',['as'=>'mecanic_raport_zilnic','uses'=>'MecanicController@raportZilnic']);
	Route::post('/mecanic/raport-zilnic/{mecanic}',['as'=>'mecanic_raport_zilnic','uses'=>'MecanicController@raportZilnicRequest']);

/** Vulcanizator */ 
	Route::get('/vulcanizator',['as'=>'vulcanizator','uses'=>'VulcanizatorController@index']);
	Route::get('/vulcanizator/raport-zilnic/{vulcanizator}',['as'=>'vulcanizator_raport_zilnic','uses'=>'VulcanizatorController@raportZilnic']);
	Route::post('/vulcanizator/raport-zilnic/{vulcanizator}',['as'=>'vulcanizator_raport_zilnic','uses'=>'VulcanizatorController@raportZilnicRequest']);

/** Reglarea Mecanic */
	Route::get('/reglarea-mecanic/raport-zilnic/{reglareaMecanic}',['as'=>'reglarea_mecanic_raport_zilnic','uses'=>'ReglareaMecanicController@raportZilnic']);
	Route::post('/reglarea-mecanic/raport-zilnic/{mecanic}',['as'=>'reglarea_mecanic_raport_zilnic','uses'=>'ReglareaMecanicController@raportZilnicRequest']);
	Route::get('/reglarea-mecanic',['as'=>'reglarea_mecanic','uses'=>'ReglareaMecanicController@index']);

/** Rapoarte **/
	Route::get('/raport', ['as'=>'raport_zilnic','uses'=> 'RapoarteController@index']);


	Route::post('/raport/search',['as'=>'raport_zilnic_search','uses'=>'RapoarteController@raportZilnicRequest']);


/** ---------- ADMIN ONLY---------------------------------------------------------------------------------------- **/
	Route::group(['middleware'=>'admin'],function(){

/** Service */ 
		Route::get('/service/edit/{parent}',['as'=>'service_edit','uses'=>'ServiceController@edit']);
		Route::put('/service/update/{parent}/{beneficiar}', 'ServiceController@update');
		Route::get('/service/destroy/{parent}', 'ServiceController@destroy');

/** Reglarea */
		Route::get('/reglarea/edit/{reglarea}',['as'=>'reglarea_edit','uses'=>'ReglareaUnghiuluiController@edit']);
		Route::put('/reglarea/update/{reglarea}/{beneficiar}', 'ReglareaUnghiuluiController@update');
		Route::get('/reglarea/destroy/{reglarea_unghiului}', 'ReglareaUnghiuluiController@destroy');
	
/** Vulcanizare */
		Route::get('/vulcanizare/edit/{vulcanizare}',['as'=>'vulcanizare_edit','uses'=>'VulcanizareController@edit']);
		Route::put('/vulcanizare/update/{vulcanizare}/{beneficiar}', 'VulcanizareController@update');
		Route::get('/vulcanizare/destroy/{vulcanizare}', 'VulcanizareController@destroy');

/** Mecanic */
		Route::get('/mecanic/create',['as'=>'mecanic_create','uses'=>'MecanicController@create']);
		Route::post('/mecanic/store',['as'=>'mecanic_store','uses'=>'MecanicController@store']);

/** Vulcanizator */ 
		Route::get('/vulcanizator/create/',['as'=>'vulcanizator_create','uses'=>'VulcanizatorController@create']);
		Route::post('/vulcanizator/store/',['as'=>'vulcanizator_store','uses'=>'VulcanizatorController@store']);

/** Reglarea Mecanic */
		Route::get('/reglarea-mecanic/create',['as'=>'reglarea_mecanic_create','uses'=>'ReglareaMecanicController@create']);
		Route::post('/reglarea-mecanic/store',['as'=>'reglarea_mecanic_store','uses'=>'ReglareaMecanicController@store']);
		

		Route::get('/deleted', ['as'=>'deleted','uses'=>'ServiceController@deleted']);
		Route::get('/compare-deleted-service/{deletedParent}', ['as'=>'compare-deleted-service','uses'=>'ServiceController@compareDeletedService']);
		Route::get('/compare-deleted-reglarea/{deletedReglarea}', ['as'=>'compare-deleted-reglarea','uses'=>'ServiceController@compareDeletedReglarea']);
		Route::get('/compare-deleted-vulcanizare/{deletedVulcanizare}', ['as'=>'compare-deleted-vulcanizare','uses'=>'ServiceController@compareDeletedVulcanizare']);


		});
});
