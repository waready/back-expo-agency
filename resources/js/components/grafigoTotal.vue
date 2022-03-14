<template>
  <div class="small pt-2">
     <!--h2>Reportes Total de monitoreos:</h2-->
      <!-- {{ tipos }} -->
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                Formulario de filtros:
              </div>
              <div class="card-body">
                <form  @submit.prevent="jalardatos()">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre Institución</label>
                    <input type="text" v-model="form.Nombre" class="form-control" id="exampleFormControlInput1" >
                  </div>
                  <div class="form-group">
                    <label for="ugel">Ugel</label>
                    <select class="form-control" id="ugel" name="Ugel" v-model="form.Ugel">
                      <option value="1">UGEL Puno</option>
                      <option value="2">UGEL Sandia</option>
                      <option value="3">UGEL Azángaro</option>
                      <option value="4">UGEL Crucero</option>
                      <option value="5">UGEL Chucuito</option>
                      <option value="6">UGEL San Román</option>
                      <option value="7">UGEL Huancané</option>
                      <option value="8">UGEL Yunguyo</option>
                      <option value="9">UGEL El Collao</option>
                      <option value="10">UGEL Melgar</option>
                      <option value="11">UGEL Lampa</option>
                      <option value="12">UGEL Carabaya</option>
                      <option value="13">UGEL Moho</option>
                      <option value="14">UGEL San Antonio de Putina</option>
                      <option value="15">DRE Puno</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="rol">Usuario Rol</label>
                    <select class="form-control" id="rol" v-model="form.Rol">
                      <!-- <option value="1">Ficha Especialista</option>
                      <option value="2">Ficha Directores</option> -->
                      <option v-for="(value,index) in tipos" :key="index" :value="value.id">
                        {{ value.nombre }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <select class="form-control" id="nivel" name="nivel" v-model="form.Nivel">
                      <option value="0">NINGUNO</option>
                      <option value="1">ESCOLARIZADO</option>
                      <option value="2">NO ESCOLARIZADO</option>
                      <option value="3">Unidocente(EIB)</option>
                      <option value="4">Multigrado/EIB</option>
                      <option value="5">Polidocente</option>
                      <option value="6">JER</option>
                      <option value="7">JEC</option>
                      <option value="8">CRFA</option>
                      <option value="9">COAR'</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="area">Area</label>
                    <select class="form-control" id="area" name="area" v-model="form.Area">
                      <option value="0">Ninguno</option>
                      <option value="1">Urbano</option>
                      <option value="2">Rural</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <h3> LINEAS</h3>
    <line-chart :chart-data="datacollection" :options="chartOptions"></line-chart> -->

    <h3> BARRAS</h3>
    <bar-chart :chart-data="datacollection" :options="chartOptions"></bar-chart>

    <h3> PIE</h3>
    <pie-chart :chart-data="datacollection" :height="100"></pie-chart>

    <h3> AREA</h3>
    <area-chart :chart-data="datacollection" :height="100"></area-chart>
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
    
    axios.get(`/reportePor`).then((response) =>{
      console.log(response.data);
      this.menssages = response.data;
      
      this.fillData()
      //this.renderChart(this.chartdata, this.options)
    });

  },
  props:['tipos'],
  components: {
    LineChart,
    BarChart,
    PieChart,
    AreaChart
  },
  data(){
    return {
      form:{
        Nombre:"",
        Ugel:null,
        Rol:null,
        Nivel:null,
        Area:null
      },
      numero:null,
      datacollection: null,
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
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var Inicio = 0; 
    var Proceso =0; 
    var Satisfactorio = 0;
    var primero,segundo,tercero = false;

    for(var i=0; i<this.menssages.length;i++){
      if(this.menssages[i].procentaje == null){
        var valorPorcentaje = 0;
      }
      else{
        var valorPorcentaje = (this.menssages[i].procentaje.num/30)*100
      }
       //console.log(valorPorcentaje)
       
        if(valorPorcentaje >= 0 && valorPorcentaje <= 50){
           // labels.push("Inicio")
            // valores.push(this.menssages[i].procentaje.num) 
            Inicio  = Inicio+1;
            primero = true;
            //console.log("i",Inicio)
        } 
        else if(valorPorcentaje >= 51 && valorPorcentaje <= 80){
            //labels.push("Proceso")
            // valores.push(this.menssages[i].procentaje.num)
            Proceso = Proceso+1;
            segundo = true; 
            //console.log("p",Proceso)
        } 
        else if(valorPorcentaje >= 81 && valorPorcentaje <= 100){
            //labels.push("Satisfactorio")
            // valores.push(this.menssages[i].procentaje.num)
            Satisfactorio = Satisfactorio+1;
            tercero = true; 
            //console.log("S",Satisfactorio)
        }
        //valores.push()
        coloR.push(dynamicColors());
    }  
    if(Inicio != 0){
        valores.push(Inicio)
        labels.push("Inicio")
    }
    if(Proceso != 0){
        valores.push(Proceso)
        labels.push("Proceso")
    }
    if(Satisfactorio != 0){
        valores.push(Satisfactorio)
        labels.push("Satisfactorio")
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
    },
    jalardatos(){
      var data = {
        rol:this.form.Rol,
        ugel:this.form.Ugel,
        nivel:this.form.Nivel,
        area:this.form.Area,
        nombre:this.form.Nombre 
      }
      axios.post(`/reporteTotal`, data).then((response) =>{
      console.log(response.data);
      this.menssages = response.data;
      
      this.fillData()
      //this.renderChart(this.chartdata, this.options)
    });
    }
  
  }
}
</script>

<style lang="css">

</style>