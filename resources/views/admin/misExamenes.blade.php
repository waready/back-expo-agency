@extends('adminlte::page')

@section('title', 'Categoria')
{{-- @push('styles') --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
{{-- @endpush --}}
@stop
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                

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
                                    {{-- <th>{{ __("Codigo") }}</th> --}}
                                    <th>{{ __("Supervisor") }}</th>
                                    <th>{{ __("Supervisado") }}</th>
                                    <th>{{ __("Tipo Examen") }}</th>
                                    <th>{{ __("Fecha") }}</th>
                                    <th>{{ __("Respuestas") }}</th>
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
<div class="modal fade bd-example-modal-lg" id="modal-editar-usuario" tabindex="-1" role="dialog" aria-labelledby="editarNuevo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">Avance de Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <h4>Procentaje</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="barra" ></div>
                    </div>
                    <hr>
                    <h4>Aciertos</h4>
                    <div id="aciertos"></div>
                    <hr>
                    <h4>Respuestas</h4>
                    <table width="100%"
                        class="table table-responsive table-bordered nowrap"
                        cellspacing="0"
                        id="students-table1"
                    >
                        <thead>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                {{-- <th>{{ __("Codigo") }}</th> --}}
                                <th>{{ __("N° Pregunta") }}</th>
                                <th>{{ __("Respuesta") }}</th>
                                <th>{{ __("Observacion") }}</th>
                                <th>{{ __("Aciertos") }}</th>
                                <th>{{ __("Calificacion") }}</th>
                                {{-- <th>{{ __("Opciones") }}</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            {{-- <form id="form-editar-usuario" class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Nombre</label>
                            <div class="col-md-12 col-sm-12 ">
                                <textarea type="text" class="form-control" name="editar_nombres" id="editar_nombres"  placeholder=""> </textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Tipo</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_tipo" id="editar_tipo">
                                  
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form> --}}

        </div>
    </div>
</div>
<div class="modal fade" id="modal-agregar-usuario" tabindex="-1" role="dialog" aria-labelledby="agregarNuevo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">Agregar Nuevo Tipo Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-agregar-usuario" class="form-horizontal form-label-left" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Nombre</label>
                            <div class="col-md-12 col-sm-12 ">
                                <textarea type="text" class="form-control" name="nombres" id="nombres" required placeholder=""> </textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Descripcion</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="tipo" id="tipo" required>
                                    <option ></option>
                                   
                                </select>
                            </div>
                        </div>
                        {{-- <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Apellido Materno</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="materno" id="materno" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Abreviatura</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="abreviatura" id="abreviatura" required placeholder="">
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
                
                ajax: '{{ route('getMisExamenes') }}',
                
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id'},
                    {data: 'Supervisor'},
                    {data: 'Supervisado'},
                    {data: 'tipo'},
                    {data: 'created_at'},
                    {data: 'respuestas'},
                    {data: 'Opciones'}
                ],
                rowCallback:function(row, data,index){
                    $('td:eq(5)',row).html('<a class="tabla-usuario" href="'+data.id+'"> <i class="fas fa-file-alt big-icon text-info" aria-hidden="true"></i></a>')
                    $('td:eq(6)',row).html('<a class="editar-usuario" href="examenes/'+data.id+'/edit"> <i class="fas fa-pencil-alt big-icon text-primary" aria-hidden="true"></i></a>  <a class="eliminar-usuario" href="#" disable> <i class="fas fa-trash big-icon text-danger" aria-hidden="true"></i></a>')
                }
                
            });

            $(document).on('click', '.tabla-usuario', function(e) {
                // $('.file-firma').val(null);
                // $('.file1').html('Seleccione su archivo...');
                e.preventDefault();
                
                idUpdate = $(this).attr('href'); 
               // alert(idUpdate);
            
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:'reporteExamen/'+idUpdate+'',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                       var valeur;
                        
                        //console.log(data.porcentaje.num)
                        if(data.porcentaje != null){
                            valeur = (data.porcentaje.num * 3.3)
                           
                        }else{
                            valeur = 0;
                        }

                     
                        $('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);  
                        dt1 = jQuery("#students-table1").DataTable({
                            pageLength: 15,
                            lengthMenu: [15, 25, 50, 75, 100 ],
                            processing: true,
                            "bDestroy": true,
                            ajax: 'tablaExamen/'+data.tabla.id_user_supervisado+'',
                            
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                            },
                            columns: [
                                {data: 'id'},
                                {data: 'id_pregunta'},
                                {data: 'respuesta'},
                                {data: 'Opciones'},
                                {data: 'aciertos'},
                                {data: 'calificacion'},
                            
                            ],
                            rowCallback:function(row, data,index){

                                if(data.respuesta == 0)
                                $('td:eq(2)',row).html('no')
                                if(data.respuesta == 1)
                                $('td:eq(2)',row).html('si')

                                if(data.respuesta == 0)
                                $('td:eq(4)',row).html('--')
                                if(data.respuesta == 1)
                                $('td:eq(4)',row).html('X')

                                if(data.calificacion == null)
                                $('td:eq(5)',row).html('0.00')
                                else
                                $('td:eq(5)',row).html(data.calificacion)
                            }
                        
                        });

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
                    url:'allcategoria/'+idUpdate,
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
                    url:'allcategoria',
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
                $('#nombres').val('');
                // $("#fichero").html("Subir Constancia de Habilitación");
                $('#tipo').val(null).trigger('change');
                $('#tipo').val('');
            })
        })
    </script>
@stop
{{-- @endpush --}}