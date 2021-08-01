<?php

namespace App\Http\Controllers;

use App\ExamenEjecutado;
use Illuminate\Http\Request;

class ExamenesEjecutadosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
