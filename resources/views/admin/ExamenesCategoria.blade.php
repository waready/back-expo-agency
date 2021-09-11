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
                <div class="card-header">Mis Monitoreos Categoria:
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
                                    {{-- <th>{{ __("Codigo") }}</th> --}}
                                    <th>{{ __("Supervisor") }}</th>
                                    <th>{{ __("Supervisado") }}</th>
                                    <th>{{ __("Tipo Examen") }}</th>
                                    <th>{{ __("Fecha") }}</th>
                                    <th>{{ __("Categorias %") }}</th>
                                    <th>{{ __("Procentaje total") }}</th>
                                    {{-- <th>{{ __("Opciones") }}</th> --}}
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
                <h5 class="modal-title">Avance de Monitoreo por Categorias</h5>

                <button onclick="ExportToExcel('xlsx')" > Export table to excel</button>
                <input type="button"  value="Print This" id="btnPrint">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    {{-- <h4>Procentaje</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="barra" ></div>
                    </div>
                    <hr>
                    <h4>Aciertos</h4>
                    <div id="aciertos"></div>
                    <hr>
                    <h4>Respuestas</h4> --}}
                    <div id="dvData">
                        <table width="100%"
                            class="table table-responsive table-bordered nowrap"
                            cellspacing="0"
                            id="students-table1"
                        >
                            <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    {{-- <th>{{ __("Codigo") }}</th> --}}
                                    {{-- <th>{{ __("Monitoreo") }}</th> --}}
                                    <th>{{ __("Categoria") }}</th>
                                    
                                    <th>{{ __("Porcentaje") }}</th>
                                   
                                    
                                </tr>
                            </thead>
                        </table>
                    </div>
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
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.8.0/printThis.min.js" integrity="sha512-q4kY6PLCmuZdhcDXWvOIsRAFQOFfuBe88amMCC9XED+ZbJfk0vxcpzUFD4TjO5fGfKI7e8CPbSrhlxsyFBckMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function printDiv() 
            {

            var divToPrint=document.getElementById('dvData');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

        //    setTimeout(function(){newWin.close();},10);

            }
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

            $("#btnPrint").on("click", function () {
                $("#dvData").printThis({ 
                importCSS: true,
                importStyle: true,//thrown in for extra measure
                loadCSS: "/app/css/printListTable.css",
                header:'<h1>Table Report</h1>'});
            });
            // $(function () { 
            // $("#btnPrint").click(function () {
            //     $("#dvData").printThis();
            // });
            // });


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
                    {data: 'procentaje'},
                    // {data: 'Opciones'},

                ],
                rowCallback:function(row, data,index){
                    var valeur1
                     
                    //console.log(data.porcentaje.num)
                    if(data.procentaje != null){
                        //  valeur1 = (data.procentaje.num * 3.3)
                        var procentaje= (data.procentaje.num / 30)*100;
                        valeur1 = Math.round( procentaje );

                    }else{
                        valeur1 = 0;
                    }
                    $('td:eq(5)',row).html('<a class="tabla-usuario" href="'+data.id+'"> <i class="fas fa-percent big-icon text-info" aria-hidden="true"></i></a>')
                    $('td:eq(6)',row).html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+valeur1+'%">'+valeur1+'%</div></div>')
                   
                }
                
            });
            $(document).on('click', '.eliminar-usuario', function(e) {
                // $('.file-firma').val(null);
                // $('.file1').html('Seleccione su archivo...');
                e.preventDefault();
                
                idUpdate = $(this).attr('href');
                //alert(idUpdate);
                var txt;
                var r = confirm("Seguro que quiere eliminar evaluacion?!");
                if (r == true) {
                    $.ajax({
                    type: "DELETE",
                    dataType: "json",
                    url:'eliminarExamen/'+idUpdate,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        dt.ajax.reload();
                        console.log(data);
                        toastr.success(data.message, '¡Operación Exitosa!', {timeOut: 5000});
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error(error, '¡Error!', {timeOut: 5000})
                    }
                });
                } else {
                  //aler('cagada')
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
                       
                        //$('#barra').css('width', valeur+'%').attr('aria-valuenow', valeur);  
                        dt1 = jQuery("#students-table1").DataTable({
                            pageLength: 30,
                            lengthMenu: [15, 25, 50, 75, 100 ],
                            processing: true,
                            "bDestroy": true,
                            ajax: 'tablaExamenCategoria/'+idUpdate+'',
                            
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                            },
                            columns: [
                                {data: 'id'},
                               // {data: 'tipo'},
                                {data: 'nombre'},
                                {data: 'Opciones'},
                           
                            ],
                            rowCallback:function(row, data,index){
                                var valeur2, total
                     
                                //console.log(data.porcentaje.num)
                                if(data.procentaje != null){
                                    //  valeur1 = (data.procentaje.num * 3.3)
                                    //console.log('tag', data.procentaje.num , data.total.num)
                                    var procentaje= (data.procentaje.num / data.total.num)*100;
                                    valeur2 = Math.round( procentaje );
            
                                }else{
                                    valeur2 = 0;
                                }
                                $('td:eq(2)',row).html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+valeur2+'%">'+valeur2+'%</div></div>')
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
            $("#btnExport").click(function (e) {
                window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
                e.preventDefault();
            });


        })

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('students-table1');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('Respuestas.' + (type || 'xlsx')));
    }
    </script>
@stop
{{-- @endpush --}}