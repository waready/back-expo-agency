<?php

namespace App\Http\Controllers;


use App\respuesta;
use App\ExamenEjecutado;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use App\Exports\DataExportDrep;
use App\Exports\DataExportUgel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Exports\DataExportDirector;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function ReporteUgelDrep(){
        $users = DB::table('users as us')
                ->select('ug.nombre','us.nombres',DB::raw('COUNT(ug.id) as num'))
                ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
                ->where('id_tipo_participante',4)
                ->GROUPBY ('ug.nombre','us.nombres')
                ->get();

        return $users;

    
   
        // $users = DB::table('users as us')
        //         ->select('dn.nombre','dn.id_nivel',DB::raw('COUNT(dn.id) as num'))
        //         ->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //         // ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
        //         ->where('id_tipo_participante',4)
        //         ->GROUPBY('dn.nombre','dn.id_nivel')
        //         ->get();

        // return $users;


    
        // $users = DB::table('users as us')
        //     ->select('us.gestion',DB::raw('COUNT(us.id) as num'))
        //     //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //     ->where([['id_tipo_participante',4],['us.gestion','<>','0']])
        //     ->GROUPBY('us.gestion')
        //     ->get();
        // return $users;
    
        // $users = DB::table('users as us')
        //     ->select('us.area',DB::raw('COUNT(us.id) as num'))
        //     //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //     ->where([
        //         ['id_tipo_participante',4],
        //         ['us.area','<>','0']
        //     ])
        //     ->GROUPBY('us.area')
        //     ->get();
        // return $users;
    }
    public function Excel(Request $request){
        return Excel::download(new DataExport($request), 'reporte.xlsx');
    

     // return $request;
    }
    public function ExcelDrep(Request $request){
        return Excel::download(new DataExportDrep($request), 'reporte-drep.xlsx');
    

     // return $request;
    }
    public function ExcelUgel(Request $request){
        return Excel::download(new DataExportUgel($request), 'reporte-ugel.xlsx');
    

     // return $request;
    }
    public function ExcelDirector(Request $request){
        return Excel::download(new DataExportDirector($request), 'reporte-director.xlsx');
    

     // return $request;
    }

    public function TablaExamen($id_res){
        $users = DB::table('respuestas as rp')
        ->select('rp.*','pre.numero',
        DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'),
        DB::raw('"" as Opciones'),DB::raw('"" as porcentaje'))
        ->join('examenes_ejecutados as ej', 'ej.id', '=', 'rp.id_examen_ejecutado')
        ->join('users as us','us.id','ej.id_user_supervisado')
        ->join('users as as','as.id','ej.id_user_supervisor')
        ->join('preguntas as pre','pre.id','rp.id_pregunta')
        ->where('ej.id_user_supervisado',$id_res)
        
        ->get();
        // $users = DB::table('examenes_ejecutados as ej')
        // ->select('ej.*')
        // ->join('respuestas as rp','rp.id_examen_ejecutado','ej.id')
        // ->where('ej.id_user_supervisado',162)
        // ->get();
        return \DataTables::of($users)->make('true');
    }
    public function ReporteExamen($id){
        $evaluado["tabla"] = ExamenEjecutado::where('id',$id)->first();
    
        //return $evaluado;
  
        $evaluado['porcentaje'] = DB::table('respuestas as rp')
        ->select('rp.id_user',DB::raw('COUNT(rp.id_user) as num'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
            ['id_examen_ejecutado',$evaluado["tabla"]->id],
            ['respuesta',1]
        ])
        ->GROUPBY('rp.id_user')
        ->first();
        
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
        ->select('ct.*')
        //->leftJoin('preguntas as pr','pr.id','ct.') 
        ->where('id_tipo',$evaluado['tipo']->id_tipo)
        ->get(); 
        foreach ($evaluado['categorias'] as $row) {
          $row->procentaje = DB::table('respuestas as rp')
          ->select('ct.nombre',
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
          } 
          $evaluado['tabvs']= \DataTables::of($evaluado['categorias'])->make('true');
  
        $evaluado['aciertosSI'] = DB::table('respuestas as rp')
        ->select('rp.id_examen_ejecutado',
        DB::raw('COUNT(rp.id_examen_ejecutado) as val'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
          ['id_examen_ejecutado',$evaluado["tabla"]->id],
          ['respuesta',1]
          ])
        ->GROUPBY('rp.id_examen_ejecutado')
        ->first();
  
        $evaluado['aciertosNO'] = DB::table('respuestas as rp')
        ->select('rp.id_examen_ejecutado', DB::raw('COUNT(rp.id_examen_ejecutado) as val'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
          ['id_examen_ejecutado',$evaluado["tabla"]->id],
          ['respuesta',0]
          ])
      ->GROUPBY('rp.id_examen_ejecutado')
        ->first();
  
  
        return $evaluado;
    }
    public function EliminarExamen($id){
        $dato = ExamenEjecutado::find($id);
        //$valor=$dato->delete();
        $respuestas = respuesta::where('id_examen_ejecutado',$dato->id)->get();
        foreach( $respuestas as $respuestas ){
        $message = respuesta::find($respuestas->id);
        //$message->estado = "0"; 
        $message->delete();;
        }
        $valor=$dato->delete();
        return $valor;  
    }
    public function ReporteFinal($id){
        $evaluado["tabla"] = ExamenEjecutado::where('id',$id)->first();
    
        //return $evaluado;
        $evaluado["nombre"] = DB::table('examenes_ejecutados as ej')
        ->select('us.nombres', 'us.apellidos')
        ->join('users as us','us.id','ej.id_user_supervisado')
        ->where('ej.id',$id)
        //
        ->first();
  
        $evaluado["monitor"] = DB::table('examenes_ejecutados as ej')
        ->select('us.nombres', 'us.apellidos')
        ->join('users as us','us.id','ej.id_user_supervisor')
        ->where('ej.id',$id)
        //
        ->first();      
    //return $evaluado;
        $evaluado['porcentaje'] = DB::table('respuestas as rp')
        ->select('rp.id_user',DB::raw('COUNT(rp.id_user) as num'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
            ['id_examen_ejecutado',$evaluado["tabla"]->id],
            ['respuesta',1]
        ])
        ->GROUPBY('rp.id_user')
        ->first();
        
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
  
        $categorias = DB::table('categorias as ct')
        ->select('ct.*')
        //->leftJoin('preguntas as pr','pr.id','ct.') 
        ->where('id_tipo',$evaluado['tipo']->id_tipo)
        ->get(); 
        foreach ($categorias as $row) {
          $row->procentaje = DB::table('respuestas as rp')
          ->select('ct.nombre',
          DB::raw('COUNT(ct.nombre) as num'))
  
          ->join('preguntas as pr', 'pr.id', '=', 'rp.id_pregunta')
          ->join('categorias as ct', 'ct.id', '=', 'pr.id_categoria')
          ->where([
            ['id_examen_ejecutado',$evaluado["tabla"]->id],
            ['pr.id_categoria',$row->id],
            ['respuesta',1],
           // [$row->procentaje, '<>', '']
            ])
          // ->whereNotNull('procentaje')
          ->GROUPBY('ct.nombre')
          ->first(); 
          $row->total = DB::table('preguntas as pre') 
          ->select(DB::raw('COUNT(pre.id_categoria) as num'))
          ->where('id_categoria',$row->id)
          ->GROUPBY('pre.id_categoria')
          ->first(); 
        } 
         // $evaluado['tabvs']= \DataTables::of($evaluado['categorias'])->make('true');
  
        $evaluado['aciertosSI'] = DB::table('respuestas as rp')
        ->select('rp.id_examen_ejecutado',
        DB::raw('COUNT(rp.id_examen_ejecutado) as val'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
          ['id_examen_ejecutado',$evaluado["tabla"]->id],
          ['respuesta',1]
          ])
        ->GROUPBY('rp.id_examen_ejecutado')
        ->first();
  
        $evaluado['aciertosNO'] = DB::table('respuestas as rp')
        ->select('rp.id_examen_ejecutado', DB::raw('COUNT(rp.id_examen_ejecutado) as val'))
  
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
          ['id_examen_ejecutado',$evaluado["tabla"]->id],
          ['respuesta',0]
          ])
      ->GROUPBY('rp.id_examen_ejecutado')
        ->first();
  
        // $respuestas = DB::table('respuestas as rp')
        // ->select('rp.*','pre.*',
        // DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'),
        // DB::raw('"" as Opciones'),DB::raw('"" as porcentaje'))
        // ->join('examenes_ejecutados as ej', 'ej.id', '=', 'rp.id_examen_ejecutado')
        // ->join('users as us','us.id','ej.id_user_supervisado')
        // ->join('users as as','as.id','ej.id_user_supervisor')
        // ->join('preguntas as pre','pre.id','rp.id_pregunta')
        // ->where('ej.id_user_supervisado',$evaluado["tabla"]->id_user_supervisado)
        
        // ->get();
        $respuestas = DB::table('respuestas as rp')
        ->select('rp.*','pre.numero','pre.enunciado',
        DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'),
        DB::raw('"" as Opciones'),DB::raw('"" as porcentaje'))
        ->join('examenes_ejecutados as ej', 'ej.id', '=', 'rp.id_examen_ejecutado')
        ->join('users as us','us.id','ej.id_user_supervisado')
        ->join('users as as','as.id','ej.id_user_supervisor')
        ->join('preguntas as pre','pre.id','rp.id_pregunta')
        ->where('ej.id_user_supervisado',$evaluado["tabla"]->id_user_supervisado)
        
        ->get();
        // $users = DB::table('examenes_ejecutados as ej')
        // ->select('ej.*')
        // ->join('respuestas as rp','rp.id_examen_ejecutado','ej.id')
        // ->where('ej.id_user_supervisado',162)
        // ->get();
       
          // El mensaje
        //Mail::to('antonyjapura11@gmail.com')->send(new MessageReceived);
         $categorias = $categorias->whereNotNull('procentaje');
        //return $respuestas;
        return view('reportefinal',compact('respuestas','categorias','evaluado','id'));

    }

    public function ReporteEmail(Request $request){
      //return $request;
      Mail::to($request->email)->send(new MessageReceived($request->url));
      return back()->with('message', ['success', __("Felicidades, ya eres instructor en la plataforma")]);
    }
    public function ReportePor(){
       // return $request;
      $examenes = DB::table('examenes_ejecutados as ug')
      // ->select('ug.*',DB::raw('"" as Opciones'),DB::raw('"" as procentaje'),DB::raw('"" as respuestas'),'tp.nombre as tipo',  DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),
      // DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'))
      ->select('ug.id')
      ->join('users as us', 'us.id', '=' ,'ug.id_user_supervisor') 
      // ->join('respuestas as rp','rp.id_examen_ejecutado','=','ug.id')
      ->join('users as as', 'as.id', '=' ,'ug.id_user_supervisado')
      ->join('tipos as tp','tp.id','=','ug.id_tipo' )
      
      //->where('id_user_supervisor', Auth::user()->id)
      //  ->where('tp.id',1)
      ->get();
  
  
      foreach ($examenes as $row) {
        $row->procentaje = DB::table('respuestas as rp')
        ->select(
          DB::raw('COUNT(rp.id_user) as num')
        //  DB::raw("CASE WHEN ((rp.id_user/30)*100) >= 0 AND ((rp.id_user/30)*100) <= 50 THEN 'Inicio' ELSE '-' END")
          )
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
            ['id_examen_ejecutado',$row->id]
        ])
        ->GROUPBY('rp.id_user')
        ->first();
      }

      $final=$examenes;
      return $final;
    }
    public function vistaReporteTotal(){
      return view('reportes.reportesTotal.reporteTotal');
    }
    public function filtroReporteTotal(Request $request){
     // return $request;
      $examenes = DB::table('examenes_ejecutados as ug')
      // ->select('ug.*',DB::raw('"" as Opciones'),DB::raw('"" as procentaje'),DB::raw('"" as respuestas'),'tp.nombre as tipo',  DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),
      // DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'))
      ->select('ug.id')
      ->join('users as us', 'us.id', '=' ,'ug.id_user_supervisor') 
      // ->join('respuestas as rp','rp.id_examen_ejecutado','=','ug.id')
      ->join('users as as', 'as.id', '=' ,'ug.id_user_supervisado')
      ->join('tipos as tp','tp.id','=','ug.id_tipo' );
      
        if($request->rol != null)
          $examenes->where('tp.id',$request->rol);
            
        if($request->ugel != null)
          $examenes->where('us.id_ugel',$request->ugel);
            
        if($request->nivel != null)
          $examenes->where('us.nivel',$request->nivel);
            
        if($request->area != null)
          $examenes->where('us.area',$request->area);
          
        if($request->nombre != null)
          $examenes->where('us.nombre_i_e','like','%'.$request->nombre.'%');
         
    
    
      //->where('tp.id',$request->filtro)
      $examenes = $examenes->get();
      //return $examenes;
  
      foreach ($examenes as $row) {
        $row->procentaje = DB::table('respuestas as rp')
        ->select(
          DB::raw('COUNT(rp.id_user) as num')
        //  DB::raw("CASE WHEN ((rp.id_user/30)*100) >= 0 AND ((rp.id_user/30)*100) <= 50 THEN 'Inicio' ELSE '-' END")
          )
        //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where([
            ['id_examen_ejecutado',$row->id]
        ])
        ->GROUPBY('rp.id_user')
        ->first();
      }

      $final=$examenes;
      return $final;
    }

}
