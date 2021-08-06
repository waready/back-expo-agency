<template>
  <div class="small">
    <h2>Reportes de Area - Director</h2>
    <!-- <h3> LINEAS</h3>
    <line-chart :chart-data="datacollection" :options="chartOptions"></line-chart> -->

    <h3> BARRAS</h3>
    <bar-chart :chart-data="datacollection" :options="chartOptions"></bar-chart>

    <h3> PIE</h3>
    <pie-chart :chart-data="datacollection" :options="chartOptions"></pie-chart>

    <h3> AREA</h3>
    <area-chart :chart-data="datacollection" :options="chartOptions"></area-chart>
    <!-- <bar-chart :chart-data="datacollection" :height="100"></bar-chart> -->
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
    
    axios.get(`/DirectorGraficoArea`).then((response) =>{
      console.log(response.data);
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
      menssages:[],
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
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
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };


    for(var i=0; i<this.menssages.length;i++){
       
        if(this.menssages[i].area == 1){
            labels.push("Urbano")
        } 
        else if(this.menssages[i].area == 2){
            labels.push("Rural")
        } 
        valores.push(this.menssages[i].num) 
        coloR.push(dynamicColors());
    }  
   // console.log(labels, "labels");
      this.datacollection = {
        labels: labels,
        datasets: [
          {
            label: 'Area',
            backgroundColor: coloR,
            data: valores,
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">

</style>