<?php

namespace App\Http\Controllers\Admin;

use App\direcciones;
use App\Estudiante;
use App\Quizz;
use App\User;
use App\Http\Controllers\Controller;

class BlocappController extends Controller
{
    public function index()
    {
        $evaluacions = Quizz::all();
        return view('admin\blocapp\index1') -> with('evaluacions', $evaluacions);
    }
    public function results($id)
    {
        $quizz=Quizz::find($id);
        $users = user::all();
        //return view('admin\blocapp\listaestudiantes')-> with('users',$users);           //cambie index por index1

        $direcciones = direcciones::all();
        return view('admin\blocapp\listaestudiantes',['quizz'=>$quizz])-> with('users', $users, 'direcciones', $direcciones,'quizz',$quizz);           //cambie index por index1
    }
}
