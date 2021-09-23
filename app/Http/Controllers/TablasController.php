<?php

namespace App\Http\Controllers;

use App\ExamenEjecutado;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{
    public function TablaPreguntas($id_res){
        // $categorias = DB::table('categorias as cg')
        //     ->select('cg.id', 'cg.nombre', 'tp.nombre as tipo' ,DB::raw('"" as Opciones'))
        //     ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
        //     ->where('id_tipo',$id_res)
        //     ->paginate(15);
      $categorias = DB::table('preguntas as pre')
      ->select('pre.id', 'pre.numero','pre.enunciado','pre.calificacion','pre.clave', 'ct.nombre as categoria' ,DB::raw('"" as Opciones'))
      ->join('categorias as ct', 'ct.id', '=', 'pre.id_categoria')
      ->where('id_categoria',$id_res)
      ->paginate(15);
      //return $categorias;
      //return \DataTables::of($categoria)->make('true');
      return view('admin.tablapregunta',compact('categorias'));
    } 
    public function TablaExamenCategoria($id_res){
        $evaluado["tabla"] = ExamenEjecutado::where('id',$id_res)->first();
        $evaluado['tipo'] = DB::table('respuestas as rp')
        ->select('ct.id_tipo')
        //DB::raw('COUNT(rp.id_user) as num'))

        ->join('preguntas as pr', 'pr.id', '=', 'rp.id_pregunta')
        ->join('categorias as ct', 'ct.id', '=', 'pr.id_categoria')
        ->where([
            ['id_examen_ejecutado',$evaluado["tabla"]->id],
            
        ])
        //->GROUPBY('rp.id_user')
        ->first();

        $evaluado['categorias'] = DB::table('categorias as ct')
        ->select('ct.*','tp.nombre as tipo' ,DB::raw('"" as Opciones'))
        ->join('tipos as tp','tp.id', 'ct.id_tipo')
        ->where('id_tipo',$evaluado['tipo']->id_tipo)
        ->get(); 
        foreach ($evaluado['categorias'] as $row) {
            $row->procentaje = DB::table('respuestas as rp')
            ->select(
            DB::raw('COUNT(ct.nombre) as num'))

            ->join('preguntas as pr', 'pr.id', '=', 'rp.id_pregunta')
            ->join('categorias as ct', 'ct.id', '=', 'pr.id_categoria')

            ->where([
            ['id_examen_ejecutado',$evaluado["tabla"]->id],
            ['pr.id_categoria',$row->id],
            ['respuesta',1]
            ])
            ->GROUPBY('ct.nombre')
            ->first(); 
            $row->total = DB::table('preguntas as pre') 
            ->select(DB::raw('COUNT(pre.id_categoria) as num'))
            ->where('id_categoria',$row->id)
            ->GROUPBY('pre.id_categoria')
            ->first(); 

            } 
            $evaluado['tabvs']= \DataTables::of($evaluado['categorias'])->make('true');

            return $evaluado['tabvs'];


    }
    public function TablaCategoria($id_res){
        $categorias = DB::table('categorias as cg')
        ->select('cg.id', 'cg.nombre', 'tp.nombre as tipo' ,DB::raw('"" as Opciones'))
        ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
        ->where('id_tipo',$id_res)
        ->paginate(15);
        
        //return \DataTables::of($categoria)->make('true');
        return view('admin.tablacategoria',compact('categorias'));
  
    }
}
