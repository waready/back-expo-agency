@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('A) Especialistas fortalecen capacidades a directivos y docentes para la ejecución del trabajo a distancia y educación virtual') }}</div>
                <div class="card-body">
                   
                    <div class="form-group">
                        <label > 1. Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para fortalecer el uso de entornos virtuales.</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            no
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
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
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            no
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
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
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            no
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
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
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            no
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Evidencia Observacion</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-secondary">Anterior</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-secondary">1</button>
                        <button type="button" class="btn btn-secondary">2</button>
                        <button type="button" class="btn btn-secondary">3</button>
                        <button type="button" class="btn btn-secondary">4</button>
                      </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-secondary">Siguiente</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        console.log("hola")
    </script>
@endpush
