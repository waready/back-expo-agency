@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tipo de Examen</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body">
                        <table width="100%"
                            class="table table-striped table-bordered nowrap"
                            cellspacing="0"
                            id="students-table"
                        >
                            <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    {{-- <th>{{ __("Codigo") }}</th> --}}
                                    <th>{{ __("Nombre") }}</th>
                                    {{-- <th>{{ __("Apellido") }}</th> --}}
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
                <h5 class="modal-title">Editar Usuario</h5>
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
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Nombres</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="text" class="form-control" name="editar_nombres" id="editar_nombres" required placeholder="">
                            </div>
                        </div>
                        {{-- <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Apellido Paterno</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="editar_paterno" id="editar_paterno" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Apellido Materno</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="editar_materno" id="editar_materno" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Abreviatura</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="editar_abreviatura" id="editar_abreviatura" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Documento</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="number" class="form-control" name="editar_documento" id="editar_documento" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6">
                                <div class="radio float-right">
                                    <label>
                                        <input type="radio" class="flat editar_estado" name="editar_estado" value="1" checked> Activo
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat editar_estado" name="editar_estado" value="0"> Inactivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Firma (.png)</label>
                            <div class="col-md-8 col-sm-8 ">
                                <div class="custom-file" style="margin-bottom: 5px;" >
                                    <input type="file" class="custom-file-input file-firma" accept=".png" name="editar_firma" id="customFile1">
                                    <label class="custom-file-label customFile1 file1" id="label-file" for="customFile">Selecione su archivo...</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <b>Editar datos de acceso al sistema</b>
                        </div>
                        <hr>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Correo Electrónico</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="email" class="form-control" name="editar_email" id="editar_email" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Contraseña</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="password" class="form-control" name="editar_contraseña" id="editar_contraseña" placeholder="">
                            </div>
                        </div> --}}
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
@push('scripts')
{{-- <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script>
        let dt;
        console.log('tag', 'asd')
      //   let modal = jQuery("#appModal");
        $('#students-table thead tr').clone(true).appendTo( '#students-table thead' );
        $('#students-table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            $( 'input', this ).on( 'keyup change', function () {
                if ( dt.column(i).search() !== this.value ) {
                    dt
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
         jQuery(document).ready(function() {
            dt = jQuery("#students-table").DataTable({
                pageLength: 10,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                
                ajax: '{{ route('gettipo') }}',
                
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'Opciones'}
                ],
                rowCallback:function(row, data,index){
                    $('td:eq(2)',row).html('<a class="editar-usuario" href="'+data.id+'"> <i class="fas fa-pencil-alt big-icon text-primary" aria-hidden="true"></i></a>  <a class="eliminar-usuario" href="#" disable> <i class="fas fa-trash big-icon text-danger" aria-hidden="true"></i></a>')
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
                    url:'alltipo/'+idUpdate+'/edit',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#editar_nombres').val(data.nombre);
                        // $('#editar_paterno').val(data.paterno);
                        // $('#editar_materno').val(data.materno);
                        // $('#editar_abreviatura').val(data.abreviatura);
                        // $('#editar_documento').val(data.numero_documento);
                        // $('#editar_email').val(data.email);
                        $('#contraseña').val('');
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
                    url:'alltipo/'+idUpdate,
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

        })
    </script>
@endpush