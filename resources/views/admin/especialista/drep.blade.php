@extends('adminlte::page')

@section('title', 'Pregunta')

{{-- @push('styles') --}}
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
{{-- @endpush --}}
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">Especialista Drep
                    <button type="button" id="agregar-responsable-carrera" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-agregar-usuario">
                        <i class="fa fa-plus"></i> Agregar
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <table width="100%"
                            class="table table-responsive table-bordered nowrap"
                            cellspacing="0"
                            id="students-table"
                        >
                            <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    <th>{{ __("Nombres") }}</th>
                                    <th>{{ __("Apellidos") }}</th>
                                    <th>{{ __("DNI") }}</th>
                                    <th>{{ __("Email") }}</th>
                                    <th>{{ __("Cargo") }}</th>
                                    <th>{{ __("Condición") }}</th>
                                    <th>{{ __("Ugel") }}</th>
                                    <th>{{ __("Opciones") }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-editar-usuario" tabindex="-1" role="dialog" aria-labelledby="editarNuevo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">Editar Especialista Drep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-editar-usuario" class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">DNI</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" class="form-control" name="editar_dni" id="editar_dni"  placeholder="" rows="4" required> 
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">NOMBRES</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_nombres" id="editar_nombres"  placeholder="" rows="4" required> 
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">APELLIDOS</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_apellidos" id="editar_apellidos" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">UGEl</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_ugel" id="editar_ugel" required>
                                        <option ></option>
                                    @foreach($ugels as $ugel)
                                        <option value="{{$ugel->id}}">{{$ugel->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CELULAR</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_celular" id="editar_celular" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CONDICIÓN</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_condicion" id="editar_condicion" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CARGO</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_cargo" id="editar_cargo" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">GESTIÓN</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_gestion" id="editar_gestion" required>
                                        <option ></option>
                                        <option value="0">Ninguno</option>
                                        <option value="1">Estatal</option>
                                        <option value="2">No Estatal</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">AREA</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_area" id="editar_area" required>
                                        <option ></option>
                                        <option value="0">Ninguno</option>
                                        <option value="1">Urbano</option>
                                        <option value="2">Rural</option>
                                </select>
                            </div>
                        </div>  
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CORREO ELECTRÓNICO</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="email" class="form-control" name="editar_email" id="editar_email" required placeholder="">
                            </div>
                        </div>
                        <hr/>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">PASSWORD</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="password" class="form-control" name="editar_password" id="editar_password"  placeholder="">
                            </div>
                        </div>
                                             
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-agregar-usuario" tabindex="-1" role="dialog" aria-labelledby="agregarNuevo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">Agregar Nuevo Especialista Drep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-agregar-usuario" class="form-horizontal form-label-left" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">DNI</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" class="form-control" name="dni" id="dni"  placeholder="" rows="4" required> 
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">NOMBRES</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="nombres" id="nombres"  placeholder="" rows="4" required> 
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">APELLIDOS</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="apellidos" id="apellidos" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">UGEl</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="ugel" id="ugel" required>
                                        <option ></option>
                                    @foreach($ugels as $ugel)
                                        <option value="{{$ugel->id}}">{{$ugel->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CELULAR</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="celular" id="celular" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CONDICIÓN</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="condicion" id="condicion" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CARGO</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="cargo" id="cargo" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">GESTIÓN</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="gestion" id="gestion" required>
                                        <option ></option>
                                        <option value="0">Ninguno</option>
                                        <option value="1">Estatal</option>
                                        <option value="2">No Estatal</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">AREA</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="area" id="area" required>
                                        <option ></option>
                                        <option value="0">Ninguno</option>
                                        <option value="1">Urbano</option>
                                        <option value="2">Rural</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">CORREO ELECTRÓNICO</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="email" class="form-control" name="email" id="email" required placeholder="">
                            </div>
                        </div>
                                             
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- @push('scripts') --}}
@section('js')
{{-- <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script>
        let dt;
        console.log('tag', 'asd')
      //   let modal = jQuery("#appModal");
        // $('#students-table thead tr').clone(true).appendTo( '#students-table thead' );
        // $('#students-table thead tr:eq(1) th').each( function (i) {
        //     var title = $(this).text();
        //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        //     $( 'input', this ).on( 'keyup change', function () {
        //         if ( dt.column(i).search() !== this.value ) {
        //             dt
        //                 .column(i)
        //                 .search( this.value )
        //                 .draw();
        //         }
        //     } );
        // } );
         jQuery(document).ready(function() {
            dt = jQuery("#students-table").DataTable({
                pageLength: 15,
                lengthMenu: [15, 25, 50, 75, 100 ],
                processing: true,
                
                ajax: '{{ route('getEspecilistaDrep') }}',
                
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id'},
                    {data: 'nombres'},
                    {data: 'apellidos'},
                    {data: 'dni'},
                    {data: 'email'},
                    {data: 'cargo'},
                    {data: 'condicion'},
                    {data: 'nombre'},
                    {data: 'Opciones'}
                ],
                rowCallback:function(row, data,index){
                   // 
                    // if(data.clave == 1)
                    // $('td:eq(3)',row).html('si')
                    // else
                    // $('td:eq(3)',row).html('no')


                    $('td:eq(8)',row).html('<a class="editar-usuario" href="'+data.id+'"> <i class="fas fa-pencil-alt big-icon text-primary" aria-hidden="true"></i></a>  <a class="eliminar-usuario" href="#"> <i class="fas fa-trash big-icon text-danger" aria-hidden="true"></i></a>')
                }
                
            });
            $(document).on('click', '.editar-usuario', function(e) {
                // $('.file-firma').val(null);
                // $('.file1').html('Seleccione su archivo...');
                e.preventDefault();
                
                idUpdate = $(this).attr('href');
               // alert(idUpdate);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:'allespecialistadrep/'+idUpdate+'/edit',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#editar_dni').val(data.dni);
                        $('#editar_nombres').val(data.nombres);
                        $('#editar_apellidos').val(data.apellidos);
               
                        $('#editar_ugel option[value="'+data.id_ugel+'"]').attr("selected", true);
                        $('#editar_email').val(data.email);
                        
                        $('#editar_celular').val(data.celular);
                        $('#editar_condicion').val(data.condicion);
                        $('#editar_cargo').val(data.cargo);
                        $('#editar_gestion option[value="'+data.gestion+'"]').attr("selected", true);
                        $('#editar_area option[value="'+data.area+'"]').attr("selected", true);
                        //$('#contraseña').val('');
                        // var estado = $('.editar_estado');
                        // estado.filter('[value='+data.estado+']').iCheck('check');
                        console.log(data);
                        

                        $('#modal-editar-usuario').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error(error, '¡Error!', {timeOut: 5000})
                    }
                });
            });
            $('#form-editar-usuario').submit(function(e){
                e.preventDefault();
               // spinner.show();
                // let data = $(this).serialize();
                var formDerivar = document.getElementById("form-editar-usuario");
                let data = new FormData(formDerivar);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url:'allespecialistadrep/'+idUpdate,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#modal-editar-usuario').modal('hide');
                        //spinner.hide();
                        console.log(data);
                        if(data.status)
                        {
                            dt.ajax.reload();
                            toastr.success(data.message, '¡Operación Exitosa!', {timeOut: 5000})
                            $('#editar_nombres').val('');
                            // $('#editar_paterno').val('');
                            // $('#editar_materno').val('');
                            // $('#editar_abreviatura').val('');
                            // $('#editar_documento').val('');
                            // $('#editar_email').val('');
                            // $('#editar_contraseña').val('');
                          
                        }
                        else
                        {
                            toastr.error(data.message, '¡Error!', {timeOut: 5000})
                        }
                    },
                    error: function(error) {
                        $('#modal-editar-usuario').modal('hide');
                        //spinner.hide();
                        toastr.error(error, '¡Error!', {timeOut: 5000})

                    }
                });
            });
            $('#form-agregar-usuario').submit(function(e){
                e.preventDefault();
                //spinner.show();
                // let data = $(this).serialize();
                var formDerivar = document.getElementById("form-agregar-usuario");
                let data = new FormData(formDerivar);


                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url:'allespecialistadrep',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#modal-agregar-usuario').modal('hide');
                       // spinner.hide();
                        if(data.status)
                        {
                            dt.ajax.reload();
                            toastr.success(data.message, '¡Operación Exitosa!', {timeOut: 5000})
                            $('#nombres').val('');
                            $('#tipo').val(null).trigger('change');
                            $('#tipo').val('');
                            
                        }
                        else
                        {
                            toastr.error(data.message, '¡Error!', {timeOut: 5000})
                        }
                    },
                    error: function(error) {
                        $('#modal-agregar-usuario').modal('hide');
                       // spinner.hide();
                        toastr.error(error, '¡Error!', {timeOut: 5000})
                    }
                });
            });
            $('#modal-agregar-usuario').on('hidden.bs.modal', function () {
               
                $('#enunciado').val('');
                $('#categoria').val(null).trigger('change');
                $('#categoria').val('');
                $('#numero').val('');
                $('#calificacion').val('');
                $('#clave').val(null).trigger('change');
                $('#clave').val('');
            })
        })
    </script>
{{-- @endpush --}}
@stop