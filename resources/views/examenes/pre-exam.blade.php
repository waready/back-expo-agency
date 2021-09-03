<?php

/**
 * Author: Wilson Pilco Nuñez
 * Email: wilsonaux1@gmail.com
 * PHP Version: 7.4
 * Created at: 2021-07-31 17:30
 */

use Illuminate\Support\Facades\DB;
use App\User;
  // $examType,
  // $supervisorId,
  // $supervisedId
// $supervisor = User::find($examen->id_user_supervisor);
// $supervisado = User::find($examen->id_user_supervisado);

// $supervisores = DB::table('users')->get();
// $supervisados = DB::table('users')->get();
$supervisores = DB::table('users')->where('id',$supervisorId)->get();
$supervisados = DB::table('users')->where('id',$supervisedId)->get();
$tipoExamenes = DB::table('tipos')->get();
?>
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-5 mt-3">
      <h4>AJUSTE DEL MONITOREO</h4>
      <form method="POST" action="{{ url('/examenes/') }}">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="">Monitor:</label>
         
          <select class="custom-select"  name="id_user_supervisor">
            {{-- <option value=""></option> --}}
            @foreach($supervisores as $miembro)
            <option value="{{$miembro->id}}" {{$miembro->id == $supervisorId ? 'selected' : ''}}>
              {{$miembro->nombres}} {{$miembro->apellidos}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="">Monitoreado:</label>
          <select class="custom-select"  name="id_user_supervisado">
            {{-- <option value=""></option> --}}
            @foreach($supervisados as $miembro)
            <option value="{{$miembro->id}}" {{$miembro->id == $supervisedId ? 'selected' : ''}}>
              {{$miembro->nombres}} {{$miembro->apellidos}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="">Tipo Monitoreo:</label>
          <input type="hidden" value="{{$examType}}" name="id_tipo">
          <select class="custom-select" disabled name="id_tipo">
            <option value=""></option>
            @foreach($tipoExamenes as $tipo)
            <option value="{{$tipo->id}}" {{$tipo->id == $examType ? 'selected' : ''}}>
              {{$tipo->nombre}}
            </option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-primary" type="submit">Iniciar</button>
      </form>
    </div>
    <div class="col-md-5 offset-md-2 mt-3">
      
      <div class="mb-3">
        <div class="mb-3">
          Periodo de Monitoreo 
        </div>
        
      </div>
      <div class="mb-3">
        <a href="#" type="button"  class="btn btn-success" value="">Descargar ficha vacia</a>
      </div>
    </div>
  </div>
</div>
@endsection
