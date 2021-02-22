<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Devuelve todos los videos.
    //Ruta publica.
    public function index()
    {
        try{
            $videos = Video::all();
            return response()->json(array('data' => $videos, 'status' => 'success'), 200);
        } catch (\Throwable $th){
            return response()->json(array( 'data' => [], 'msg' => 'No hay registros disponibles', 'status' => 'false'), 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Crea nuevo video.
    public function create(Request $request)
    {
        // TODO: Validar

        try {
            $video = new Video();
            $video->user_id = $request->input('user_id');
            $video->title = $request->input('title');
            $video->description = $request->input('description');
            $video->status = 1;
            $video->save();
        } catch (\Throwable $th) {
            //throw $th;
        }

        // Upload Archivos

        try {
            //Imagen
            $image = $request->file('image');
            $path = $image->store('public');
            $video->image = $path;

            //Video
            $archivoVideo = $request->file('video_path');
            $path = $archivoVideo->store('public');
            $video->video_path = $path;
                       
            $video->save();

            return response()->json(array('data' => $video, 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('data' => [], 'msg' => 'Registro fallido', 'status' => 'false'), 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Prueba video David
    public function store(Request $request)
    {
        /*$video = new Video();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $path = $file->store('public');

            $video->name=$request->name;
            $video->image = Storage::put('/videos', $file);
            $video->save();

            return response()->json(["msg"=>"Imagen guardada correctamente"]);
        }else{
            return response()->json(["msg"=>"Error"]);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Busca cualquier video con su id.
    public function show($id)
    {
        try {
            return $video = Video::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json(array('msg' => 'No se encontro video con ese id', 'status' => 'false'), 400);
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
            $video = Video::findOrFail($id);

            $video->user_id = $request->input('user_id');
            $video->title = $request->input('title');
            $video->description = $request->input('description');
            $video->status = 1;
            $video->save();
        } catch (\Throwable $th) {
            //throw $th;
        }

        // Upload Archivos

        try {
            //Imagen
            $image = $request->file('image');
            $path = $image->store('public');
            $video->image = $path;

            //Video
            $archivoVideo = $request->file('video_path');
            $path = $archivoVideo->store('public');
            $video->video_path = $path;            
            $video->save();

            return response()->json(array('data' => $video, 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('data' => [], 'msg' => 'Actualizacion fallida', 'status' => 'false'), 400);
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
            $video= Video::findOrFail($id);
            $video->delete();
            return response()->json(array('msg' => 'Eliminado correctamente', 'status' => 'success'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('msg' => 'No se ha podido eliminar el video', 'status' => 'false'), 400);
        }
    }

    //Creaar metodo que se llame comentarios que pasando el id de video te muestre los comentarios que haya en ese video.
}
