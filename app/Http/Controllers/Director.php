<?php

namespace App\Http\Controllers;

use App\Ugel;
use App\User;
use App\DirectorNivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Director extends Controller
{
    public function index()
    {   
        $ugels = Ugel::all();
       
        //return view('admin.preguntas',compact('categorias'));
        return view('admin.especialista.director', compact('ugels'));
    }

    public function getTipo()
    {
      $users = DB::table('users as us')
        ->select('us.*','ug.nombre',DB::raw('"" as Opciones'))
        ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
        ->where('id_tipo_participante',4)
        ->get();
      
      return \DataTables::of($users)->make('true');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        DB::beginTransaction();
        try {

            $user = new User;

            $user->nombres = $request->nombres;
            $user->apellidos = $request->apellidos;
            $user->dni = $request->dni;
            $user->email = $request->email;

            $user->celular = $request->celular;
            $user->condicion = $request->condicion;
            $user->cargo = $request->cargo;
            $user->gestion = $request->gestion;
            $user->area = $request->area;

            if(!empty($request->nivel1))
            $user->nivel = $request->nivel1;

            if(!empty($request->nivel2))
            $user->nivel = $request->nivel2;

            if(!empty($request->nivel3))
            $user->nivel = $request->nivel3;

            $user->id_ugel = intval($request->ugel);
            $user->password = bcrypt($request->dni);
            $user->id_tipo_participante= 4;         
            $user->assignRole('director');
            $user->password = bcrypt($request->dni);  
            $user->save(); 

        DB::commit();
            $message = "Categoria creado correctamente.";
            $status = true;
        } catch (\Exception $e) {
            DB::rollback();
            $message = "Error al crear nueva Categoria, intentelo de nuevo si el problema persiste comuniquese con el administrador.";
            $status = false;
            $error =$e;
        }
        $response = array(
            "message"=>$message,
            "status"=>$status,
            "error"=>isset($error) ? $error:''
        );

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(pregunta $pregunta)
    {
        //
    }
    

    public function nivelDirector(Request $request)
    {
       $subnivel = DirectorNivel::where('id_nivel', $request->nivel)->get();

        return $subnivel;

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where("id",$id)->first();

         return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        //return $request;
        DB::beginTransaction();
        try {

            $user = User::find($id);
            $user->nombres = $request->editar_nombres;
            $user->apellidos = $request->editar_apellidos;
            $user->dni = $request->editar_dni;
            $user->email = $request->editar_email;

            $user->celular = $request->editar_celular;
            $user->condicion = $request->editar_condicion;
            $user->cargo = $request->editar_cargo;
            $user->gestion = $request->editar_gestion;
            $user->area = $request->editar_area;

            if(!empty($request->editar_nivel1))
            $user->nivel = $request->editar_nivel1;

            if(!empty($request->editar_nivel2))
            $user->nivel = $request->editar_nivel2;

            if(!empty($request->editar_nivel3))
            $user->nivel = $request->editar_nivel3;

            $user->id_ugel = intval($request->editar_ugel);


            //$user->password = bcrypt($request->dni);  

            $user->save();

        DB::commit();
            $message = 'Director actualizado correctamente';
            $status = true;
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'Error al actualizar Director, intentelo de nuevo si el problema persiste comuniquese con el administrador.';
            $status = false;
            $error = $e;
        }
        $response = array(
            "message"=>$message,
            "status"=>$status,
            "error"=>isset($error) ? $error:''
        );
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(pregunta $pregunta)
    {
        //
    }
    public function graficos()
    {
        $users = DB::table('users as us')
                ->select('ug.nombre',DB::raw('COUNT(ug.id) as num'))
                ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
                ->where('id_tipo_participante',4)
                ->GROUPBY ('ug.nombre')
                ->get();

        return $users;

    }


}
