<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    private $dateTime;
    private $dateTimePartial;
    public function __construct()
    {
        $this->middleware('auth');

        date_default_timezone_set("America/Lima");//Zona horaria de Peru
        $this->dateTime = date("Y-m-d H:i:s");
        $this->dateTimePartial = date("m-Y");

    }
    public function index(){

        $perfil =  User::where('id', Auth::user()->id)->first();

        return view('admin.profile', compact('perfil'));
    }
    public function actualizar(Request $request)
    {
     
     
       
        //return dd($name);

        DB::beginTransaction();
        try {

            $user = User::find($request->prodId);

            // $user->nombres = $request->editar_nombres;
            // $user->apellidos = $request->editar_apellidos;
            // $user->dni = $request->editar_dni;
            $user->email = $request->email;

            $user->celular = $request->telefono;

            // $user->condicion = $request->editar_condicion;
            // $user->cargo = $request->editar_cargo;
            // $user->gestion = $request->editar_gestion;
            // $user->area = $request->editar_area;

            // if(!empty($request->cod_modular_i_e))
            // $user->nivel = $request->cod_modular_i_e;
            $page = false;
            $file = $request->file('archibo');
            if($file){
                $name = 'A-'.$file->getClientOriginalName();
                $titulo = explode(".",$file->getClientOriginalName())[0];
                $user->profile_picture  = $this->dateTimePartial.'/'.$name;
                Storage::disk('fotos')->putFileAs($this->dateTimePartial, $file, $name);
                $page = true;
            }
           

            if(!empty($request->cod_modular_i_e))
            $user->cod_modular_i_e = $request->cod_modular_i_e;

            if(!empty($request->nombre_i_e))
            $user->nombre_i_e = $request->nombre_i_e;

            if(!empty($request->nivel_i_e))
            $user->nivel_i_e = $request->nivel_i_e;

            if(!empty($request->cod_modular_i_e))
            $user->cod_modular_i_e = $request->cod_modular_i_e;

            if(!empty($request->caracteristica))
            $user->caracteristica = $request->caracteristica;

            if(!empty($request->direccion_i_e))
            $user->direccion_i_e = $request->direccion_i_e;

            if(!empty($request->centro_poblado_i_e))
            $user->centro_poblado_i_e = $request->centro_poblado_i_e;

            if(!empty($request->provincia))
            $user->provincia = $request->provincia;
            
            if(!empty($request->distrito))
            $user->distrito = $request->distrito;


            //$user->id_ugel = intval($request->editar_ugel);


            //$user->password = bcrypt($request->dni);  

            $user->save();

        DB::commit();
            $message = 'Datos actualizado correctamente';
            $status = true;
            $recarga = $page;
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'Error al actualizar Datos, intentelo de nuevo si el problema persiste comuniquese con el administrador.';
            $status = false;
            $error = $e;
            $recarga = false; 
        }
        $response = array(
            "message"=>$message,
            "status"=>$status,
            "recarga" =>$recarga,
            "error"=>isset($error) ? $error:''
        );
        return response()->json($response);
        
    }
}