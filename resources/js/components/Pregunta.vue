<!-- Author: Wilson Pilco Nunez -->
<!-- Email: wilsonaux1@gmail.com -->
<!-- Created at: 2021-06-26 17:19 -->
<template>
    <div class="form-group">
        <label> {{ pregunta.numero }}.- {{ pregunta.enunciado }}</label>
        <div class="row">
        
            <div class="col-md-6">
                <div class="col-sm-10">
                    <div class="custom-control custom-radio">
                        <input
                            class="custom-control-input"
                            type="radio"
                            :value="1"
                            v-model="picked"
                            :id="`${unique}_p_si`"
                            @change="changeHandler"
                        />
                        <label
                            class="custom-control-label"
                            :for="`${unique}_p_si`"
                        >
                            SI
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input
                            class="custom-control-input"
                            type="radio"
                            :value="0"
                            v-model="picked"
                            :id="`${unique}_p_no`"
                            @change="changeHandler"
                        />
                        <label
                            class="custom-control-label"
                            :for="`${unique}_p_no`"
                        >
                            NO
                        </label>
                    </div>
                </div>
            </div>
           
            <div class="col-md-6" >
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" :id="`${unique}_p`" v-model="mostrar">
                    <label class="custom-control-label" :for="`${unique}_p`">Opción de Evidencia </label>
                </div>

                <div class="form-group" v-show="!mostrar">
                    <label for="exampleFormControlTextarea1"
                        >Evidencia Observacion</label
                    >
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="2"
                        name="obs1"
                        @change="changeHandler"
                        v-model="observacion"
                    ></textarea>
                </div>
                <div class="form-group" v-show="mostrar">
                    <label 
                        >Evidencia Url</label
                    >
                    <input
                        class="form-control"
                        
                        name="url1"
                        @change="changeHandler"
                        v-model="url"
                    />
                </div>
                <div class="form-group" v-show="mostrar">
                    <label 
                        >Evidencia Url</label
                    >
                    <input
                        class="form-control"
                        type="file"
                        name="file1"
                        
                        :id="`${unique}_file`"
                     
                        @change="onFileChange"
                    />
                </div>
            </div>
        <pre>
        
        </pre>
        </div>
    </div>
</template>
<script>
export default {
    components: {
        //
    },

    // directives
    // filters

    props: {
        pregunta: {
            default: () => {},
            required: true,
        },
        idExamenEjecutado: {
            required: true,
        },
    },

    data: () => ({
        unique: null,
        picked: null,
        observacion: null,
        url: null,
        mostrar:false,
        file:null
        
    }),

    computed: {
        //
    },

    // watch: {},

    mounted() {
        this.unique = this._uid;

        if (this.pregunta) {
            this.picked = this.pregunta.respuesta;
            this.observacion = this.pregunta.observacion;
            this.url = this.pregunta.url;
        }
    },

    methods: {
        changeHandler() {
            
            if (this.picked == null) {
                window.alert("selecciona una respuesta primero.");
                return;
            }

        //    var data = {
        //         id_pregunta: this.pregunta.id,
        //         respuesta: this.picked,
        //         observacion: this.observacion,
        //         id_examen_ejecutado: this.idExamenEjecutado,
                
        //     }
            let data = new FormData();
            data.append('id_pregunta', this.pregunta.id);
            data.append('respuesta', this.picked);
            data.append('observacion', this.observacion);
            data.append('id_examen_ejecutado', this.idExamenEjecutado);
            data.append('url', this.url);
            data.append('file', this.file);


            axios.post(window.current_location + "remote/responder",data);
        },
        onFileChange(e) {
         
            this.file = e.target.files[0];

            this.changeHandler();
        },
    
    },
};
</script>

<style scoped></style>
