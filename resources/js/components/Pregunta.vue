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
            <div class="col-md-6">
                <div class="form-group">
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
            </div>
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
    },

    data: () => ({
        unique: null,
        picked: null,
        observacion: null,
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
        }
    },

    methods: {
        changeHandler() {
            if (this.picked == null) {
                window.alert("selecciona una respuesta primero.");
                return;
            }
            axios.post(window.current_location + "remote/responder", {
                id_pregunta: this.pregunta.id,
                respuesta: this.picked,
                observacion: this.observacion,
            });
        },
    },
};
</script>

<style scoped></style>
