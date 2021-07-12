@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración</h1>
@stop

@section('content')
    <p>Bienvenido a la administracion del control de panel</p>
    <p><i class="fas fa-arrow-left"></i> Puede acceder a las opciones del tablero </p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop