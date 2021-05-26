@extends('layouts.client')

@section('content')

<div class="container d-flex align-items-center">

    <div class="col-sm-6 p-3">
        <img width="100%" id="imagen_reconocida" src="" alt="" attr-img ="{{$recognition[0]->image}}">
    </div>
    <div class="col-sm-6 p-2">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Resultado</h3>
            </div>
        
            <h3 class="text-center mt-3">{{$user->name}}</h3>

            <div class="card-body">
                
                <div class="d-flex justify-content-between"><h4><strong>Grado de Similitud:</strong></h4> <h4>{{$recognition[0]->similarity}}%</h4></div>
                
                <div class="d-flex justify-content-between"><h4><strong>Intentos Restantes:</strong></h4> <h4>{{$user->intentos}}</h4></div>
                
                <div class="d-flex justify-content-between"><h4><strong>Fecha y Hora:</strong></h4> <h4>{{date_format($recognition[0]->updated_at,"d/m/Y h:i:s")}}</h4></div>
            
                

            </div>
                
            
            @if ( (($recognition[0]->attempt)-1) > 0 )
                @if ($recognition[0]->similarity>90)
                    <div class="d-flex justify-content-between py-3 px-5">
                        <div class="bg-green p-2">Validación Exitosa</div>
                        <a class="btn btn-primary" href="/dashboard">Continuar</a>
                    </div>
                @else
                    <div class="d-flex justify-content-between py-3 px-5">
                        <div class="bg-red p-2">Validación Fallida</div>
                        <a class="btn btn-primary" href="/recfacial">Continuar</a>
                    </div>
                @endif
            @else
                <div class="alert alert-danger mx-4" role="alert">
                    <strong>Alerta!</strong> Terminó los intentos disponibles, Despues de este intento tiene que solicitar el acceso a su docente.
                </div>
                <div class="d-flex justify-content-between py-3 px-5">
                    <div class="bg-red p-2">Validación Fallida</div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Continuar</button>
                    </form>
                </div>
            @endif
            
            
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
          var imagen = document.getElementById('imagen_reconocida');

          var img64 = imagen.getAttribute('attr-img');
          imagen.setAttribute('src', "data:image/jpg;base64," + img64);

        })
    </script>
@endsection