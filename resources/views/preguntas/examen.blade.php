<?php

/**
 * Author: Wilson Pilco Nuñez
 * Email: wilsonaux1@gmail.com
 * PHP Version: 7.4
 * Created at: 2021-06-30 17:41
 */
?>


@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <examen tipo="<?= $tipo ?>"></examen>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
  jQuery(document).ready(function($) {
    var valor = $('#holis').val();

    $('#holis').click(function() {
      alert("Checkbox state (method 1) = " + $('#holis').prop('checked'));
      alert("Checkbox state (method 1) = " + $('#holis').is('checked'));
      console.log(valor)
    })
  })
</script>
@endpush
