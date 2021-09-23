<?php

use App\respuesta;
use App\ExamenEjecutado;
use App\Exports\DataExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
});

Route::get('/variacion', function () {
  return view('graficos.variacion');
});

//Auth::routes();
Auth::routes(["register" => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ejecutar-examen/{id}', 'HomeController@ejecutarExamen');
Route::get('/home', 'HomeController@index')->name('home');

/**Data-Tables**/
Route::group(['middleware' => ['auth']], function () {

  Route::group(['middleware' => ['permission:admin.home']], function () {
    //tipo-examen
    Route::get('/tipo', 'TipoController@index')->name('tipo');
    Route::get('/getTipo', 'TipoController@getTipo')->name('gettipo');
    Route::resource('/alltipo', 'TipoController');

    //categorias
    Route::get('/categoria', 'CategoriaController@index')->name('categoria');
    Route::get('/getCategoria', 'CategoriaController@getTipo')->name('getCategoria');
    Route::resource('/allcategoria', 'CategoriaController');

    //Preguntas
    Route::get('/pregunta', 'PreguntaController@index')->name('preguntas');
    Route::get('/getPreguntas', 'PreguntaController@getTipo')->name('getPreguntas');
    Route::resource('/allpregunta', 'PreguntaController');
  });
  //EspacialistaDrep
  Route::get('/especilistaDrep', 'EspecialistaDrep@index')->name('especialistaDrep');
  Route::get('/getEspecialistaDrep', 'EspecialistaDrep@getTipo')->name('getEspecilistaDrep');
  Route::resource('/allespecialistadrep', 'EspecialistaDrep');

  //EspecialistaUgel
  Route::get('/especilistaUgel', 'EspecialistaUgel@index')->name('especialistaUgel');
  Route::get('/getEspecialistaUgel', 'EspecialistaUgel@getTipo')->name('getEspecilistaUgel');
  Route::resource('/allespecialistaugel', 'EspecialistaUgel');


  //Director
  Route::get('/director', 'Director@index')->name('director');
  Route::get('/getDirector', 'Director@getTipo')->name('getDirector');
  Route::resource('/allDirector', 'Director');
  Route::get('/nivelDirector', 'Director@nivelDirector');

  Route::get('/DirectorGrafico', 'Director@graficos');
  Route::get('/DirectorGraficoNivel', 'Director@graficosNivel');
  Route::get('/DirectorGraficoGestion', 'Director@graficosGestion');
  Route::get('/DirectorGraficoArea', 'Director@graficosArea');

  //Perfil
  Route::get('/profile', 'ProfileController@index')->name('profile');
  Route::post('/editarPerfil','ProfileController@actualizar');

  /****REPORTE*****/
  Route::get('/tablaExamen/{id_res}', 'ReporteController@TablaExamen')->name('getRespuestasUno');
  Route::get('reporteExamen/{id}','ReporteController@ReporteExamen');  
  Route::delete('eliminarExamen/{id}','ReporteController@EliminarExamen');

  Route::get('/reportes1', 'ReporteController@ReporteUgelDrep')->name('profile');
  Route::get('/reportesFinal', 'ReporteController@Excel')->name('reportesall');
  Route::get('/reportesFinalDrep', 'ReporteController@ExcelDrep')->name('reportesallDrep');
  Route::get('/reportesFinalUgel', 'ReporteController@ExcelUgel')->name('reportesallUgel');
  Route::get('/reportesFinalDirector', 'ReporteController@ExcelDirector')->name('reportesallDirector');

  Route::get('/reportesUsuarioDrep', function () {
    return view('reportes.vistareporte');
  });
  Route::get('/reportesUsuarioUgel', function () {
    return view('reportes.vistareporteugel');
  });
  Route::get('/reportesUsuarioDirector', function () {
    return view('reportes.vistareportedirector');
  });

  //Graficos
  Route::get('/especialistaGrafico', 'EspecialistaUgel@graficos');
  Route::get('/variacion', function () {
    return view('graficos.variacion');
  });
  Route::get('/variacion-director', function () {
    return view('graficos.variacion-director');
  });
  Route::get('/area-director', function () {
    return view('graficos.area-director');
  });
  Route::get('/gestion-director', function () {
    return view('graficos.gestion-director');
  });
  Route::get('/nivel-director', function () {
    return view('graficos.nivel-director');
  });
  /**Calificar**/
  Route::post('preguntas', 'CalificarController@calificar');

  Route::get('pre-ejecucion-examen/{examType}/{supervisorId}/{supervisedId}', function (
    $examType,
    $supervisorId,
    $supervisedId
  ) {
    return view('examenes.pre-exam', compact('examType', 'supervisorId', 'supervisedId'));
  });

  Route::resource('examenes', 'ExamenesEjecutadosController');
  Route::get('/getMisExamenes', 'ExamenesEjecutadosController@getMisExamenes')->name('getMisExamenes');
  Route::resource('examenesCategoria', 'ExamenesCategoriaController');

  //Tablas
  Route::get('/tablaCategorias/{id_res}', 'TablasController@TablaCategoria')->name('tablaCategorias');
  Route::get('/tablaPreguntas/{id_res}', 'TablasController@TablaPreguntas')->name('tablaPreguntas');
  Route::get('/tablaExamenCategoria/{id_res}','TablasController@TablaExamenCategoria')->name('getRespuestasdos');
});

// Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products/create-step-one', 'HomeController@postCreateStepOne')->name('products.create.step.one.post');

Route::group(['prefix' => 'remote', 'middleware' => 'auth'], function () {
  Route::get('preguntas-lista', 'RemoteController@preguntasLista');
  Route::get('categorias-lista', 'RemoteController@categoriasLista');
  Route::post('responder', 'RemoteController@responderHandler');
  /**Perfil**/
});

/**todos**/

Route::get('/reporteFinal/{id}','ReporteController@ReporteFinal');
