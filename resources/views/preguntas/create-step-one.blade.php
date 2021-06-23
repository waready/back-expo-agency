@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('products.create.step.one.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">{{ __('A) Especialistas fortalecen capacidades a directivos y docentes para la ejecución del trabajo a distancia y educación virtual') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label > 1. Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para fortalecer el uso de entornos virtuales.</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre1" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre1" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre2" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre2" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre3" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre3" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre4" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre4" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                <div class="card">
                    <div class="card-header">{{ __('B)  Especialistas desarrollan soporte socioemocional a directivos y docentes') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label > 5. Participa de las actividades de soporte socioemocional organizadas por la DREP u otras instituciones</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre5" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre5" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre6" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre6" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre7" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre7" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre8" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre8" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                <div class="card">
                    <div class="card-header">{{ __('C) Especialistas implementan a directivos y docentes en el “Aprendizaje Basado en Proyectos”') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label >9. Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para implementar el “Aprendizaje Basado en Proyectos”. </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre9" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre9" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre10" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre10" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre11" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre11" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre12" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre12" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                <div class="card">
                    <div class="card-header">{{ __('D) Especialistas implementan acciones de prevención y cuidados frente a la COVID-19') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label > 13. Participa del fortalecimiento de capacidades sobre la prevención y cuidado de la COVID – 19..</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre13" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre13" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre14" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre14" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre15" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre15" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                <div class="card">
                    <div class="card-header">{{ __('E) Especialistas implementan actividades complementarias para fortalecer la estrategia “Aprendo en casa”.') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label > 16. Participa en las jornadas pedagógicas organizadas por la DREP u otras instituciones sobre planificación, mediación y evaluación formativa.</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre16" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre16" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre17" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre17" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre18" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre18" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre19" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre19" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre20" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre20" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre21" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre21" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre22" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre22" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre23" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre23" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre24" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre24" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre25" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre25" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre26" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre26" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre27" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre27" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                <div class="card">
                    <div class="card-header">{{ __('F) Especialistas implementan la construcción de una ciudadanía más allá del bicentenario. ') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label > 28. Impulsa la participación de los diferentes actores  educativos en el desarrollo de actividades por el Bicentenario de nuestra independencia.</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre28" id="" value="1"  >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre28" id="" value="0">
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
                                            <input class="form-check-input" type="radio" name="pre29" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios2">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre29" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
                                            <input class="form-check-input" type="radio" name="pre30" id="" value="1" >
                                            <label class="form-check-label" for="gridRadios1">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pre30" id="" value="0">
                                            <label class="form-check-label" for="gridRadios2">
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
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function($){
             var valor = $('#holis').val();
             
             $('#holis').click(function() {
             alert("Checkbox state (method 1) = " + $('#holis').prop('checked'));
             alert("Checkbox state (method 1) = " + $('#holis').is('checked'));
             console.log(valor)
             })
        })
    </script>
@endpush
