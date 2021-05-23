<?php

namespace App\Http\Controllers\Admin;

use App\direcciones;
use App\Estudiante;
use App\evaluacion;
use App\User;
use App\Http\Controllers\Controller;

class BlocappController extends Controller
{
    public function index()
    {
        $evaluacions = evaluacion::all();
        return view('admin\blocapp\index1') -> with('evaluacions',$evaluacions);

    }
    public function results()
    {
        $users = user::all();
        //return view('admin\blocapp\listaestudiantes')-> with('users',$users);           //cambie index por index1

        $direcciones = direcciones::all();
        return view('admin\blocapp\listaestudiantes')-> with('users',$users ,'direcciones',$direcciones);           //cambie index por index1
        
    }
}


  

