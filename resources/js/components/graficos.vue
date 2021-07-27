<template>
  <div class="small">
    <h4>Reportes del Venta Junio {{menssages.nombre}}|</h4>
    <h3></h3>
    <line-chart :chart-data="datacollection" :height="100"></line-chart>
  </div>
</template>

<script>

import LineChart from './LineChart.js'

import axios from 'axios';
export default {
  mounted () {
    
    axios.get(`/especialistaGrafico`).then((response) =>{
      //console.log(response.data);
      this.menssages = response.data;
      
      this.fillData()
    });

  },
  components: {
    LineChart
  },
  data(){
    return {
      datacollection: null,
      menssages:[]
    }
  },
 
  methods: {

    fillData ()
    {
    var labels = [];
    var valores = [];
    for(var i=0; i<this.menssages.length;i++){
        labels.push(this.menssages[i].nombre) 
        valores.push(this.menssages[i].num) 
    }  
   // console.log(labels, "labels");
      this.datacollection = {
        labels: labels,
        datasets: [
          {
            label: 'Ugels',
            backgroundColor: '#FF0066',
            data: valores,
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin:  50px auto;
}
</style>