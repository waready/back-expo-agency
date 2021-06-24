<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            {{$data.preguntas}}
                <form-wizard title="" subtitle="" nextButtonText="siguiente"  backButtonText="anterior">
                    <tab-content title="A">
                        <div class="card">
                            <div class="card-header">A) Especialistas fortalecen capacidades a directivos y docentes para la ejecución del trabajo a distancia y educación virtual</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label > 1. Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para fortalecer el uso de entornos virtuales.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[0].pre1 === '1'" @change="preguntas[0].pre1 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[0].pre1 === '0'" @change="preguntas[0].pre1 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 2. Promueve comunidades virtuales de aprendizaje con directivos y/o docentes a fin de fortalecer la gestión institucional y/o las capacidades pedagógicas.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[1].pre2 === '1'" @change="preguntas[1].pre2 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[1].pre2 === '0'" @change="preguntas[1].pre2 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 3. Utiliza herramientas virtuales Google Workspace (Classroom) y otros en el trabajo con directivos y/o docentes para el fortalecimiento de la gestión institucional y/o las capacidades pedagógicas.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[2].pre3 === '1'" @change="preguntas[2].pre3 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[2].pre3 === '0'" @change="preguntas[2].pre3 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label >4. Realiza monitoreo y asistencia técnica a directivos y/o docentes en el uso de Google Workspace (Classroom) y otros. </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[3].pre4 === '1'" @change="preguntas[3].pre4 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[3].pre4 === '0'" @change="preguntas[3].pre4 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </tab-content>
                    
                    <tab-content title="B">
                        <div class="card">
                            <div class="card-header">B)  Especialistas desarrollan soporte socioemocional a directivos y docentes</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label > 5. Participa de las actividades de soporte socioemocional organizadas por la DREP u otras instituciones</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[4].pre5 === '1'" @change="preguntas[4].pre5 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[4].pre5 === '0'" @change="preguntas[4].pre5 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 6. Desarrolla actividades de soporte socioemocional a directivos  y/o docentes en reuniones, jornadas de trabajo, asistencias técnicas u otros.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[5].pre6 === '1'" @change="preguntas[5].pre6 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[5].pre6 === '0'" @change="preguntas[5].pre6 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 7. Promueve en directores y docentes el uso de estrategias para el acompañamiento socioafectivo y cognitivo en los estudiantes.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[6].pre7 === '1'" @change="preguntas[6].pre7 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[6].pre7 === '0'" @change="preguntas[6].pre7 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs7"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label >8. Realiza monitoreo a directivos y/o docentes acerca del desarrollo de actividades de soporte socioemocional en el marco del diálogo reflexivo.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[7].pre8 === '1'" @change="preguntas[7].pre8 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[7].pre8 === '0'" @change="preguntas[7].pre8 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs8"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </tab-content>

                    <tab-content title="C">
                        <div class="card">
                            <div class="card-header">C) Especialistas implementan a directivos y docentes en el “Aprendizaje Basado en Proyectos”</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label >9. Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para implementar el “Aprendizaje Basado en Proyectos”. </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[8].pre9 === '1'" @change="preguntas[8].pre9 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[8].pre9 === '0'" @change="preguntas[8].pre9 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs9"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label >10. Realiza fortalecimiento de capacidades a directivos y/o docentes sobre el “Aprendizaje Basado en Proyectos”.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[9].pre10 === '1'" @change="preguntas[9].pre10 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[9].pre10 === '0'" @change="preguntas[9].pre10 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label >11. Realiza fortalecimiento de capacidades a directivos y/o docentes sobre la mediación y evaluación del “Aprendizaje Basado en Proyectos”.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[10].pre11 === '1'" @change="preguntas[10].pre11 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[10].pre11 === '0'" @change="preguntas[10].pre11 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs11"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label >12. Realiza monitoreo y asistencia técnica a directivos y/o docentes en el “Aprendizaje Basado en Proyectos”.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[11].pre12 === '1'" @change="preguntas[11].pre12 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[11].pre12 === '0'" @change="preguntas[11].pre12 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs12"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </tab-content>
                    
                    <tab-content title="D">
                        <div class="card">
                            <div class="card-header">D) Especialistas implementan acciones de prevención y cuidados frente a la COVID-19</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label > 13. Participa del fortalecimiento de capacidades sobre la prevención y cuidado de la COVID – 19..</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[12].pre13 === '1'" @change="preguntas[12].pre13 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[12].pre13 === '0'" @change="preguntas[12].pre13 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs13"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 14. Considera en su plan de trabajo, estrategias para el cuidado y prevención frente a la COVID -19.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[13].pre14 === '1'" @change="preguntas[13].pre14 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[13].pre14 === '0'" @change="preguntas[13].pre14 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs14"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 15. Realiza orientaciones a directivos y/o docentes sobre la prevención y cuidado frente a la COVID -19.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[14].pre15 === '1'" @change="preguntas[14].pre15 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[14].pre15 === '0'" @change="preguntas[14].pre15 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs15"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                        </div>
                    </tab-content>

                    <tab-content title="E">
                        <div class="card">
                            <div class="card-header">E) Especialistas implementan actividades complementarias para fortalecer la estrategia “Aprendo en casa”.</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label > 16. Participa en las jornadas pedagógicas organizadas por la DREP u otras instituciones sobre planificación, mediación y evaluación formativa.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[15].pre16 === '1'" @change="preguntas[15].pre16 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[15].pre16 === '0'" @change="preguntas[15].pre16 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs16"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 17. Realiza el fortalecimiento dirigido a directivos y/o docentes en planificación, mediación y evaluación formativa.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[16].pre17 === '1'" @change="preguntas[16].pre17 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[16].pre17 === '0'" @change="preguntas[16].pre17 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs17"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 18. Efectúa el fortalecimiento en la diversificación de las experiencias de aprendizaje de “Aprendo en casa” vinculandola con el uso de recursos tecnológicos como gestor de contenidos, aplicativos y utilitarios de las tabletas.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[17].pre18 === '1'" @change="preguntas[17].pre18 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[17].pre18 === '0'" @change="preguntas[17].pre18 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs18"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label > 19. Efectúa acciones para garantizar que los docentes desarrollen los cursos del “Programa Nacional para la mejora  de los aprendizajes”.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[18].pre19 === '1'" @change="preguntas[18].pre19 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[18].pre19 === '0'" @change="preguntas[18].pre19 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs19"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 20. Fortalece a directivos y/o docentes sobre la implementación y desarrollo del “Plan lector” y “Leemos juntos”.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[19].pre20 === '1'" @change="preguntas[19].pre20 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[19].pre20 === '0'" @change="preguntas[19].pre20 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 21. Orienta a directivos y docentes modelando sobre los componentes de las experiencias de aprendizaje para el desarrollo de las competencias, promoviendo la integración de las áreas curriculares.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[20].pre21 === '1'" @change="preguntas[20].pre21 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[20].pre21 === '0'" @change="preguntas[20].pre21 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs21"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 22. Promueve espacios de intercambio de experiencias de aprendizaje innovadoras y creativas en el marco inclusivo e intercultural a directivos y docentes.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[21].pre22 === '1'" @change="preguntas[21].pre22 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[21].pre22 === '0'" @change="preguntas[21].pre22 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs22"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 23. Realiza asistencia técnica sobre el “Acompañamiento del aprendizaje” a directivos y docentes a través de GIAs, talleres virtuales u otros.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[22].pre23 === '1'" @change="preguntas[22].pre23 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[22].pre23 === '0'" @change="preguntas[22].pre23 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs23"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 24. Promueve la aplicación de estrategias de mediación para el desarrollo de competencias  a directivos y/o docentes, permitiéndoles reflexionar y ajustar su práctica pedagógica.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[23].pre24 === '1'" @change="preguntas[23].pre24 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[23].pre24 === '0'" @change="preguntas[23].pre24 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs24"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 25. Brinda orientaciones sobre la evaluación para el aprendizaje referidos a formulación de criterios, instrumentos y retroalimentación. </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[24].pre25 === '1'" @change="preguntas[24].pre25 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[24].pre25 === '0'" @change="preguntas[24].pre25 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs25"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 26. Realiza orientaciones sobre la evaluación del aprendizaje de acuerdo a la normativa nacional con fines de promoción y certificación de los aprendizajes.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[25].pre26 === '1'" @change="preguntas[25].pre26 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[25].pre26 === '0'" @change="preguntas[25].pre26 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs26"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label > 27. Efectúa el monitoreo y la asistencia técnica de los procesos curriculares y didácticos para el desarrollo de experiencias de aprendizaje en el marco del diálogo reflexivo.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[26].pre27 === '1'" @change="preguntas[26].pre27 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[26].pre27 === '0'" @change="preguntas[26].pre27 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs27"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>           
                        </div>
                    </tab-content>

                    <tab-content title="F">
                        <div class="card">
                            <div class="card-header">F) Especialistas implementan la construcción de una ciudadanía más allá del bicentenario.</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label > 28. Impulsa la participación de los diferentes actores  educativos en el desarrollo de actividades por el Bicentenario de nuestra independencia.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[27].pre28 === '1'" @change="preguntas[27].pre28 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[27].pre28 === '0'" @change="preguntas[27].pre28 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs28"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label > 29. Promueve la ejecución de diversas actividades con participación estudiantil con el objetivo de reflexionar sobre el Bicentenario de nuestra independencia.</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[28].pre29 === '1'" @change="preguntas[28].pre29 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[28].pre29 === '0'" @change="preguntas[28].pre29 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs29"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > 30. Fomenta espacios de análisis y reflexión con participación de las autoridades e instituciones de la sociedad civil para establecer  compromisos desde el Bicentenario. </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[29].pre30 === '1'" @change="preguntas[29].pre30 = $event.target.value" value="1"  >
                                                    <label class="form-check-label" for="gridRadios1">
                                                        si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" :checked="preguntas[29].pre30 === '0'" @change="preguntas[29].pre30 = $event.target.value" value="0">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="obs30"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">enviar</button>
                            </div>
                        </div>
                    </tab-content>
                    
                    <tab-content title="Resultado">
                        Yuhuuu! This seems pretty damn simple
                    </tab-content>
                </form-wizard>

            </div>
        </div>
    </div>
