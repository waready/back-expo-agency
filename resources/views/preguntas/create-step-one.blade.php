@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <examen></examen>
            {{-- <grafica-component></grafica-component> --}}
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
        jQuery(document).ready(function($){
             var valor = $('#holis').val();
             
             $('#holis').click(function() {
             alert("Checkbox state (method 1) = " + $('#holis').prop('checked'));
             alert("Checkbox state (method 1) = " + $('#holis').is('checked'));
             console.log(valor)
             })
        })
    </script>
@endpush
