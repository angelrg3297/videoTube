<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Muestra todos los comentarios.
    public function index()
    {
        try {
            $comentario = Comentario::all();
            return response()->json(array('data' => $comentario, 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('data' => [], 'msg' => 'No hay comentarios disponibles', 'status' => 'false'), 400);
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
            $comentario = new Comentario();
            $comentario->user_id = $request->input('user_id');
            $comentario->video_id = $request->input('video_id');
            $comentario->body = $request->input('body');
            $comentario->save();

            return response()->json(array('data' => $comentario, 'msg' => 'Comentario creado', 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('data' => [], 'msg' => 'Comentario fallido', 'status' => 'false'), 400);
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
    //Buscar comentario por id.
    public function show($id)
    {
        try {
            return $comentario = Comentario::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json(array('msg' => 'Comentario no encontrado', 'status' => 'false'), 400);
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
            $comentario = Comentario::findOrFail($id);

            $comentario->user_id = $request->input('user_id');
            $comentario->video_id = $request->input('video_id');
            $comentario->body = $request->input('body');
            $comentario->save();

            return response()->json(array('msg' => 'Actualizado correctamente', 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('msg' => 'Comentario no actualizado', 'status' => 'false'), 400);
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
            $comentario= Comentario::findOrFail($id);
            $comentario->delete();
            return response()->json(array('msg' => 'Eliminado correctamente', 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('msg' => 'No se ha podido eliminar el comentario', 'status' => 'false'), 400);
        }
    }
}