<?php

namespace App\Http\Controllers;


use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Exports\DataExportDrep;
use App\Exports\DataExportUgel;
use Illuminate\Support\Facades\DB;
use App\Exports\DataExportDirector;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function ReporteUgelDrep(){
        $users = DB::table('users as us')
                ->select('ug.nombre','us.nombres',DB::raw('COUNT(ug.id) as num'))
                ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
                ->where('id_tipo_participante',4)
                ->GROUPBY ('ug.nombre','us.nombres')
                ->get();

        return $users;

    
   
        // $users = DB::table('users as us')
        //         ->select('dn.nombre','dn.id_nivel',DB::raw('COUNT(dn.id) as num'))
        //         ->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //         // ->join('ugels as ug', 'ug.id', '=', 'us.id_ugel')
        //         ->where('id_tipo_participante',4)
        //         ->GROUPBY('dn.nombre','dn.id_nivel')
        //         ->get();

        // return $users;


    
        // $users = DB::table('users as us')
        //     ->select('us.gestion',DB::raw('COUNT(us.id) as num'))
        //     //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //     ->where([['id_tipo_participante',4],['us.gestion','<>','0']])
        //     ->GROUPBY('us.gestion')
        //     ->get();
        // return $users;
    
        // $users = DB::table('users as us')
        //     ->select('us.area',DB::raw('COUNT(us.id) as num'))
        //     //->join('director_nivels as dn', 'dn.id', '=', 'us.nivel')
        //     ->where([
        //         ['id_tipo_participante',4],
        //         ['us.area','<>','0']
        //     ])
        //     ->GROUPBY('us.area')
        //     ->get();
        // return $users;
    }
    public function Excel(Request $request){
        return Excel::download(new DataExport($request), 'reporte.xlsx');
    

     // return $request;
    }
    public function ExcelDrep(Request $request){
        return Excel::download(new DataExportDrep($request), 'reporte-drep.xlsx');
    

     // return $request;
    }
    public function ExcelUgel(Request $request){
        return Excel::download(new DataExportUgel($request), 'reporte-ugel.xlsx');
    

     // return $request;
    }
    public function ExcelDirector(Request $request){
        return Excel::download(new DataExportDirector($request), 'reporte-director.xlsx');
    

     // return $request;
    }
}
