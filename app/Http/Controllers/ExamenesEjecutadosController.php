<?php

namespace App\Http\Controllers;

use App\ExamenEjecutado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExamenesEjecutadosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $examenes = ExamenEjecutado::where('id_user_supervisor', Auth::user()->id)
    
    ->get();

   

    //return $examenes;
    return view('admin.misExamenes', compact('examenes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function getMisExamenes()
  {
    $examenes = DB::table('examenes_ejecutados as ug')
    ->select('ug.*',DB::raw('"" as Opciones'),DB::raw('"" as procentaje'),DB::raw('"" as respuestas'),'tp.nombre as tipo',  DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),
    DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'))
    ->join('users as us', 'us.id', '=' ,'ug.id_user_supervisor') 
    // ->join('respuestas as rp','rp.id_examen_ejecutado','=','ug.id')
    ->join('users as as', 'as.id', '=' ,'ug.id_user_supervisado')
    ->join('tipos as tp','tp.id','=','ug.id_tipo' )
    
    ->where('id_user_supervisor', Auth::user()->id)
    ->get();


    foreach ($examenes as $row) {
      $row->procentaje = DB::table('respuestas as rp')
      ->select(DB::raw('COUNT(rp.id_user) as num'))

      //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
      ->where([
          ['id_examen_ejecutado',$row->id]
      ])
      ->GROUPBY('rp.id_user')
      ->first();
    }

    
    return \DataTables::of($examenes)->make('true');
  }
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
    $this->validate($request, [
      'id_user_supervisor' => 'required',
      'id_user_supervisado' => 'required',
      'id_tipo' => 'required',
    ]);
    // dd($request->only([
    //   'id_user_supervisor',
    //   'id_user_supervisado',
    //   'id_tipo'
    // ]));
    $stored = ExamenEjecutado::create($request->only([
      'id_user_supervisor',
      'id_user_supervisado',
      'id_tipo'
    ]));
    return redirect('examenes/' . $stored->id . '/edit');
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
    // return view('examenes.show');
    // dd(ExamenEjecutado::find($id)->toArray());
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $examen = ExamenEjecutado::find($id);
    if(!isset($examen)) {
      abort(404, "Ese examen no existe");
    }
    return view('examenes.edit', compact('examen', 'id'));
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
}
