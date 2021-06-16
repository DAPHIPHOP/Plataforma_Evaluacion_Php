<?php

namespace App\Http\Controllers;

use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Req03Controller extends Controller
{
    public function index(){

        $recognition = Recognition::latest()
        ->take(1)
        ->get();
        $user = auth()->user();

        return view('client.req03',compact('recognition','user'));
    }

    public function reco(Request $request){

        $args = [
            'credentials' => [
                'key' => 'AKIA3JO47CFF734ZV6B7',
                'secret' => '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',
            ],
            'region' => 'us-east-1',
            'version' => 'latest'
        ];
        try {
            $client = new \Aws\Rekognition\RekognitionClient($args);

            $result = $client->compareFaces([
                'SimilarityThreshold' => 50,
                'SourceImage' => [
                    'Bytes' => base64_decode(auth()->user()->image),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
                'TargetImage' => [
                    'Bytes' => base64_decode($request->imgbyte),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
            ]);

            $array_result = $result->toArray();

            //if(count($array_result["FaceMatches"])>0){
                $valor_redondeado = round($array_result["FaceMatches"][0]["Similarity"]);

                $recognition = $this->func_recognition($request,$valor_redondeado);
                $this->desc_intents();
                $user = auth()->user();
                $id_evaluacion = $request->id_evaluacion;

                return view('client.req03',compact('recognition','user','id_evaluacion'));
           // }

        } catch (\Throwable $th) {

            $recognition = $this->func_recognition($request,0.00);
            $this->desc_intents();
            $user = auth()->user();
            $id_evaluacion = $request->id_evaluacion;
                
            return view('client.req03',compact('recognition','user','id_evaluacion'));
        }
       
    }

    private function func_recognition(Request $request, int $valor){
                $recognition = new Recognition();
                $recognition->id_usuario = auth()->user()->id;
                $recognition->attempt = auth()->user()->intentos;
                $recognition->similarity = $valor;
                $recognition->image = $request->imgbyte;
                $recognition->id_evaluacion = $request->id_evaluacion;
                $recognition->save();
                return $recognition;
    }

    private function desc_intents(){
                $affected = DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['intentos' => ((auth()->user()->intentos)-1)]);
    }
    
}
