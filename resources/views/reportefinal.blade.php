@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <input type="button"  value="Print" id="btnPrint"> --}}
        <a href="javascript:imprSelec('imprimir')" class="btn btn-success" >Imprimir</a>
        <div class="col-md-12" id="imprimir">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <h4>Monitoreado: <span class="strong">{{$evaluado['nombre']->nombres}} {{$evaluado['nombre']->apellidos}} </span> </h4>  
                <div class="card">
                    <div class="card-header">
                       RESPUESTAS
                    </div>
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
                                    <th>{{ __("Enunciado Pregunta") }}</th>
                                    <th>{{ __("Respuesta") }}</th>
                                    <th>{{ __("Calificación") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($respuestas as $item)
                                    <tr>
                                        
                                        <td>
                                        {{$item->numero}}
                                        </td>
                                        <td>
                                            {{$item->enunciado}}
                                        </td>
                                        <td>
                                            
                                            @if($item->respuesta == 1)
                                                si
                                            @elseif($item->respuesta == 0) 
                                                no
                                            @else
                                                error   
                                            @endif
                                        
                                        </td>
                                        <td>
                                            {{$item->calificacion}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
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
                                <th>{{ __("Categoria") }}</th>
                                {{-- <th>{{ __("Respuesta") }}</th> --}}
                                <th>{{ __("Porcentaje") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $item)
                                <tr>
                                    
                                    <td>
                                       {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->nombre}}
                                    </td>
                                    
                                    <td>
                                        @if($item->procentaje != null)
                                            {{ ($item->procentaje->num/$item->total->num)*100 . "%" }}    
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>   
                
            </div>
            @if($evaluado['porcentaje'] != null)
                {{($evaluado['porcentaje']->num /30) *100 }}
            @else
                0
            @endif
            
      
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://jasonday.github.io/printThis/printThis.js"></script>
<script language="Javascript">
	function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}
	</script>
  
@endpush
