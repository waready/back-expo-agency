<!-- Author: Wilson Pilco Nunez -->
<!-- Email: wilsonaux1@gmail.com -->
<!-- Created at: 2021-06-26 16:27 -->
<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- <div
                        class="card mb-2"
                        v-for="categoria in categorias"
                        :key="categoria.id"
                    > -->
                    <form-wizard
                        title=""
                        subtitle=""
                        nextButtonText="siguiente"
                        backButtonText="anterior"
                        finishButtonText="Enviar"
                        @on-complete="onComplete"
                    >
                        <tab-content
                            :title="vocabulario[index]"
                            v-for="(categoria, index) in categorias"
                            :key="categoria.id"
                        >
                            <div class="card">
                                <div class="card-header">
                                    {{ categoria.nombre }}
                                </div>
                                <div class="card-body">
                                    <pregunta
                                        v-for="pregunta in preguntas.filter(
                                            (x) =>
                                                x.id_categoria == categoria.id
                                        )"
                                        :key="`pregunta_${pregunta.id}`"
                                        :pregunta="pregunta"
                                        :id-examen-ejecutado="id"
                                    ></pregunta>
                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { FormWizard, TabContent } from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
// import VueFormGenerator from "vue-form-generator";
import axios from "axios";
import _ from "lodash";
export default {
    components: {
        // "vue-form-generator": VueFormGenerator.component,
        FormWizard,
        TabContent,
    },

    // directives
    // filters

    props: {
        // preguntas: {
        //     required: true,
        //     default: () => [],
        // },
        id: { required: true },
        tipo: {
            required: true,
        },
    },

    data: () => ({
        preguntas: [],
        categorias: [],
        vocabulario:['A','B','C','D','E','F','G','H','I','J','K','L','M']
    }),

    computed: {
        //
    },

    // watch: {},

    mounted() {
        const url = window.current_location;
        axios
            .get(`${url}remote/preguntas-lista`, {
                params: { tipo: this.tipo, id_examen_ejecutado: this.id },
            })
            .then((result) => {
                this.preguntas = _.orderBy(result.data, [
                    "categoria_id",
                    "asc",
                ]);
            });

        axios
            .get(url + "remote/categorias-lista", {
                params: { tipo: this.tipo },
            })
            .then((result) => {
                this.categorias = result.data;
            });
    },

    methods: {
        /**alerta, bloquear, redireccionar**/
        /**reporte -si-no  | nivel(llenar)**/
        onComplete(){
            var doc;
            var result = confirm("Desea Finalizar y Enviar sus respuestas.");
            if (result == true) {
              
                location.href="/examenes";
            } else {
                
            }            
        }
    },
};
</script>

<style scoped></style>
