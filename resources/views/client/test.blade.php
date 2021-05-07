@extends('layouts.client')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col mb-5 mt-5">
             <p class="text-center font-weight-bold font-weight-bold col mb-5 mt-5 text-info">Panel de navegacion </p>

             <p class="text-center font-weight-bold">Tiempo Restante</p>
             <p class="text-center" id="clock">05:36</p>
<p class="text-center"><a href="javascript:void(0);" onclick="finish()" class="btn-wide btn btn-success">Finalizar evaluacion</a></p>
        </div>
        <div class="col-md-8">
        <div class="col mb-5 mt-5 font-weight-bold"><h4>{{$questions->first()->quizz->name}}</h4></div>
                    <form method="POST" action="{{ route('client.test.store') }}" id="form-create">
                        @csrf
                                    @foreach($questions as $question)
                                        <div class="card ">
                                            <div class="card-header"><p>{{ $question->question_text }}</p>
                                            <p class="text-info">{{ $question->points }} puntos.</p></div>

                                            <div class="card-body">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                @foreach($question->questionOptions as $option)
                                                  @php
                                                  $checked="";
                                                      if($marqued){
                                                        if ($marqued->option_id==$option->id)
                                                      $checked="checked";
                                                      }
                                                  @endphp
                                                    <div class="form-check mb-3">
                                                        <input {{$checked}} class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif onChange="submitAnswer();">
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {{ $option->option_text }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                    </form>


        </div>
    </div>
    <div class=" col-12 d-flex justify-content-center mt-5 pagination pagination-lg">
        {{$questions->links()}}
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    jQuery(function($) {

        const date1 = new Date("{{ $intento->start }}");

        /*      console.log(date1.getTime())
        console.log(Date.parse('{{ $intento->hora_inicio }}'));*/
        var fiveSeconds = date1.getTime() + (60000* {{ $intento->quizz->duration }});
        $('#clock').countdown(fiveSeconds)
        .on('update.countdown', function(event) {
          var $this = $(this);

          if (event.elapsed) {
            $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));

          } else {
            $this.html(event.strftime('Tiempo restante: <span>%H:%M:%S</span>'));
          }
        }).on('finish.countdown', function(event) {

        window.location.assign("{{ route('client.test.finish',['id'=>$intento->id])}}")

        });
    })


    function submitAnswer() {

        dataF= new FormData($("#form-create")[0]);
          $.ajax({
                    url: '{{route("client.test.store")}}',
                    method: 'POST',
                    data: dataF,
       cache:false,
         dataType:'json',
        processData:false,
         contentType:false,

                    success: function (response) {
                         console.log(response);
                    }
                 });
     }

     function finish(){
        Swal.fire({
            title: 'Desea finalizar  el examen ?',
            text: "No podra  revertir esta accion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Si , finalizar`,
            cancelButtonText: `Cancelar`,

          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.assign("{{ route('client.test.finish',['id'=>$intento->id])}}")
            }
          })
     }
</script>
@endsection
