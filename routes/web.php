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
});

Route::get('/nivelDirector', 'Director@nivelDirector');
// Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products/create-step-one', 'HomeController@postCreateStepOne')->name('products.create.step.one.post');

/**Calificar**/

    /****REPORTE*****/
    Route::get('/tablaExamen/{id_res}', function ($id_res) {
      $users = DB::table('respuestas as rp')
      ->select('rp.*','pre.numero',
      DB::raw('CONCAT(us.nombres," ",us.apellidos,"") as Supervisor'),DB::raw('CONCAT(as.nombres," ",as.apellidos,"") as Supervisado'),
      DB::raw('"" as Opciones'),DB::raw('"" as porcentaje'))
      ->join('examenes_ejecutados as ej', 'ej.id', '=', 'rp.id_examen_ejecutado')
      ->join('users as us','us.id','ej.id_user_supervisado')
      ->join('users as as','as.id','ej.id_user_supervisor')
      ->join('preguntas as pre','pre.id','rp.id_pregunta')
      ->where('ej.id_user_supervisado',$id_res)
      
      ->get();
      // $users = DB::table('examenes_ejecutados as ej')
      // ->select('ej.*')
      // ->join('respuestas as rp','rp.id_examen_ejecutado','ej.id')
      // ->where('ej.id_user_supervisado',162)
      // ->get();
      return \DataTables::of($users)->make('true');
    })->name('getRespuestasUno');
    Route::get('reporteExamen/{id}',function($id){
    
      $evaluado["tabla"] = ExamenEjecutado::where('id',$id)->first();
    
      //return $evaluado;

      $evaluado['porcentaje'] = DB::table('respuestas as rp')
      ->select('rp.id_user',DB::raw('COUNT(rp.id_user) as num'))

      //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
      ->where([
          ['id_examen_ejecutado',$evaluado["tabla"]->id]
      ])
      ->GROUPBY('rp.id_user')
      ->first();
      
      $evaluado['aciertosSI'] = DB::table('respuestas as rp')
      ->select('rp.id_examen_ejecutado',
      DB::raw('COUNT(rp.id_examen_ejecutado) as val'))

      //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
      ->where([
        ['id_examen_ejecutado',$evaluado["tabla"]->id],
        ['respuesta',1]
        ])
      ->GROUPBY('rp.id_examen_ejecutado')
      ->first();

      $evaluado['aciertosNO'] = DB::table('respuestas as rp')
      ->select('rp.id_examen_ejecutado', DB::raw('COUNT(rp.id_examen_ejecutado) as val'))

      //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
      ->where([
        ['id_examen_ejecutado',$evaluado["tabla"]->id],
        ['respuesta',0]
        ])
    ->GROUPBY('rp.id_examen_ejecutado')
      ->first();


      return $evaluado;
    });  
    Route::delete('eliminarExamen/{id}',function($id){
        
        $dato = ExamenEjecutado::find($id);
        
        //$valor=$dato->delete();
        $respuestas = respuesta::where('id_examen_ejecutado',$dato->id)->get();
        foreach( $respuestas as $respuestas ){
          $message = respuesta::find($respuestas->id);
          //$message->estado = "0"; 
          $message->delete();;
        }
        $valor=$dato->delete();
        return $valor;  
    });
    Route::get('/especialistaGrafico', 'EspecialistaUgel@graficos');
    Route::get('/variacion', function () {
      return view('graficos.variacion');
    });
    Route::get('/DirectorGrafico', 'Director@graficos');
    Route::get('/DirectorGraficoNivel', 'Director@graficosNivel');
    Route::get('/DirectorGraficoGestion', 'Director@graficosGestion');
    Route::get('/DirectorGraficoArea', 'Director@graficosArea');

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

Route::post('preguntas', 'CalificarController@calificar');

Route::group(['prefix' => 'remote', 'middleware' => 'auth'], function () {
  Route::get('preguntas-lista', 'RemoteController@preguntasLista');
  Route::get('categorias-lista', 'RemoteController@categoriasLista');
  Route::post('responder', 'RemoteController@responderHandler');
  
  /**Perfil**/
  
});


Route::get('pre-ejecucion-examen/{examType}/{supervisorId}/{supervisedId}', function (
  $examType,
  $supervisorId,
  $supervisedId
) {
  return view('examenes.pre-exam', compact('examType', 'supervisorId', 'supervisedId'));
});

Route::resource('examenes', 'ExamenesEjecutadosController');
Route::get('/getMisExamenes', 'ExamenesEjecutadosController@getMisExamenes')->name('getMisExamenes');


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/editarPerfil','ProfileController@actualizar');


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

Route::get('/tablaCategorias/{id_res}', function ($id_res) {
  $categorias = DB::table('categorias as cg')
      ->select('cg.id', 'cg.nombre', 'tp.nombre as tipo' ,DB::raw('"" as Opciones'))
      ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
      ->where('id_tipo',$id_res)
      ->paginate(15);
      
      //return \DataTables::of($categoria)->make('true');
      return view('admin.tablacategoria',compact('categorias'));

})->name('tablaCategorias');

Route::get('/tablaPreguntas/{id_res}', function ($id_res) {
  // $categorias = DB::table('categorias as cg')
  //     ->select('cg.id', 'cg.nombre', 'tp.nombre as tipo' ,DB::raw('"" as Opciones'))
  //     ->join('tipos as tp', 'tp.id', '=', 'cg.id_tipo')
  //     ->where('id_tipo',$id_res)
  //     ->paginate(15);
      $categorias = DB::table('preguntas as pre')
      ->select('pre.id', 'pre.numero','pre.enunciado','pre.calificacion','pre.clave', 'ct.nombre as categoria' ,DB::raw('"" as Opciones'))
      ->join('categorias as ct', 'ct.id', '=', 'pre.id_categoria')
      ->where('id_categoria',$id_res)
      ->paginate(15);
      //return $categorias;
      //return \DataTables::of($categoria)->make('true');
      return view('admin.tablapregunta',compact('categorias'));

})->name('tablaPreguntas');