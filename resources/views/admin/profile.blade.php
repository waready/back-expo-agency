@extends('adminlte::page')

@section('title', 'Categoria')
@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
@endpush
@section('content')
<div class="">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mi Cuenta</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Informacion del Usuario</h3>
                                <img src="" alt="">
                                <form id="form-agregar-usuario" class="form-horizontal form-label-left" autocomplete="off">
                                    @csrf
                                    <div class="">
                                        {{$perfil}}
                                        <div class="container-fluid">
                                            <div class="item form-group">
                                                <label class="col-form-label  label-align">E-mail:</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input type="email" class="form-control" name="email" id="email" value="{{$perfil->email}}" placeholder="Ingrese su correo electronico">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label  label-align">Nro. Telefonico Personal:</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input type="text"  class="form-control"name="telefono" id="telefono" value="{{$perfil->celular}}" placeholder="Ingrese su Nro. celular">
                                                </div>
                                            </div>
                                            <h4> Cambiar la Contraseña:</h4>
                                            <div class="item form-group">
                                                <label class="col-form-label  label-align">Contraseña actual:</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input type="password" class="form-control" name="password_ant" id="password_ant" placeholder="Ingrese su contraseña actual">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label  label-align">Nueva Contraseña:</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input type="password" class="form-control" name="email" id="email" placeholder="Ingrese su nueva contraseña">
                                                </div>
                                            </div>          
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="col-md-7">
                                <h3>Ficha Informativa de la Institucion</h3>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group has-validation">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Codigo Modular</span>
                                            </div>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group has-validation">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Ugel Supervisa</span>
                                            </div>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nombre I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nivel</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Caracteristica</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Gestion</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Gestion - Dependencia</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nombre Director I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Director I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Centro Poblado</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Denominación area Asignada</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Provincia</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Distrito</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Codigo Modular</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div>
                                
                                {{-- <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Codigo Modular</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="">
                            
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> --}}

@endpush