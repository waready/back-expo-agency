

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 
    {{-- <div>
        <canvas id="myChart"></canvas>
    </div> --}}
@stop

@section('content')
    <div id="app">
        
        <graficagestion-component></graficagestion-component>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <script text="javascript">
        var valores = [];
        var labels = [];
        jQuery(document).ready(function() {
            // var valores = [28,29,30, 31, 32, 33, 34]
            $.ajax({
                type: "GET",
                dataType: "json",
                url:'especialistaGrafico',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                 
                    for(var i=0; i<data.length;i++){

                      //  labels.push(data[i].nombre) 
                        //valores.push(data[i].num) 
                    }   
                },
                error: function(error) {
                    console.log(error);
                    toastr.error(error, '¡Error!', {timeOut: 5000})
                }
            });

            const data = {
                labels: labels,
                datasets: [{

                    label: 'My First dataset',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        ],
                    borderColor:'rgb(255, 99, 132)',
                
                    
                    data: valores,
                }]
            };
            const config = {
                type: 'bar',
                data,
                options: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true   // minimum value will be 0.
                        }
                    }]
                },
              
            };
            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

        });

            // const labels = [
            //     'January',
            //     'February',
            //     'March',
            //     'April',
            //     'May',
            //     'June',
            //     'Otro',
            // ];
           // console.log(valores);
           
    </script> --}}
@stop