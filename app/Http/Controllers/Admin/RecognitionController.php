<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecognitionController extends Controller
{

   /* public function req03(){
        return view('admin.recognitions.req03');
    }*/
    
    public function req05(){

        //$recognition = Recognition::all();
        $recognitions = DB::table('recognitions')
        ->select('id_usuario')
        ->groupBy('id_usuario')
        ->get();

        $arr_users =[];

        foreach ($recognitions as $user) {
            $arr_users[] = $user->id_usuario;
        }

        $users = DB::table('users')
        ->whereIn('id',$arr_users)
        ->get();

        return view('admin.recognitions.req05', compact('users'));
    }

    public function recognitions(Request $request){
        $recognition = DB::table('recognitions')->where('id_usuario',$request->id)->get();
        //$recognition->created_at = date_format($recognition->created_at,"d/m/Y h:i:s");
        return $recognition;
    }

    public function destroy($id){
        DB::table('recognitions')->where('id_usuario',$id)->delete();
        DB::table('users')->where('id',$id)->update(['intentos'=>3]);
        return redirect('/admin/recognitions/req05');
    }



}
