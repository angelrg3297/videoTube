<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * 
     * @param Request Request http request object
     * 
     * @return json
     */
    public function login(Request $request)
    {
        $user = null;        
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json('Usuario o contraseña invalidos', 400);// Bad request
        }

        //oK encontre el usuario TODO retornan el token
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json(['user'=>auth()->user(), 'access_token'=>$accessToken]);
    }

    /**
     * Registro
     * 
     * @param Request $request
     * @return json
     */
    public function register(Request $request)
    {
        
        $request->role = "user";  //Todo el mundo que se registre es user normal por defecto.  
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:70',
            'surname' => 'required|max:70',
            'email' => 'email|required',
            'password' => 'required|confirmed',
            'role' => 'max:120',
            'image' => 'max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'No es posible realizar el registro', 'status' => 400, 'errors' => $validator->errors()]);
        }

        try {
            $user = new User();
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user->create($data);
            $accessToken = $user->createToken('authToken')->accessToken;
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json(['user' => null, 'acces_token' => null, 'status' => 500, 'msg' => 'No se pudo crear el usuario']);
        }  
        return response()->json(['user' => $user, 'acces_token' => $accessToken, 'status' => 201]);
    }

    /*public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['msg' => 'Usuario desconectado', 'status' => 200]);
    }*/
}