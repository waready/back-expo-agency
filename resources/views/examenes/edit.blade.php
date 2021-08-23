<?php

/**
 * Author: Wilson Pilco Nuñez
 * Email: wilsonaux1@gmail.com
 * PHP Version: 7.4
 * Created at: 2021-07-31 18:54
 */

use App\tipo;
use App\User;

$supervisor = User::find($examen->id_user_supervisor);
$supervisado = User::find($examen->id_user_supervisado);
$tipo = tipo::find($examen->id_tipo);
?>
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <div>
        <div class="mb-3">
          <label for="">Monitor:</label>
          <select class="custom-select" disabled name="id_user_supervisor">
            <option selected>
              {{$supervisor->nombres}} {{$supervisor->apellidos}}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="">Monitoreado:</label>
          <select class="custom-select" disabled name="id_user_supervisado">
            <option selected>
              {{$supervisado->nombres}} {{$supervisado->apellidos}}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="">Tipo Monitoreo:</label>
          <select class="custom-select" disabled name="id_tipo">
            <option selected>
              {{$tipo->nombre}}
            </option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <examen id="{{$examen->id}}" tipo="{{$examen->id_tipo}}"></examen>
    </div>
  </div>
</div>
@endsection
