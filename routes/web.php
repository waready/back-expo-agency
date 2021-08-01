<?php

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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
});

Route::get('/variacion', function () {
  return view('graficos.variacion');
});

Auth::routes();
//Auth::routes(["register" => false]);

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
});

Route::get('/nivelDirector', 'Director@nivelDirector');
// Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products/create-step-one', 'HomeController@postCreateStepOne')->name('products.create.step.one.post');

/**Calificar**/

    /****REPORTE*****/
    Route::get('/especialistaGrafico', 'EspecialistaUgel@graficos');
    Route::get('/variacion', function () {
      return view('graficos.variacion');
    });

Route::post('preguntas', 'CalificarController@calificar');

Route::group(['prefix' => 'remote', 'middleware' => 'auth'], function () {
  Route::get('preguntas-lista', 'RemoteController@preguntasLista');
  Route::get('categorias-lista', 'RemoteController@categoriasLista');
  Route::post('responder', 'RemoteController@responderHandler');
});


Route::get('pre-ejecucion-examen/{examType}/{supervisorId}/{supervisedId}', function (
  $examType,
  $supervisorId,
  $supervisedId
) {
  return view('examenes.pre-exam', compact('examType', 'supervisorId', 'supervisedId'));
});

Route::resource('examenes', 'ExamenesEjecutadosController');
