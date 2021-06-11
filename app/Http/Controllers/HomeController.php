<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //;
        if (auth()->user()->rol_id==1) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return  view('client.home');
    }

    public function redirect()
    {
        if (auth()->user()->rol_id==1) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('client.recfacial')->with('status', session('status'));
    }
}
