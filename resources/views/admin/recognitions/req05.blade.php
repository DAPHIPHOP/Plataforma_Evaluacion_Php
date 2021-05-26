@extends('layouts.admin')
@section('content')
<div class="container cards bg-white px-0">
  
<div class="card-header">
  <h4>Registro de Identificación</h4>
</div>
<div class="card-body">
    <div class="row">
    @foreach ($users as $item)
    <div class="col-lg-6 p-2">
      <div class="card">
        <div class="row g-0 col-12">
          <div class="col-md-5 d-flex align-items-center" >
            <img width="100%" id="" class="imagen_mostrar" src="" alt="" attr-img ="{{$item->image}}">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h6 class="card-title">{{$item->name}}</h6>
              <p class="card-text">
                Email: {{$item->email}}
                <br>
                Intentos Restantes: {{$item->intentos}}
              </p>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <form action="{{url("/admin/recognitions/req05/$item->id")}}" method="post">
            @csrf
            @method('DELETE')
            <div class="row justify-content-between px-3">
            <button type="button" onclick="ver_intentos(this)" attr_id = "{{$item->id}}" attr_nombre="{{$item->name}}" attr_img="{{$item->image}}" class="btn btn-primary">Ver más</button>
            @if (($item->intentos)<=0)
              <button type="submit" class="btn btn-danger">Desbloquear</button>
            @endif
            </div>
          </form>
        </div>
      </div>
    </div>
    
    @endforeach
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