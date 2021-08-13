<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $perfil =  User::where('id', Auth::user()->id)->first();

        return view('admin.profile', compact('perfil'));
    }
}
