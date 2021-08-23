<?php

namespace App\Exports;

use App\Ugel;
use App\User;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExportDrep implements FromView


// use Maatwebsite\Excel\Concerns\FromCollection;

// class DataExport implements FromCollection
{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    // public function collection()
    // {
    //     return User::all();
    // }
    public function view(): view {
        $users = DB::table('users as us')
        ->select('us.*','ug.nombre','dn.nombre as Nivel','tp.nombre as participante' , DB::raw('( CASE WHEN us.area = "0" THEN "Ninguno" WHEN us.area = "1" THEN "Urbano" WHEN us.area = "2" THEN "Rural" ELSE "error" END) AS Area'),
        DB::raw('( CASE WHEN us.gestion = "0" THEN "Ninguno" WHEN us.gestion = "1" THEN "Estatal" WHEN us.gestion = "2" THEN "No Estatal" ELSE "error" END) AS Gestion'))
        ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
        ->join('tipo_participantes as tp', 'tp.id', '=', 'us.id_tipo_participante')
        ->leftjoin('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        ->where('id_tipo_participante',2)
        ->get();


        
        return view('reportes.report',[
            'users'=> $users,

            'apellidos'=> $this->request->input('1'),
            'nombres' =>$this->request->input('2'),
            'dni' => $this->request->input('3'),
            'celular' =>$this->request->input('4'),
            'ugel' =>$this->request->input('5'),
            'rol' =>$this->request->input('6'),
            'email' =>$this->request->input('7'),
            'nivel' =>$this->request->input('8'),
            'area' =>$this->request->input('9'),
            'gestion' =>$this->request->input('10'),
            'condicion' =>$this->request->input('11'),
            'cargo' =>$this->request->input('12'),
        ]);
    } 

}
