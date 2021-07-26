

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Charts</h1>
    <div>
        <canvas id="myChart"></canvas>
    </div>
@stop

@section('content')
    <div id="app">
        <grafica-component></grafica-component>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script text="javascript">

        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };
        const config = {
            type: 'bar',
            data,
            options: {}
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@stop