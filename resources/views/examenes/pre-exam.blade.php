<?php

/**
 * Author: Wilson Pilco Nuñez
 * Email: wilsonaux1@gmail.com
 * PHP Version: 7.4
 * Created at: 2021-07-31 17:30
 */

use Illuminate\Support\Facades\DB;

$supervisores = DB::table('users')->get();
$supervisados = DB::table('users')->get();
$tipoExamenes = DB::table('tipos')->get();
?>
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-5 mt-3">
      <h4>AJUSTE DEL EXAMEN</h4>
      <form method="POST" action="{{ url('/examenes/') }}">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="">Supervisor:</label>
          <select class="custom-select" name="id_user_supervisor">
            <option value=""></option>
            @foreach($supervisores as $miembro)
            <option value="{{$miembro->id}}" {{$miembro->id == $supervisorId ? 'selected' : ''}}>
              {{$miembro->nombres}} {{$miembro->apellidos}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="">Supervisado:</label>
          <select class="custom-select" name="id_user_supervisado">
            <option value=""></option>
            @foreach($supervisados as $miembro)
            <option value="{{$miembro->id}}" {{$miembro->id == $supervisedId ? 'selected' : ''}}>
              {{$miembro->nombres}} {{$miembro->apellidos}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="">Tipo Examen:</label>
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
        <button class="btn btn-primary" type="submit">Iniciar Examen</button>
      </form>
    </div>
  </div>
</div>
@endsection
