<?php

namespace App\Http\Controllers;

use App\Recognition;
use Illuminate\Http\Request;

class Req03Controller extends Controller
{
    public function index(){

        $recognition = Recognition::latest()
        ->take(1)
        ->get();

        return view('client.req03',compact('recognition'));
    }
}
