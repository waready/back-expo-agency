<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$user = auth()->user()->can('hola');
        
        //return $user;
        //$user->hasPermissionTo('hola');
        // $user->hasPermissionTo(Permission::find(1)->id);
        //return $user;
        return view('dashboard');
       $product = $request->session()->get('product');

        return view('preguntas.create-step-one',compact('product'));
        //return view('dashboard',compact('product'));
    }
    public function postCreateStepOne(Request $request)
    {
        return $request;
    }

    public function ejecutarExamen(string $id) {
      return view('preguntas.examen', ['tipo' => $id]);
    }
}
