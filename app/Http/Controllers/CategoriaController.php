<?php

namespace App\Http\Controllers;

use App\tipo;
use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipo::all();
        return view('admin.categoria',compact('tipos'));
    }

    public function getTipo()
    {
      $categoria = DB::table('categorias as cg')
      ->select('cg.id', 'cg.nombre', 'tp.nombre as tipo' ,DB::raw('"" as Opciones'))
      ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
      ->get();
      
      return \DataTables::of($categoria)->make('true');
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
        DB::beginTransaction();
        try {

            $tipo = new tipo;
            $tipo->nombre= $request->nombres;
            $tipo->descripcion = $request->descripcion;
          
            $tipo->save(); 

        DB::commit();
            $message = "Tipo Examen creado correctamente.";
            $status = true;
        } catch (\Exception $e) {
            DB::rollback();
            $message = "Error al crear nuevo Tipo Examen, intentelo de nuevo si el problema persiste comuniquese con el administrador.";
            $status = false;
            $error =$e;
        }
        $response = array(
            "message"=>$message,
            "status"=>$status,
            "error"=>isset($error) ? $error:''
        );

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = DB::table('categorias as cg')
        ->select('cg.*', 'tp.nombre as tipo' )
        ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
        ->where('cg.id',$id)
        ->first();

        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        DB::beginTransaction();
        try {

            $categoria = categoria::find($id);
            $categoria->nombre = $request->editar_nombres;
            $categoria->id_tipo = $request->editar_tipo;
            $categoria->save();

        DB::commit();
            $message = 'Tipo Examen actualizado correctamente';
            $status = true;
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'Error al actualizar Tipo Examen, intentelo de nuevo si el problema persiste comuniquese con el administrador.';
            $status = false;
            $error = $e;
        }
        $response = array(
            "message"=>$message,
            "status"=>$status,
            "error"=>isset($error) ? $error:''
        );
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
