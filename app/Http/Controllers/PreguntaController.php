<?php

namespace App\Http\Controllers;

use App\pregunta;
use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categorias = categoria::all();
        //return $categoria;
        return view('admin.preguntas',compact('categorias'));
    }

    public function getTipo()
    {
      $categoria = DB::table('preguntas as pre')
      ->select('pre.id', 'pre.numero','pre.enunciado','pre.calificacion','pre.clave', 'ct.nombre as categoria' ,DB::raw('"" as Opciones'))
      ->join('categorias as ct', 'ct.id', '=', 'pre.id_categoria')
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
        //return $request;
        DB::beginTransaction();
        try {

            $pregunta = new pregunta;

            $pregunta->numero = intval($request->numero);
            $pregunta->enunciado = $request->enunciado;
            $pregunta->calificacion = $request->calificacion;
            $pregunta->clave = intval($request->clave);
            $pregunta->id_categoria = $request->categoria;
          
            $pregunta->save(); 

        DB::commit();
            $message = "Categoria creado correctamente.";
            $status = true;
        } catch (\Exception $e) {
            DB::rollback();
            $message = "Error al crear nueva Categoria, intentelo de nuevo si el problema persiste comuniquese con el administrador.";
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
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = pregunta::where("id",$id)->first();

         return response()->json($pregunta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        DB::beginTransaction();
        try {

            $pregunta = pregunta::find($id);
            $pregunta->numero = intval($request->editar_numero);
            $pregunta->enunciado = $request->editar_enunciado;
            $pregunta->calificacion = $request->editar_calificacion;
            $pregunta->clave = intval($request->editar_clave);
            $pregunta->id_categoria = $request->editar_categoria;
            $pregunta->save();

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
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(pregunta $pregunta)
    {
        //
    }
}
