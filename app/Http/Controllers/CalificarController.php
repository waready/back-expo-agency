<?php

namespace App\Http\Controllers;

//use App\pregunta;
use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificarController extends Controller
{
    public function calificar(Request $request){
        //return $request;

        /** tengo que recibir el tipo de examen para el where**/

        $preguntasB =   DB::table('categorias as ct')
        ->join('preguntas as pr', 'pr.id_categoria', '=', 'ct.id')
        ->where('ct.id_tipo', 2)
        ->orderBy('numero')
        ->select('ct.nombre','pr.numero','pr.enunciado', 'pr.clave','pr.calificacion')
        ->get();


        //return $preguntasB;
        /** comparar $request con $preguntasB  -- sacar nota (calificacion o puntaje es 1P) **/
        
    
    }
}
