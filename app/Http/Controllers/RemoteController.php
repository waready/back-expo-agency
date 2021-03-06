<?php

namespace App\Http\Controllers;

use App\pregunta;
use App\respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RemoteController extends Controller
{
  private $dateTime;
    private $dateTimePartial;
    public function __construct()
    {
        $this->middleware('auth');

        date_default_timezone_set("America/Lima");//Zona horaria de Peru
        $this->dateTime = date("Y-m-d H:i:s");
        $this->dateTimePartial = date("m-Y");

    }

  public function preguntasLista(Request $request)
  {

    /**estado --- revisar **/
    $query = DB::table('preguntas AS A')
      ->select(
        'A.id',
        'A.numero',
        'A.enunciado',
        'A.id_categoria'
      )
      ->addSelect('B.respuesta')
      ->addSelect('B.observacion')
      ->addSelect('B.url')
      ->leftJoin('respuestas AS B', function ($q) use ($request) {
        $q->on('A.id', 'B.id_pregunta')
          ->where('B.id_examen_ejecutado', $request->input('id_examen_ejecutado'));
      })
      ->join('categorias AS C', 'A.id_categoria', 'C.id');
    // ->join('tipos AS D', 'C.id_tipo', 'D.id');

    if ($request->filled('tipo')) {
      $query->where('C.id_tipo', $request->input('tipo'));
    }

    return $query->get();
  }

  public function categoriasLista(Request $request)
  {
    $tipo =  Auth::user()->id_tipo_participante;
    // $tipo = $tipo - 2;
    $query =  DB::table('categorias AS A');
    if ($request->filled('tipo')) {
      $query->where('id_tipo', $request->input('tipo'));
    }
    // $query->where('id_tipo', $tipo);
    return $query->get();
  }

  public function responderHandler(Request $request)
  {

    //return dd($request);

    
    //return $request;
    $this->validate($request, [
      'id_examen_ejecutado' => 'required',
      'id_pregunta' => 'required',
      'respuesta' => 'required',
      // 'observacion' => 'required',
    ]);
    $respuesta = respuesta::where('id_pregunta', $request->input('id_pregunta'))
      ->where('id_examen_ejecutado', $request->input('id_examen_ejecutado'))
      ->first();
    // dump($request->all());
    // dump($respuesta ? $respuesta->toArray() : "none");

    if (!isset($respuesta)) {
      $respuesta = new respuesta();
      $respuesta->id_examen_ejecutado = $request->input('id_examen_ejecutado');
      $respuesta->id_user = auth()->id();
      $respuesta->id_pregunta = $request->input('id_pregunta');
    }
   
    $valor = pregunta::find($request->input('id_pregunta'));
    //return $valor;
    if ($valor->clave == $request->input('respuesta')) {
      $respuesta->calificacion = $valor->calificacion;
      $respuesta->aciertos = 1;
    }else{
      $respuesta->calificacion= 0.00;
      $respuesta->aciertos = 0;
    }

    /**arreglar**/

    $respuesta->respuesta = $request->input('respuesta');
    // $respuesta->observacion = $request->input('observacion');
    // $respuesta->url = $request->input('url');

    // if(($request->respuesta))
    // $respuesta->respuesta  = $request->respuesta;

    if(($request->observacion)!="null")
    $respuesta->observacion = $request->observacion;

    if(($request->url)!="null")
    $respuesta->url= $request->url;

    $file = $request->file('file');
    if($file){
        $name = 'A-'.$file->getClientOriginalName();
        $titulo = explode(".",$file->getClientOriginalName())[0];
        $respuesta->documento  = $this->dateTimePartial.'/'.$name;
        Storage::disk('adjuntos')->putFileAs($this->dateTimePartial, $file, $name);
    }
    $respuesta->save();

    // dump($respuesta ? $respuesta->toArray() : "none");
    return response()->json($respuesta);
  }
}
