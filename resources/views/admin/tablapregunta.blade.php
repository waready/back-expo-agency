@extends('adminlte::page')

@section('title', 'Tipo')

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
                <div class="card-header">Preguntas :

                    {{-- <button type="button" id="agregar-responsable-carrera" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-agregar-usuario">
                        <i class="fa fa-plus"></i> Agregar
                    </button> --}}
                </div>
                
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
                                    <th>{{ __("Numero") }}</th>
                                    <th>{{ __("Enunciado") }}</th>
                                    <th>{{ __("Calificacion") }}</th>
                                  
                                    <th>{{ __("clave") }}</th>
                                    <th>{{ __("Categoria") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $item)
                                    <tr>
                                        <td>
                                            {{$item->id}}
                                        </td>
                                        <td>
                                            {{$item->numero}}
                                        </td>
                                        <td>
                                            {{$item->enunciado}}
                                        </td>
                                        <td>
                                            {{$item->calificacion}}
                                        </td>
                                        <td>
                                            {{$item->clave}}
                                        </td>
                                        <td>
                                            {{$item->categoria}}
                                        </td>
                                        {{-- <td>
                                            <a class="tabla-usuario" href="/tablaCategorias/'+data.id+'"> <i class="fas fa-eye big-icon text-info" aria-hidden="true"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    {{$categorias->links()}}
                </div>
            </div>
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
    
{{-- @endpush --}}
@stop