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
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('registro', 'App\Http\Controllers\Api\AuthController@register', function(Request $request) {});


// Privada
//Route::post('video', 'App\Http\Controllers\VideoController@create');//->middleware('logged');


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

    //Route::resource('user/', 'App\Http\Controllers\UsersController');
        Route::get('user/index', 'App\Http\Controllers\UsersController@index')->middleware('admin');
        //Route::post('user/store', 'App\Http\Controllers\UsersController@store');
        Route::get('user/show/{id}', 'App\Http\Controllers\UsersController@show')->middleware('logged');
        Route::put('user/create', 'App\Http\Controllers\UsersController@create')->middleware('admin');
        Route::put('user/update/{id}', 'App\Http\Controllers\UsersController@update')->middleware('admin');
        Route::delete('user/destroy/{id}', 'App\Http\Controllers\UsersController@destroy')->middleware('admin');

    //Route::resource('comentario/', 'App\Http\Controllers\ComentariosController');
        Route::get('comentario/index', 'App\Http\Controllers\ComentarioController@index');
        Route::put('comentario/create', 'App\Http\Controllers\ComentarioController@create')->middleware('logged');
        //::post('comentario/store', 'App\Http\Controllers\ComentarioController@store');
        Route::get('comentario/show/{id}', 'App\Http\Controllers\ComentarioController@show')->middleware('logged');
        Route::put('comentario/update/{id}', 'App\Http\Controllers\ComentarioController@update')->middleware('logged');
        Route::delete('comentario/destroy/{id}', 'App\Http\Controllers\ComentarioController@destroy')->middleware('admin');

    //Route::resource('/', 'App\Http\Controllers\VideosController');
        Route::get('index', 'App\Http\Controllers\VideoController@index');
        Route::put('create', 'App\Http\Controllers\VideoController@create')->middleware('logged');
        //Route::post('store', 'App\Http\Controllers\VideoController@store');
        Route::get('show/{id}', 'App\Http\Controllers\VideoController@show')->middleware('logged');
        Route::put('update/{id}', 'App\Http\Controllers\VideoController@update')->middleware('logged');
        Route::delete('destroy/{id}', 'App\Http\Controllers\VideoController@destroy')->middleware('admin');

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