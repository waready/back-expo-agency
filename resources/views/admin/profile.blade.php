@extends('adminlte::page')

@section('title', 'Perfil')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
{{-- @endpush --}}
@stop
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

                    <form  id="form-agregar-usuario" class="form-horizontal form-label-left" autocomplete="off" >
                    @csrf
                    <input id="prodId" name="prodId" type="hidden" value="{{$perfil->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Informacion del Usuario</h3>
                                
                                <img src="/storage/fotos/{{$perfil->profile_picture}}" alt="" class="img-responsive" width="150">
                                <hr>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlFile1">Actualizar Foto</label>
                                    <input type="file" class="form-control-file" name="uploaded" id="file_upload">
                                </div> --}}
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/png, image/gif, image/jpeg" name="archibo" id="files" >
                                    <label class="custom-file-label" for="validatedCustomFile" id="fichero">Subir Nueva Fotografia</label>    
                                </div>

                                <div class="">
                                    
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
                                                <input type="text"  class="form-control" name="telefono" id="telefono" value="{{$perfil->celular}}" placeholder="Ingrese su Nro. celular">
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
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su nueva contraseña">
                                            </div>
                                        </div>          
                                    </div>
                                </div>
                            
                            </div>
                            <div class="col-md-7">
                                <h3>Ficha Informativa de la Institucion</h3>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group has-validation">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Codigo Modular</span>
                                            </div>
                                            <input type="text" class="form-control" name="cod_modular_i_e"  value="{{$perfil->cod_modular_i_e}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group has-validation">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Ugel Supervisa</span>
                                            </div>
                                            <input type="text" class="form-control" name="id_ugel" value="{{$perfil->id_ugel}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nombre I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre_i_e" value="{{$perfil->nombre_i_e}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nivel</span>
                                    </div>
                                    <input type="text" class="form-control" name="nivel_i_e" value="{{$perfil->nivel_i_e}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Caracteristica</span>
                                    </div>
                                    <input type="text" class="form-control" name="caracteristica" value="{{$perfil->caracteristica}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Gestion</span>
                                    </div>
                                    <input type="text" class="form-control" name="" >
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Gestion - Dependencia</span>
                                    </div>
                                    <input type="text" class="form-control" name="" >
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nombre Director I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" name="direccion_i_e" value="{{$perfil->direccion_i_e}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Director I. E.</span>
                                    </div>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Centro Poblado</span>
                                    </div>
                                    <input type="text" class="form-control" name="centro_poblado_i_e" value="{{$perfil->centro_poblado_i_e}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Denominación area Asignada</span>
                                    </div>
                                    <input type="text" class="form-control" name="" >
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Provincia</span>
                                    </div>
                                    <input type="text" class="form-control" name="provincia" value="{{$perfil->provincia}}">
                                </div>
                                <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Distrito</span>
                                    </div>
                                    <input type="text" class="form-control" name="distrito" value="{{$perfil->distrito}}">
                                </div>
                                {{-- <div class="input-group has-validation">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Codigo Modular</span>
                                    </div>
                                    <input type="text" class="form-control" required>
                                </div> --}}
                                
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
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{{-- <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    jQuery(document).ready(function() {
        //console.log('listo');
        $('#form-agregar-usuario').submit(function(e){
            e.preventDefault();
            //spinner.show();
            //console.log('holas');
            // let data = $(this).serialize();
            var formDerivar = document.getElementById("form-agregar-usuario");
           
            //var file = document.getElementById("file_upload").files[0];
            //alert(file);
            let data = new FormData(formDerivar);
            // $('#imageFile').on("change", function(){ 
            //     data.append("filer",file,true);
            // });
            

            $.ajax({
                type: "POST",
                dataType: "json",
                url:'editarPerfil/',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                   
                    // spinner.hide();
                    if(data.status)
                    {
                        console.log(data)
                        if(data.recarga == true){
                            location.reload();
                            
                        }
                        toastr.success(data.message, '¡Operación Exitosa!', {timeOut: 5000})
                        
                        
                    }
                    else
                    {
                        toastr.error(data.message, '¡Error!', {timeOut: 5000})
                       
                    }
                },
                error: function(error) {
                   
                    // spinner.hide();
                    toastr.error(error, '¡Error!', {timeOut: 5000})
                }
            });
        });
    });
</script>


@stop