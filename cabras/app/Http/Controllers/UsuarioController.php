<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $usuario =\DB::table('usuario')
                ->select('usuario.id as id',
                        'usuario.nombre as nombre',
                        'usuario.descripcion as descripcion')
                ->distinct()
                ->get();
            return \Response::json(["usuario"=>$usuario],200);
        } catch(\Exception $e){
            \Log::info('Error getInfo: '.$e);
            return \Response::json(["usuario"=>usuario],500);
            //$e->getMessage()
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->only('usuario');
        \DB::beginTransaction();
        try{
            $data = Usuario::where('Nombre',$request->input('Nombre'))
                ->where('Descripcion',$request->input('Descripcion'))
                ->get();
            if ($data->isEmpty()) {                 
                $Usuario = new Usuario;
                $Usuario->Nombre = $request->input('Nombre');
                $Usuario->Descripcion = $request->input('Descripcion'); 
                $Usuario->save();
                \DB::commit();
                return \Response::json(['store' => true],200);
            }else{
                return \Response::json(["ya existe"],200);
                }
        }catch (\Exception $e) {
            \DB::rollBack();
            \Log::info('Error creating: ' . $e);
            return \Response::json(['store' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function storeFotoPerfil(Request $request)
    {
        $path = $request->file("image")->path();
        $mime = \File::mimeType($path);
        $img = \File::get($path);
        $imagen64 = base64_encode($img);
        try{
            $imagen = \DB::table('imagen')->where('usuarioId',$request->usuarioId)->first();
            if($imagen){
                \DB::table('imagen')
                    ->where('usuarioId',$request->empleadoId)
                    ->update([
                        'fotoPerfil'=>$imagen64,
                        'fotoPerfilMimeType'=>$mime
                    ]);
            }else{
                \DB::table('imagen')
                    ->insert([
                        'empleadoId'=>$request->empleadoId,
                        'fotoPerfil'=>$imagen64,
                        'fotoPerfilMimeType'=>$mime
                    ]); 
            }
            return \Response::json(['image'=>$imagen64,'mime'=>$mime],200);
        } catch(\Exception $e){
            \Log::info("Error upload: ".$e);
            return \Response::json(['upload'=>false],500);
        }
    }
}
