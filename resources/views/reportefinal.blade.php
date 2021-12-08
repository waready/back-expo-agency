
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form  class="form-inline" action="{{route('video.store')}}"  method="POST" >
            {{csrf_field()}}
            <div class="form-group ">
                <label for="exampleInputEmail1" class="mr-1">Email : </label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="correo electronico">
            </div>
            <input id="url" name="url" type="hidden" value="{{$id}}">
            <button type="submit" class="btn btn-primary ml-2">Enviar</button>
        </form>
    </div>
    <div class="row justify-content-center">
        {{-- <input type="button"  value="Print" id="btnPrint"> --}}
       
       <div class="row">
            <a href="javascript:imprSelec('imprimir')" class="btn btn-success" >Imprimir</a>
       </div>
        
        <div class="col-md-12" id="imprimir">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <h4>Monitoreado: <span class="strong">{{$evaluado['nombre']->nombres}} {{$evaluado['nombre']->apellidos}} </span> </h4> 
                    </div>
                    <div class="col">
                        <h4 class="float-right">Monitor: <span class="strong">{{$evaluado['monitor']->nombres}} {{$evaluado['monitor']->apellidos}} </span> </h4> 
                    </div>
                </div>
                 

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

                                        @if($item->aciertos == 1)
                                            1.00
                                        @elseif($item->aciertos == 0) 
                                            0.00
                                        @else 
                                            error
                                        @endif
                                            
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
                                <th>{{ __("Desempeño") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $item)
                                <tr>
                                    
                                    <td>
                                       {{$item->id}}
                                    </td>
                                    <td>
                                    @if($item->procentaje != null)
                                            {{ $item->procentaje->nombre}}    
                                       
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($item->procentaje != null)
                                            {{ number_format(($item->procentaje->num/$item->total->num)*100) . "%" }}    
                                        @endif
                                    </td>
                                    <td>
                                    @if($item->procentaje != null)  
                                        @if( (number_format(($item->procentaje->num/$item->total->num)*100) ) >= 0 &&  (number_format(($item->procentaje->num/$item->total->num)*100) ) <= 50)
                                            <p>Inicio </p>  
                                        @elseif( (number_format(($item->procentaje->num/$item->total->num)*100) ) >= 51 &&  (number_format(($item->procentaje->num/$item->total->num)*100) ) <= 80)
                                            <p>Proceso</p>
                                        @elseif( (number_format(($item->procentaje->num/$item->total->num)*100) ) >= 81 &&  (number_format(($item->procentaje->num/$item->total->num)*100) ) <= 100)
                                           <p>Satisfactorio</p>
                                        @endif
                                    
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>   
                
            </div>
            <div class="text-center">
                Resultado:
                @if($evaluado['porcentaje'] != null)  
                    @if( (($evaluado['porcentaje']->num /30) *100) >= 0 &&  (($evaluado['porcentaje']->num /30) *100) <= 50)
                        <h2>Inicio</h2>  
                    @elseif( (($evaluado['porcentaje']->num /30) *100) >= 51 &&  (($evaluado['porcentaje']->num /30) *100) <= 80)
                        <h2>Proceso</h2>
                    @elseif( (($evaluado['porcentaje']->num /30) *100) >= 81 &&  (($evaluado['porcentaje']->num /30) *100) <= 100)
                        <h2>Satisfactorio</h2>
                    @endif
                @else
                    0
                @endif
            </div>
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
        //css
        var css = ventimp.document.createElement("link");
        css.setAttribute("href", "{{ asset('css/app.css') }}");
        css.setAttribute("rel", "stylesheet");
        css.setAttribute("type", "text/css");
        ventimp.document.head.appendChild(css);
        //css
	  ventimp.print( );
	  ventimp.close();
	}
	</script>
  
@endpush
