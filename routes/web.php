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
    //try {
        
      //  DB::connection()->getPdo();
    //} catch (\Exception $e) {
        //throw $th;
      //  die("No se puede conectar a la BD ".$e);
    //}
    return view('welcome');
})->middleware('language');

//Route::get('/home', 'HomeController@index')->name('home');

//creamos una nueva ruta para trabajar con los QUERYS BUILDER
use Illuminate\Support\FacadesDB;
Route::get('/query',function(){
    //OBTENEMOS TODOS LOS REGISTROS DE LA TABALA USUARIOS
    $user=DB::table('users')->get();
    dd($user);

});//eesto devuelve un objeto de tipo builder



//rutas para controladores
//Route::resource('post','PostController');

Auth::routes(['verify'=>true]);
Route::group(['middleware'=>'verified'],function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('post','PostController');
  Route::get('/my/post', 'PostController@myPost')->name('post.my');
});