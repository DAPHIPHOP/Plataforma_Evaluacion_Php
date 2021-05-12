<?php

namespace App\Http\Controllers;

use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecfacialController extends Controller
{
    public function index(){
        return view('client.recfacial');
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
                'SimilarityThreshold' => 90,
                'SourceImage' => [
                    'Bytes' => base64_decode(auth()->user()->image),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
                'TargetImage' => [
                    'Bytes' => base64_decode($request->img_bytes),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
            ]);

            $array_result = $result->toArray();

            if(count($array_result["FaceMatches"])>0){
                $valor_redondeado = round($array_result["FaceMatches"][0]["Similarity"]);
                    
                $recognition = new Recognition();
                $recognition->id_usuario = auth()->user()->id;
                $recognition->attempt = auth()->user()->intentos;
                $recognition->similarity = $valor_redondeado;
                $recognition->image = $request->img_bytes;

                $recognition->save();

                return json_encode(["val"=> $valor_redondeado,"href"=>"/req03"]);

            }else{

                $valor_redondeado = round($array_result["FaceMatches"][0]["Similarity"]);
                    
                $recognition = new Recognition();
                $recognition->id_usuario = auth()->user()->id;
                $recognition->attempt = auth()->user()->intentos;
                $recognition->similarity = $valor_redondeado;
                $recognition->image = $request->img_bytes;
                $recognition->save();

                $affected = DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['intentos' => ((auth()->user()->intentos)-1)]);

                return json_encode(["val"=>"0.00","href"=>"/req03"]);
            }
        } catch (\Throwable $th) {

                $recognition = new Recognition();
                $recognition->id_usuario = auth()->user()->id;
                $recognition->attempt = auth()->user()->intentos;
                $recognition->similarity = 0.00;
                $recognition->image = $request->img_bytes;

                $recognition->save();

                $affected = DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['intentos' => ((auth()->user()->intentos)-1)]);

                return json_encode(["val"=>"0.00","href"=>"/req03"]);
        }
       
    }

}