</template>

<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VueFormGenerator from "vue-form-generator"
import 'vue-form-generator/dist/vfg.css'
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            "vue-form-generator": VueFormGenerator.component,
            FormWizard,
            TabContent
        },
        data(){
            return {
                radio:false,
                mensaje:"",
                preguntas:[
                    {pre1:""},
                    {pre2:""},
                    {pre3:""},
                    {pre4:""},
                    {pre5:""},
                    {pre6:""},
                    {pre7:""},
                    {pre8:""},
                    {pre9:""},
                    {pre10:""},
                    {pre11:""},
                    {pre12:""},
                    {pre13:""},
                    {pre14:""},
                    {pre15:""},
                    {pre16:""},
                    {pre17:""},
                    {pre18:""},
                    {pre19:""},
                    {pre20:""},
                    {pre21:""},
                    {pre22:""},
                    {pre23:""},
                    {pre24:""},
                    {pre25:""},
                    {pre26:""},
                    {pre27:""},
                    {pre28:""},
                    {pre29:""},
                    {pre30:""},


                ],


                model:{
                    id: 1,
                    name: 'John Doe',
                    password: 'J0hnD03!x4',
                    skills: ['Javascript', 'VueJS'],
                    email: 'john.doe@gmail.com',
                    status: true
                },
                schema: {
                fields: [
                {
                    type: 'input',
                    inputType: 'text',
                    label: 'ID (disabled text field)',
                    model: 'id',
                    readonly: true,
                    disabled: true
                },
                {
                    type: 'input',
                    inputType: 'text',
                    label: 'Name',
                    model: 'name',
                    placeholder: 'Your name',
                    featured: true,
                    required: true
                },
                {
                    type: 'input',
                    inputType: 'password',
                    label: 'Password',
                    model: 'password',
                    min: 6,
                    required: true,
                    hint: 'Minimum 6 characters',
                    validator: VueFormGenerator.validators.string
                },
                {
                    type: 'select',
                    label: 'Skills',
                    model: 'skills',
                    values: ['Javascript', 'VueJS', 'CSS3', 'HTML5']
                },
                {
                    type: 'input',
                    inputType: 'email',
                    label: 'E-mail',
                    model: 'email',
                    placeholder: 'User\'s e-mail address'
                },
                {
                    type: 'checkbox',
                    label: 'Status',
                    model: 'status',
                    default: true
                }
                ]
                },
                formOptions: {
                    validateAfterLoad: true,
                    validateAfterChanged: true,
                    validateAsync: true
                }

            }
        }
    }
</script>
