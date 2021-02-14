<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //El index de usuarios sera visto si eres administrador.
    //Ya sea poniendolo en la ruta con el midleware o aqui con un if.
    public function index()
    {
        try {
            $user = User::all();
            return response()->json(array('msg' => $user, 'status' => 'success'), 200);
        } catch (\Exception $e) {                        
            return response()->json(array('msg' => 'No hay registros disponibles', 'status' => 'false'), 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $user = new User();

            $user->role = $request->input('role');
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request ->input('email');
            $user->password = Hash::make(($request->input('password')));
            $user->image = $request->file('image');

            $user->save();

            return response()->json(array('msg' => 'Usuario Insertado', 'status' => 'success'), 200);
        } catch (\Exception $e) {
            return response()->json(array('msg' => 'Registro fallido', 'status' => 'false'), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //mostramos un solo usuario con el id.
     //Sacamos nuestro nombre de usuario.
     //Para mostrar el usuario de uno mismo.
    public function show($id)
    {
        try {
            return $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(array('msg' => 'Usuario no encontrado', 'status' => 'false'), 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);;

            $user->role = $request->input('role');
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request ->input('email');
            $user->password = Hash::make(($request->input('password')));
            $user->image = $request->file('image');

            $user->save();

            return response()->json(array('msg' => 'Usuario Actualizado', 'status' => 'success'), 200);
        } catch (\Exception $e) {
            return response()->json(array('msg' => 'Registro de actualizacion fallido', 'status' => 'false'), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(array('msg' => 'Usuario Eliminado', 'status' => 'success'), 200);
        } catch (\Exception $e) {
            return response()->json(array('msg' => 'Usuario no eliminado', 'status' => 'false'), 400);
        }
    }
    //Creaar metodo que se llame comentarios que pasando el id de usuario te muestre los comentarios que tenga ese usuario.
    //Creaar metodo que se llame videos que pasando el id de usuario te muestre los videos de ese usuario.
}