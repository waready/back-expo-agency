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
                <div class="card-header">Director 
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
                                    <th>{{ __("Gestión") }}</th>
                                    <th>{{ __("Área") }}</th>
                                    <th>{{ __("Nivel") }}</th>
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
                <h5 class="modal-title">Editar Director</h5>
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
                            <label class="col-form-label col-md-4 col-sm-3 label-align">NIVEL:</label>
                            <div class="row container">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="editar_gridRadios1" value="1" >
                                    <label class="form-check-label" for="gridRadios1">
                                        inicial
                                    </label>
                                    <div id="editar_subnivel1">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="editar_nivel1" id="editar_nivel1" >
                                            <option ></option>
                                            <option value="1">ESCOLARIZADO</option>
                                            <option value="2">NO ESCOLARIZADO</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="editar_gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        primaria
                                    </label>
                                    <div id="editar_subnivel2">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="editar_nivel2" id="editar_nivel2" >
                                            <option ></option>
                                            <option value="3">Unidocente(EIB)</option>
                                            <option value="4">Multigrado/EIB</option>
                                            <option value="5">Polidocente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="editar_gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">
                                        secundaria
                                    </label>
                                    <div id="editar_subnivel3">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="editar_nivel3" id="editar_nivel3" >
                                            <option ></option>
                                            <option value="6">JER</option>
                                            <option value="7">JEC</option>
                                            <option value="8">CRFA</option>
                                            <option value="9">COAR</option>
                                        </select>
                                    </div>
                                </div>
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
                <h5 class="modal-title">Agregar Nuevo Director</h5>
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
                            <label class="col-form-label col-md-4 col-sm-3 label-align">NIVEL:</label>
                            <div class="row container">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" >
                                    <label class="form-check-label" for="gridRadios1">
                                        inicial
                                    </label>
                                    <div id="subnivel1">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="nivel1" id="nivel1" >
                                            <option ></option>
                                            <option value="1">ESCOLARIZADO</option>
                                            <option value="2">NO ESCOLARIZADO</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        primaria
                                    </label>
                                    <div id="subnivel2">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="nivel2" id="nivel2" >
                                            <option ></option>
                                            <option value="3">Unidocente(EIB)</option>
                                            <option value="4">Multigrado/EIB</option>
                                            <option value="5">Polidocente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">
                                        secundaria
                                    </label>
                                    <div id="subnivel3">
                                        <select style="width: 100%" class="form-control carrera seleccion2" name="nivel3" id="nivel3" >
                                            <option ></option>
                                            <option value="6">JER</option>
                                            <option value="7">JEC</option>
                                            <option value="8">CRFA</option>
                                            <option value="9">COAR</option>
                                        </select>
                                    </div>
                                </div>
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

            $('#subnivel1').hide();
            $('#subnivel2').hide();
            $('#subnivel3').hide();
            var valor = $('#gridRadios1').val();
             
            $('#gridRadios1').click(function() {
     
                $('#subnivel1').show();
                $('#subnivel2').hide();
                $('#subnivel3').hide();

                $('#nivel2').val(null).trigger('change');
                $('#nivel2').val('');
                $('#nivel3').val(null).trigger('change');
                $('#nivel3').val('');  
             })
            $('#gridRadios2').click(function() {
            
                $('#subnivel2').show();
                $('#subnivel1').hide();
                $('#subnivel3').hide();

                $('#nivel1').val(null).trigger('change');
                $('#nivel1').val('');
                $('#nivel3').val(null).trigger('change');
                $('#nivel3').val('');  
                     
            })
             $('#gridRadios3').click(function() {
         
                $('#subnivel3').show();
                $('#subnivel2').hide();
                $('#subnivel1').hide();

                $('#nivel2').val(null).trigger('change');
                $('#nivel2').val('');
                $('#nivel1').val(null).trigger('change');
                $('#nivel1').val('');
            })

            // $('#editar_subnivel1').hide();
            // $('#editar_subnivel2').hide();
            // $('#editar_subnivel3').hide();
            // var valor = $('#editar_gridRadios1').val();
             
            $('#editar_gridRadios1').click(function() {
     
                $('#editar_subnivel1').show();
                $('#editar_subnivel2').hide();
                $('#editar_subnivel3').hide();

                $('#editar_nivel2').val(null).trigger('change');
                $('#editar_nivel2').val('');
                $('#editar_nivel3').val(null).trigger('change');
                $('#editar_nivel3').val('');  
             })
            $('#editar_gridRadios2').click(function() {
            
                $('#editar_subnivel2').show();
                $('#editar_subnivel1').hide();
                $('#editar_subnivel3').hide();

                $('#editar_nivel1').val(null).trigger('change');
                $('#editar_nivel1').val('');
                $('#editar_nivel3').val(null).trigger('change');
                $('#editar_nivel3').val('');  
                     
            })
             $('#editar_gridRadios3').click(function() {
         
                $('#editar_subnivel3').show();
                $('#editar_subnivel2').hide();
                $('#editar_subnivel1').hide();

                $('#editar_nivel2').val(null).trigger('change');
                $('#editar_nivel2').val('');
                $('#editar_nivel1').val(null).trigger('change');
                $('#editar_nivel1').val('');
            })

            dt = jQuery("#students-table").DataTable({
                pageLength: 15,
                lengthMenu: [15, 25, 50, 75, 100 ],
                processing: true,
                
                ajax: '{{ route('getDirector') }}',
                
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
                    {data: 'gestion'},
                    {data: 'area'},
                    {data: 'nivel'},
                    {data: 'nombre'},
                    {data: 'Opciones'}
                ],
                rowCallback:function(row, data,index){
                   // 
                    if(data.gestion == 0)
                    $('td:eq(7)',row).html('Ninguno')
                    if(data.gestion == 1)
                    $('td:eq(7)',row).html('Estatal')
                    if(data.gestion == 2)
                    $('td:eq(7)',row).html('No Estatal')
                    
                    if(data.area == 0)
                    $('td:eq(8)',row).html('Ninguno')
                    if(data.area == 1)
                    $('td:eq(8)',row).html('Urbano')
                    if(data.area == 2)
                    $('td:eq(8)',row).html('Rural')
                    
                    if(data.nivel == 1)
                    $('td:eq(9)',row).html('ESCOLARIZADO')
                    if(data.nivel == 2)
                    $('td:eq(9)',row).html('NO ESCOLARIZADO')
                    if(data.nivel == 3)
                    $('td:eq(9)',row).html('Unidocente(EIB)')
                    if(data.nivel == 4)
                    $('td:eq(9)',row).html('Multigrado/EIB')
                    if(data.nivel == 5)
                    $('td:eq(9)',row).html('Polidocente')
                    if(data.nivel == 6)
                    $('td:eq(9)',row).html('JER')
                    if(data.nivel == 7)
                    $('td:eq(9)',row).html('JEC')
                    if(data.nivel == 8)
                    $('td:eq(9)',row).html('CRFA')
                    if(data.nivel == 9)
                    $('td:eq(9)',row).html('COAR')

                    $('td:eq(11)',row).html(
                      '<a class="editar-usuario" href="'+data.id+'"> <i class="fas fa-pencil-alt big-icon text-primary" aria-hidden="true"></i></a>' +
                      '<a href="<?= url('/pre-ejecucion-examen/2/') . '/' . auth()->id() . '/' ?>'+data.id+'"> <i class="fas fa-file-alt big-icon text-info" aria-hidden="true"></i></a>' +
                      '<a class="eliminar-usuario" href="#"> <i class="fas fa-trash big-icon text-danger" aria-hidden="true"></i></a>')
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
                    url:'allDirector/'+idUpdate+'/edit',
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

                        switch(data.nivel) {
                            case 1:
                                $('#editar_subnivel1').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel3').hide();
                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel3').val(null).trigger('change');
                                $('#editar_nivel3').val(''); 
                                jQuery("#editar_gridRadios1").attr('checked', true);

                                $('#editar_nivel1 option[value="'+data.nivel+'"]').attr("selected", true);

                                break;
                            case 2: 
                                $('#editar_subnivel1').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel3').hide();
                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel3').val(null).trigger('change');
                                $('#editar_nivel3').val(''); 
                                jQuery("#editar_gridRadios1").attr('checked', true);
                                
                                $('#editar_nivel1 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 3:
                                $('#editar_subnivel2').show();
                                $('#editar_subnivel1').hide();
                                $('#editar_subnivel3').hide();

                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                $('#editar_nivel3').val(null).trigger('change');
                                $('#editar_nivel3').val('');  
                                jQuery("#editar_gridRadios2").attr('checked', true);
                                
                                $('#editar_nivel2 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 4:
                                $('#editar_subnivel2').show();
                                $('#editar_subnivel1').hide();
                                $('#editar_subnivel3').hide();

                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                $('#editar_nivel3').val(null).trigger('change');
                                $('#editar_nivel3').val('');  
                                jQuery("#editar_gridRadios2").attr('checked', true);
                                
                                $('#editar_nivel2 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 5:
                                $('#editar_subnivel2').show();
                                $('#editar_subnivel1').hide();
                                $('#editar_subnivel3').hide();

                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                $('#editar_nivel3').val(null).trigger('change');
                                $('#editar_nivel3').val('');  
                                jQuery("#editar_gridRadios2").attr('checked', true);
                                
                                $('#editar_nivel2 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 6:
                                $('#editar_subnivel3').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel1').hide();

                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                jQuery("#editar_gridRadios3").attr('checked', true);
                                
                                $('#editar_nivel3 option[value="'+data.nivel+'"]').attr("selected", true);

                                break;
                            case 7:
                                $('#editar_subnivel3').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel1').hide();

                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                jQuery("#editar_gridRadios3").attr('checked', true);
                                
                                $('#editar_nivel3 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 8:
                                $('#editar_subnivel3').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel1').hide();

                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                jQuery("#editar_gridRadios3").attr('checked', true);
                                
                                $('#editar_nivel3 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            case 9:
                                $('#editar_subnivel3').show();
                                $('#editar_subnivel2').hide();
                                $('#editar_subnivel1').hide();

                                $('#editar_nivel2').val(null).trigger('change');
                                $('#editar_nivel2').val('');
                                $('#editar_nivel1').val(null).trigger('change');
                                $('#editar_nivel1').val('');
                                jQuery("#editar_gridRadios3").attr('checked', true);
                                
                                $('#editar_nivel3 option[value="'+data.nivel+'"]').attr("selected", true);
                                break;
                            default:
                            // code block
                        }
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
                    url:'allDirector/'+idUpdate,
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
                            // $('#editar_dni').val('');
                            // $('#editar_nombres').val('');
                            // $('#editar_apellidos').val('');
                
                          
                            // $('#editar_ugel').val(null).trigger('change');
                            // $('#editar_ugel').val('');

                            // $('#editar_email').val('');
                            
                            // $('#editar_celular').val('');
                            // $('#editar_condicion').val('');
                            // $('#editar_cargo').val('');
                           
                            // $('#editar_gestion').val(null).trigger('change');
                            // $('#editar_gestion').val('');
                        
                            // $('#editar_area').val(null).trigger('change');
                            // $('#editar_area').val('');
                          
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
                    url:'allDirector',
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
                            $('#dni').val('');
                            $('#nombres').val('');
                            $('#apellidos').val('');
                
                          
                            $('#ugel').val(null).trigger('change');
                            $('#ugel').val('');

                            $('#email').val('');
                            
                            $('#celular').val('');
                            $('#condicion').val('');
                            $('#cargo').val('');
                           
                            $('#gestion').val(null).trigger('change');
                            $('#gestion').val('');
                        
                            $('#area').val(null).trigger('change');
                            $('#area').val('');
                            
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
                $('#dni').val('');
                $('#nombres').val('');
                $('#apellidos').val('');
               
                $('#ugel').val(null).trigger('change');
                $('#ugel').val('');

                $('#email').val('');
                
                $('#celular').val('');
                $('#condicion').val('');
                $('#cargo').val('');
                
                $('#gestion').val(null).trigger('change');
                $('#gestion').val('');
            
                $('#area').val(null).trigger('change');
                $('#area').val('');

                jQuery("#gridRadios1").attr('checked', false);
                jQuery("#gridRadios2").attr('checked', false);
                jQuery("#gridRadios3").attr('checked', false);

                $('#nivel1').val(null).trigger('change');
                $('#nivel1').val('');
                $('#nivel2').val(null).trigger('change');
                $('#nivel2').val('');
                $('#nivel3').val(null).trigger('change');
                $('#nivel3').val(''); 
            })
        })
    </script>
{{-- @endpush --}}
@stop
