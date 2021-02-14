<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Publicas
Route::get('video', 'App\Http\Controllers\VideoController@index');
// [POST] http://videotube.com/api/login
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('registro', 'App\Http\Controllers\Api\AuthController@register', function(Request $request) {});


// Privada
Route::post('video', 'App\Http\Controllers\VideoController@create');//->middleware('logged');

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



    //Route::resource('user/', 'App\Http\Controllers\UsersController');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user/index', 'App\Http\Controllers\UsersController@index')->middleware('api:admin');
        //Route::post('user/store', 'App\Http\Controllers\UsersController@store');
        Route::get('user/show/{id}', 'App\Http\Controllers\UsersController@show');
        Route::put('user/create/{id}', 'App\Http\Controllers\UsersController@create')->middleware('api:admin');
        Route::put('user/update/{id}', 'App\Http\Controllers\UsersController@update')->middleware('api:admin');
        Route::delete('user/destroy/{id}', 'App\Http\Controllers\UsersController@destroy')->middleware('api:admin');
    });

    //Route::resource('comentarios/', 'App\Http\Controllers\ComentariosController');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('comentarios/index', 'App\Http\Controllers\ComentariosController@index');
        Route::post('comentarios/store', 'App\Http\Controllers\ComentariosController@store');
        Route::get('comentarios/show/{id}', 'App\Http\Controllers\ComentariosController@show');
        Route::put('comentarios/update/{id}', 'App\Http\Controllers\ComentariosController@update');
        Route::delete('comentarios/destroy/{id}', 'App\Http\Controllers\ComentariosController@destroy');
    });

    //Route::resource('/', 'App\Http\Controllers\VideosController');
    Route::group(['middleware' => 'admin'], function(){
        Route::get('index', 'App\Http\Controllers\VideosController@index');
        //Route::post('store', 'App\Http\Controllers\VideosController@store');
        Route::get('show/{id}', 'App\Http\Controllers\VideosController@show');
        Route::put('update/{id}', 'App\Http\Controllers\VideosController@update');
        Route::delete('destroy/{id}', 'App\Http\Controllers\VideosController@destroy');
    });

//RELACIONES MODELO VIDEO CON TABLAS

    //Usuario de un video --> 1:1
    Route::get('/videoUser/{video_id}', function($user_id){
        //Buscamos el video 1 y cual es el nombre del usuario que lo ha subido.
        $user=App\Models\Video::find(1)->usuario->name;
        return response()->json($user);
    });

//RELACIONES MODELO USUARIO CON TABLAS
    //Todos los videos de un usuario --> 1:N
    Route::get('/userVideo/{user_id}', function($user_id){
        $videos=App\Models\User::find($user_id)->videos->title;
        return response()->json($videos);
    });

*/