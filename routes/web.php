<?php

use App\pregunta;
use App\categoria;
use App\respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::post('preguntas', 'CalificarController@calificar');

Route::group(['prefix' => 'remote', 'middleware' => 'auth'], function () {
  Route::get('preguntas-lista', function (Request $request) {
    // return pregunta::all();
    $query = DB::table('preguntas AS A')
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
      })
      ->join('categorias AS C', 'A.id_categoria', 'C.id');
    // ->join('tipos AS D', 'C.id_tipo', 'D.id');

    if ($request->filled('tipo')) {
      $query->where('C.id_tipo', $request->input('tipo'));
    }

    return $query->get();
  });

  Route::get('categorias-lista', function (Request $request) {
    $tipo =  Auth::user()->id_tipo_participante;
    $tipo = $tipo-2;
    $query =  DB::table('categorias AS A');
    if ($request->filled('tipo')) {
      $query->where('id_tipo', $request->input('tipo'));
   
    }
    $query->where('id_tipo', $tipo);
    return $query->get();
  });

  Route::post('responder', function (Request $request) {
    // logger(print_r([
    //   'user' => $request->user()->id
    // ], true));
    $cont = 0;
    $respuesta = respuesta::where('id_user', auth()->id())
      ->where('id_pregunta', $request->input('id_pregunta'))
      ->first();

    if (!isset($respuesta)) {
      $respuesta = new respuesta();
      $respuesta->id_user = auth()->id();
      $respuesta->id_pregunta = $request->input('id_pregunta');
      
    }
    $valor = pregunta::find($request->input('id_pregunta'));
    if($valor->clave == $request->input('respuesta')) {
      $respuesta->calificacion = $valor->calificacion;
    }
    $respuesta->respuesta = $request->input('respuesta');
    $respuesta->observacion = $request->input('observacion');
    $respuesta->save();

    return response()->json($respuesta);
  });
});
