@extends('layouts.admin')
@section('styles')
  <style type="text/css">
    @media (min-width: 760px) {
      .card-columns {
          column-count: 2;
      }
    }

    @media (max-width: 759px){
      .card-columns{
        column-count:1;
      }
    }
  </style>
@endsection
@section('content')
<div class="content">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  Registro de Identificación
              </div>
              <div class="container-fluid mt-3">
                <div class="card-columns">
                   <!------------------>
                   @foreach ($users as $item)
                  <div class="card mb-3 shadow-sm bg-white rounded" style="height:200px;">
                    <div class="row g-0" style="width:100%;margin-right:0px;margin-left:0px; height:100%">
                    <div class="col-sm-4 d-flex justify-content-center align-items-center" style="background-color:#2f353a;">
                      <div class="d-flex align-items-center" style="/*background:url(/images/foto-perfil-02.jpg); background-size: contain; background-repeat:no-repeat; background-position:center;*/ height:100%; width:100%;">
                        <img src="\images/foto-perfil-02.jpg" height="auto" width="100%" class="imagen_mostrar" src="" alt="" attr-img ="{{$item->image}}">
                      </div>
                      
                    </div>
                    <div class="col-sm-8" style="padding:0">
                      <div class="card-body">
                        <h6 class="card-title text-right text-muted"><strong>COD: {{$item->dni}}</strong></h6>
                        <h6>{{$item->name}}</h6>
                        <p class="card-text text-secondary">
                          <strong>{{$item->email}}</strong>
                        </p>
                        <p class="card-text text-right"><small class="text-muted">{{$item->intentos}} Intentos Restantes</small></p>

                      </div>
                      <div class="card-footer" style="position: absolute;bottom: 0;width: 100%;">
                        <form action="{{url("/admin/recognitions/req05/$item->id")}}" method="post">
                          @csrf
                            @method('DELETE')
                          <div class="row d-flex justify-content-between px-3">
                            <button type="button" onclick="ver_intentos(this)" attr_id = "{{$item->id}}" attr_nombre="{{$item->name}}" attr_img="{{$item->image}}" class="btn btn-primary">Ver más</button>
                            @if (($item->intentos)<=0)
                              <button type="submit" class="btn btn-danger">Desbloquear</button>
                            @endif
                            </div>
                        </form>
                      </div>
                    </div>
                    </div>
                  </div>
                  @endforeach

                <!------------------>
                </div>
               
              </div>
                

          </div>
      </div>
  </div>
</div>

    

<div class="modal fade bd-example-modal-lg" id ="rec_usuario" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Intentos Realizados</h3>
      </div>
      <div class="modal-body row">
        <div class="col-md-5 d-flex align-items-center" >
          <img width="100%" id="imagen_principal" src="" alt="">
        </div>
        <div class="col-sm-7" id="cont_cards">
          <!-- tarjetas -->
         
          <!-- tarjetas -->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
    <script>
      document.addEventListener("DOMContentLoaded",function() {
        
        var imagenes = document.getElementsByClassName("imagen_mostrar");
      imagenes.forEach(element => {
          var img64 = element.getAttribute('attr-img');
          element.setAttribute('src', "data:image/jpg;base64," + img64);
      });

      })

      function ver_intentos(e){
        var contenedor = document.getElementById('cont_cards');
        contenedor.innerHTML = "";
        var nombre = e.getAttribute('attr_nombre');
        var imagen_inicial = e.getAttribute('attr_img');
        var imagen_principal = document.getElementById('imagen_principal');
        imagen_principal.setAttribute('src','data:image/jpg;base64,'+imagen_inicial)
        $.ajax({
                url: "{{URL::to('admin/recognitions/req05')}}",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "id": e.getAttribute('attr_id')
                },
                dataType: "json",
                method: "POST",
                success: function(response) {
                    //console.log(response);

                    var cards="";
                    response.forEach(element => {
                    var image = "data:image/jpg;base64," + element.image;  
                      cards += ' <div class="card">'+
                                  '<div class="row g-0 col-12">'+
                                    '<div class="col-md-5 d-flex align-items-center" >'+
                                      '<img width="100%" id="" src="'+image+'" alt="" attr-img ="">'+
                                    '</div>'+
                                        '<div class="col-md-7">'+
                                            '<div class="card-body">'+
                                              '<h6 class="card-title">'+nombre+'</h6>'+
                                              '<p class="card-text">'+
                                                'Grado de Similitud: '+element.similarity+'%'+
                                                '<br>'+
                                                'Intento: '+ (4 - element.attempt) + 
                                                '<br>'+
                                                'Fecha y Hora: '+ (new Date(element.created_at)).toLocaleDateString()+
                                              '</p>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div>'+
                                    '<div class="card-footer">'+
                                    '</div>'+
                                '</div>'
                       
                    });
                    contenedor.innerHTML = cards;
                },
                error: function (error) {
                    JSON.stringify(error);
                }
            });
          $('#rec_usuario').modal('show');

      }

      function habilitar(e){
        //console.log(e.getAttribute('attr_id'));
        
      }
      
    </script>
@endsection