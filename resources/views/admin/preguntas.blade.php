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
                <div class="card-header">Tipo de Preguntas
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
                                    {{-- <th>{{ __("ID") }}</th> --}}
                                    <th >{{ __("Numero") }}</th>
                                    <th  style="width: 155px;">{{ __("Enunciado") }}</th>
                                    <th>{{ __("Calificacion") }}</th>
                                    <th>{{ __("Clave") }}</th>
                                    <th>{{ __("Categoria") }}</th>
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
                <h5 class="modal-title">Editar Nombre Tipo Examen</h5>
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
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Enunciado</label>
                            <div class="col-md-12 col-sm-12 ">
                                <textarea type="text" class="form-control" name="editar_enunciado" id="editar_enunciado"  placeholder="" rows="4"> </textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Categorias</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_categoria" id="editar_categoria">
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Numero</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" class="form-control" name="editar_numero" id="editar_numero" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Calificacion</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" placeholder="1.0" step="0.01" min="0" class="form-control" name="editar_calificacion" id="editar_calificacion" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Clave</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="editar_clave" id="editar_clave">
                                    <option value="1">si</option>
                                    <option value="0">no</option>
                                </select>
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
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Enunciado</label>
                            <div class="col-md-12 col-sm-12 ">
                                <textarea type="text" class="form-control" name="enunciado" id="enunciado"  placeholder="" rows="4" required> </textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Categorias</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="categoria" id="categoria" required>
                                        <option ></option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Numero</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" class="form-control" name="numero" id="numero" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Calificacion</label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" placeholder="1.0" step="0.01" min="0" class="form-control" name="calificacion" id="calificacion" required placeholder="">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align">Clave</label>
                            <div class="col-md-12 col-sm-12 ">
                                <select style="width: 100%" class="form-control carrera seleccion2" name="clave" id="clave" required>
                                    <option value=""></option>
                                    <option value="1">si</option>
                                    <option value="0">no</option>
                                </select>
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
                
                ajax: '{{ route('getPreguntas') }}',
                
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    // {data: 'id'},
                    {data: 'numero'},
                    {data: 'enunciado'},
                    {data: 'calificacion'},
                    {data: 'clave'},
                    {data: 'categoria'},
                    {data: 'Opciones'}
                ],
                rowCallback:function(row, data,index){
                   // 
                    if(data.clave == 1)
                    $('td:eq(3)',row).html('si')
                    else
                    $('td:eq(3)',row).html('no')


                    $('td:eq(5)',row).html('<a class="editar-usuario" href="'+data.id+'"> <i class="fas fa-pencil-alt big-icon text-primary" aria-hidden="true"></i></a>  <a class="eliminar-usuario" href="#"> <i class="fas fa-trash big-icon text-danger" aria-hidden="true"></i></a>')
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
                    url:'allpregunta/'+idUpdate+'/edit',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#editar_enunciado').val(data.enunciado);
             
                        $('#editar_categoria option[value="'+data.id_tipo+'"]').attr("selected", true);
                        $('#editar_numero').val(data.numero);
                        $('#editar_calificacion').val(data.calificacion);
                        $('#editar_clave option[value="'+data.clave+'"]').attr("selected", true);
                        //$('#contrase??a').val('');
                        // var estado = $('.editar_estado');
                        // estado.filter('[value='+data.estado+']').iCheck('check');
                        console.log(data);
                        

                        $('#modal-editar-usuario').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error(error, '??Error!', {timeOut: 5000})
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
                    url:'allpregunta/'+idUpdate,
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
                            toastr.success(data.message, '??Operaci??n Exitosa!', {timeOut: 5000})
                            $('#editar_nombres').val('');
                            // $('#editar_paterno').val('');
                            // $('#editar_materno').val('');
                            // $('#editar_abreviatura').val('');
                            // $('#editar_documento').val('');
                            // $('#editar_email').val('');
                            // $('#editar_contrase??a').val('');
                          
                        }
                        else
                        {
                            toastr.error(data.message, '??Error!', {timeOut: 5000})
                        }
                    },
                    error: function(error) {
                        $('#modal-editar-usuario').modal('hide');
                        //spinner.hide();
                        toastr.error(error, '??Error!', {timeOut: 5000})

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
                    url:'allpregunta',
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
                            toastr.success(data.message, '??Operaci??n Exitosa!', {timeOut: 5000})
                            $('#nombres').val('');
                            $('#tipo').val(null).trigger('change');
                            $('#tipo').val('');
                            
                        }
                        else
                        {
                            toastr.error(data.message, '??Error!', {timeOut: 5000})
                        }
                    },
                    error: function(error) {
                        $('#modal-agregar-usuario').modal('hide');
                       // spinner.hide();
                        toastr.error(error, '??Error!', {timeOut: 5000})
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