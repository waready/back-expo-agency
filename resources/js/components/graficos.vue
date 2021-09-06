<template>
  <div class="small">
    <h2>Reportes del Ugel - Especialistas</h2>
    <h3> BARRAS</h3>
    <bar-chart :chart-data="datacollection" :options="chartOptions"></bar-chart>
    <h3> BARRAS PORCENTAJE</h3>
    <bar-chart :chart-data="datacollection1" :options="chartOptions"></bar-chart>
    <!-- <h3> LINEAS</h3>
    <line-chart :chart-data="datacollection" :options="chartOptions"></line-chart> 

    <h3> BARRAS</h3>
    <bar-chart :chart-data="datacollection" :options="chartOptions"></bar-chart>

    <h3> PIE</h3>
    <pie-chart :chart-data="datacollection" :options="chartOptions"></pie-chart>

    <h3> AREA</h3>
    <area-chart :chart-data="datacollection" :options="chartOptions"></area-chart>
    <bar-chart :chart-data="datacollection" :height="100"></bar-chart> -->
  </div>
</template>

<script>

import  LineChart from  './LineChart.js'
import  BarChart from   './BarChart.js'
import  PieChart from   './PieChart.js'
import  AreaChart from  './PolarChart.js'


import axios from 'axios';
export default {
  mounted () {
    
    axios.get(`/especialistaGrafico`).then((response) =>{
      //console.log(response.data);
      this.menssages = response.data;
      
      this.fillData()
      //this.renderChart(this.chartdata, this.options)
    });

  },
  components: {
    LineChart,
    BarChart,
    PieChart,
    AreaChart
  },
  data(){
    return {
      datacollection: null,
      datacollection1: null,
      menssages:[],
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            ticks: {
              min: 0,
            
            }
          }]
        }
      }
    }
  },
 
  methods: {

    fillData ()
    {
    var labels = [];
    var valores = [];
    var porcentaje = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };


    for(var i=0; i<this.menssages.length;i++){
        labels.push(this.menssages[i].nombre) 
        valores.push(this.menssages[i].num)
        var por = (this.menssages[i].num / (this.menssages.length + 1))*100 
        var fin = Math.round(por)
        porcentaje.push(fin)
        console.log(fin);
        coloR.push(dynamicColors());
    }  
    //console.log(, "labels");
      this.datacollection = {
        labels: labels,
        datasets: [
          {
            
            label: 'Ugels',
            backgroundColor: coloR,
            data: valores,
          },
        ]
      }
      this.datacollection1 = {
        labels: labels,
        datasets:[
          {
            label: 'Ugels',
            backgroundColor: coloR,
            data: porcentaje,
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">

</style>