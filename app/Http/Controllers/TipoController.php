<?php

namespace App\Http\Controllers;

use App\tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tipo');
    }

    public function getTipo()
    {
      $tipo = DB::table('tipos as tp')
      ->select('tp.id', 'tp.nombre', DB::raw('"" as Opciones'))
      ->get();
      
      return \DataTables::of($tipo)->make('true');
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

        //return $request;
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
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = tipo::where("id",$id)->first();

         return response()->json($tipo);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        DB::beginTransaction();
        try {

            $tipo = tipo::find($id);
            $tipo->nombre = $request->editar_nombres;
            $tipo->save();

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
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo $tipo)
    {
        //
    }
}
