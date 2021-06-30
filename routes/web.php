<?php

use App\categoria;
use App\pregunta;
use App\respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Auth::routes();
//Auth::routes(["register" => false]);

Route::get('/home', 'HomeController@index')->name('home');

/**Data-Tables**/
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


// Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products/create-step-one', 'HomeController@postCreateStepOne')->name('products.create.step.one.post');

/**Calificar**/

Route::post('preguntas', 'CalificarController@calificar');

Route::group(['prefix' => 'remote', 'middleware' => 'auth'], function () {
  Route::get('preguntas-lista', function () {
    // return pregunta::all();
    return DB::table('preguntas AS A')
      ->select(
        'A.id',
        'A.numero',
        'A.enunciado',
        'A.id_categoria'
      )
      ->addSelect('B.respuesta')
      ->addSelect('B.observacion')
      ->leftJoin('respuestas AS B', function ($q) {
        $q->on('A.id', 'B.id_pregunta')->where('B.id_user', auth()->id());
      })->get();
  });

  Route::get('categorias-lista', function () {
    return categoria::all();
  });

  Route::post('responder', function (Request $request) {
    // logger(print_r([
    //   'user' => $request->user()->id
    // ], true));
    $respuesta = respuesta::where('id_user', auth()->id())
      ->where('id_pregunta', $request->input('id_pregunta'))
      ->first();
    if (!isset($respuesta)) {
      $respuesta = new respuesta();
      $respuesta->id_user = auth()->id();
      $respuesta->id_pregunta = $request->input('id_pregunta');
    }
    $respuesta->respuesta = $request->input('respuesta');
    $respuesta->observacion = $request->input('observacion');
    $respuesta->save();

    return response()->json($respuesta);
  });
});
