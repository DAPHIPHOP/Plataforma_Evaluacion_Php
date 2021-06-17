@extends('layouts.client')

@section('content')
<div class="container">

    <div class="col-sm-6 mx-auto">

        <h4 class="text-center font-weight-bold">CAPTURE SU ROSTRO EN EL RECUADRO</h4>
        <h4 class="text-center font-weight-bold">Codigo de Evaluación: {{$id}}</h4>
        <form method="POST" action="{{route('client.req03.reco')}}" id="id_form">
        @csrf
        <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{{$id}}">
          <div class="row">
            <div class="video">
                <video id="videoweb" src="" height="400px" width="100%"></video>
            </div>
          </div>
           <div class="row justify-content-center">
                <button class="btn btn-light shadow" type="button" onclick="tomar_foto()" id="botontomar"><h4 class="font-weight-bold" style="margin-bottom: -2px;"><i class="fas fa-play-circle mr-2 text-primary"></i>Iniciar</h4></button>
            </div>
            <canvas id="canvasimagen" style="height: 400px;display:none;"></canvas>
            <input type="hidden" name="imgbyte" id="imgbyte">
                
    </form>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Resultado de Similitud</h5>
        </div>
        <div class="modal-body" id="cont_modal">

        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script>

        var video;
        document.addEventListener("DOMContentLoaded", function(event){

            var promesa = navigator.mediaDevices.getUserMedia({video:true});
            
            promesa.then(capturados);
            promesa.catch(errorcapturados);

        

            function capturados(e){
                video = document.getElementById("videoweb");
                video.srcObject = e;
                video.play();
                
            }
            function errorcapturados(e){
                console.log("error al capturar la pantalla");
            }

        });

        function tomar_foto(){
            var canvas = document.getElementById("canvasimagen");
            var contexto = canvas.getContext("2d");
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            contexto.drawImage(video,0,0,video.videoWidth,video.videoHeight);
            //window.location="{{URL::to('test')}}";
            var img_byte = canvas.toDataURL('image/jpeg',1.0);
            var coma = img_byte.indexOf(",");
            var byte = img_byte.substring(coma+1,img_byte.length);
            var inp_hidden = document.getElementById("imgbyte");
            inp_hidden.value = byte;
            //console.log(inp_hidden.value);
            var form = document.getElementById("id_form");
            form.submit();

            //var param = new FormData(form);

            //var cont_modal = document.getElementById("cont_modal");
            //var modal = document.getElementById("modal_mensaje");
            /*$.ajax({
                url: "{{URL::to('recfacial')}}",
                data: {
                    "_token": document.getElementsByName('_token')[0].value,
                    "img_bytes": inp_hidden.value,
                    "id_evaluacion":{{$id}}
                },
                dataType: "json",
                method: "POST",
                success: function(response) {
                    //console.log(response.val);
                    cont_modal.innerHTML = "Resultado de Similitud: " + parseInt(response.val,10);
                    $('#modal_mensaje').modal('show')
                    location.href = response.href;
                },
                error: function (error) {
                    JSON.stringify(error);
                }
            });*/

        }

    </script>
@endsection