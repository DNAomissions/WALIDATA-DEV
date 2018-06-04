<?php

use Illuminate\Http\Request;
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
    return view('auth.login');
});

// Route::post('/add', 'PostController');

Route::resource('/dashboard', 'PostsController');

Auth::routes();
//masterkarakteristik
Route::Resource('/menu','MenuController');
Route::post('/menu/update/{id}','MenuController@update');
Route::get('/menu/{id}/delete','MenuController@destroy');
//links
Route::get('/links/link','MenuController@index_links');
Route::get('/links/create','MenuController@create_link');
Route::get('/links/{id}/edit','MenuController@edit_links');
Route::post('/links/tambah','MenuController@store_links');
Route::post('/links/update/{id}','MenuController@update_links');
Route::get('/links/{id}/delete','MenuController@destroy_links');
Route::get('/links/history','MenuController@all_links');
Route::get('show/{id}','MenuController@get_link');
Route::post('update_link','MenuController@update_links_stat');
//user
Route::get('/user','MenuController@index_user');
Route::get('/user/create','MenuController@create_user');
Route::get('/user/{id}/edit','MenuController@edit_user');
Route::post('/user/tambah','MenuController@store_user');
Route::post('/user/update/{id}','MenuController@update_user');
Route::get('/user/{id}/delete','MenuController@destroy_user');
//Master user
Route::get('/master_menu',function(){
  $menuuser_result = DB::table('users')->paginate(10);
  return view('menu.master_menu',compact('menuuser_result'));
});
Route::get('/master_menu/{id}',function($id){
  $usermenu_result = DB::table('users')->find($id);
  return view('menu.master_menu_edit',compact('usermenu_result'));
});
Route::post('/master_menu/{id}',function($id, Request $request){
  $users = DB::table('users')->find($id);
  $daftar_menu = implode('`',$request->menu_user);
  try {
    DB::unprepared("UPDATE users SET daftar_menu = '$daftar_menu' WHERE id = '$id'");
  } catch (\Exception $e) {
    return response()->json($e);
  }
  return redirect()->to('/master_menu');
});


;
