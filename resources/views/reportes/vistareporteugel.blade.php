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
                <div class="card-header"> Generar Reporte Especialista Ugel 
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('reportesallUgel') }}" novalidate>
                        <div class="portlet-body">
                            <div class="task-content">
                                <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                    <!-- START TASK LIST -->
                                    <div class="row">
                                        <div class="col-md-4">  
                                            <ul class="task-list">
                                                {{-- <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="1" />
                                                    </label>
                                                    <span class="task-title-sp">Apellidos</span>
                                                </li> --}}
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="2"  required/>
                                                        
                                                    </label>
                                                    <span class="task-title-sp">Nombres</span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="3" />
                                                        
                                                    </label>
                                                    <span class="task-title-sp"> DNI </span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="4" />
                                                        
                                                    </label>
                                                    <span class="task-title-sp"> Telefono/Celular </span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="5" />
                                                        
                                                    </label>
                                                    <span class="task-title-sp">Ugel </span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="6" />
                                                    
                                                    </label>
                                                    <span class="task-title-sp"> Rol </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="task-list"> 
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="7" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp">Correo Electronico  </span>
                                                </li>
                                                <li >
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="8" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp"> Nivel</span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="9" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp">Area</span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="10" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp">Gestion</span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="11" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp">Condición</span>
                                                </li>
                                                <li>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" name="12" />
                                                        <span></span>
                                                    </label>
                                                    <span class="task-title-sp"> Cargo </span>
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- <div class="col-md-4"> 

                                            <ul class="task-list">
                                                <li>
                                                    
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="14" />
                                                            <span></span>
                                                        </label>
                                                
                                              
                                                        <span class="task-title-sp"> Código CIP </span>
                                                    
                                                  
                                            
                                                </li>
                                                <li>
                                                    
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="15" />
                                                            <span></span>
                                                        </label>
                                                   
                                                    
                                                        <span class="task-title-sp">Tipo de Colegiado </span>
                                                        
                                                  
                                            
                                                </li>
                                                <li>
                                                   
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="16" />
                                                            <span></span>
                                                        </label>
                                                    
                                                    
                                                        <span class="task-title-sp"> Estado de Colegiado </span>
                                                    
                                                        
                                                
                                                </li>
                                                <li>
                                                    
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="17" />
                                                            <span></span>
                                                        </label>
                                                  
                                                    
                                                        <span class="task-title-sp"> Lugar de Nacimiento</span>
                                                       
                                                
                                                </li>
                                                <li class="last-line">
                                                   
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="18" />
                                                            <span></span>
                                                        </label>
                                                   
                                                    
                                                        <span class="task-title-sp"> DNI </span>
                                                    
                                               
                                                    
                                                </li>
                                                <li class="last-line">
                                                    
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" name="19" />
                                                            <span></span>
                                                        </label>
                                                   
                                                   
                                                        <span class="task-title-sp"> Hábil hasta </span>
                                                    
                                                    
                                                    
                                                </li>
                                            </ul>
                                        </div> --}}

                                    </div>
                                
                                    <!-- END START TASK LIST -->
                                </div>
                            </div>
                            
                           
                        </div>
                        
                    
                </div>

                <div class="card-footer">
                    <div class="actions">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success"  target="_blank"  > Exportar
                                <i class="fa fa-download"></i>
                            </button>
                            
                        </div>
                        
                    </div>
               
                </div>
            </form>
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
