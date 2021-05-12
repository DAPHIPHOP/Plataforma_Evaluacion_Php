@extends('layouts.client')

@section('content')

<style>.bg-secondariy {
    background-color: #aeb3b9!important;
}
.border-3 {
    border-width:5px !important;
}</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col mb-5 mt-5">
                <p class="text-center font-weight-bold font-weight-bold col mb-5 mt-5 text-info">Panel de navegacion </p>

                <p class="text-center font-weight-bold">Tiempo Restante</p>
                <p class="text-center" id="clock">05:36</p>
                <p class="text-center"><a href="javascript:void(0);" onclick="finish()"
                        class="btn-wide btn btn-lg btn-success">Finalizar evaluacion</a></p>
            </div>
            <div class="col-md-8">
                <div class="col mb-5 mt-5 font-weight-bold">
                    <h4>{{ $questions->first()->quizz->name }}</h4>
                </div>
                <div class="tab-content" id="myTabContent">

                    @foreach ($questions as $question)

                        <div class="tab-pane fade @if ($loop->first) show active @endif" id="tab-{{ $question->id }}" role="tabpanel"
                            aria-labelledby="nav-{{ $question->id }}">

                            <div class="card ">
                                <div class="card-header">
                                    <p>{{ $question->question_text }}</p>
                                    <p class="text-info">{{ $question->points }} puntos.</p>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('client.test.store') }}"
                                        id="form-create-{{ $question->id }}">
                                        @csrf

                                        @foreach ($question->questionOptions as $option)
                                            @php

                                                $checked = '';
                                                if ($marqueds[$loop->parent->index]) {
                                                    if ($marqueds[$loop->parent->index]->option_id == $option->id) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                            @endphp
                                            <div class="form-check mb-3">
                                                <input {{ $checked }} class="form-check-input" type="radio"
                                                    name="questions[{{ $question->id }}]" id="option-{{ $option->id }}"
                                                    value="{{ $option->id }}" @if (old("
                                                    questions.$question->id") == $option->id) checked @endif onChange="submitAnswer(this);">
                                                <label class="form-check-label" for="option-{{ $option->id }}">
                                                    {{ $option->option_text }}
                                                </label>
                                            </div>
                                        @endforeach

                                        @if ($errors->has(" questions.$question->id"))
                                            <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                            </span>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div class=" col-12 d-flex justify-content-center mt-5 ">

                            <ul class="nav nav-pills pagination pagination-lg" id="myTab" role="tablist">


                                @foreach ($questions as $question)
                                    @php

                                        $class = 'bg-secondariy';
                                        if ($marqueds[$loop->index]) {
                                            $class = 'bg-success';
                                        }


                                    @endphp
                                    <li class="page-item" role="presentation">
                                        <a class="page-link btn mr-2 text-white @if ($loop->first) active first
                                            @endif  {{ $class }}"
                                            aria-pressed="true"
                                            id="nav-{{ $question->id }}" data-toggle="tab"
                                            href="#tab-{{ $question->id }}" role="tab"
                                            aria-controls="tab-{{ $question->id }}"
                                            aria-selected="false" style="">{{ $loop->iteration }}</a>
                                    </li>
                                @endforeach

                            </ul>


                    </div>
                </div>

            </div>

        </div>



    </div>


    @endsection
@section('script')
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    jQuery(function($) {
        $("#btn_accion").on('click', function(){
            console.log('Acción ejecutada!')
          })
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
            event.target // newly activated tab
            event.relatedTarget // previous active tab

            console.log($(event.target).addClass('border border-primary border-3'))
            console.log($(event.relatedTarget).removeClass('border border-primary border-3'))
          })
          //$('#myTab li:nth-child(3) a').tab('show')
          $('#btn_accion').trigger('click');
        $("#t6").click();
        $(".first").addClass(' border border-primary border-3 ');

        const date1 = new Date("{{ $intento->start }}");

        /*      console.log(date1.getTime())
        console.log(Date.parse('{{ $intento->hora_inicio }}'));*/
        var fiveSeconds = date1.getTime() + (60000 * {{ $intento->quizz->duration }});
        $('#clock').countdown(fiveSeconds)
            .on('update.countdown', function(event) {
                var $this = $(this);

                if (event.elapsed) {
                    $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));

                } else {
                    $this.html(event.strftime('Tiempo restante: <span>%H:%M:%S</span>'));
                }
            }).on('finish.countdown', function(event) {

                window.location.assign("{{ route('client.test.finish', ['id' => $intento->id]) }}")

            });
    })


    function submitAnswer(elem) {

        container = $(elem).parent().parent().parent();
        btn=$(container);
        console.log();
        //var res = str.split(" ");
        form = container.children();

        marq='#nav-'+btn.parent().parent().attr('id').split("-")[1];
        console.log($(marq).addClass('bg-success').removeClass('bg-secondariy'))
        dataF = new FormData($(form)[0]);
        $.ajax({
            url: '{{ route('client.test.store') }}',
            method: 'POST',
            data: dataF,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,

            success: function(response) {
                console.log(response);
            }
        });
    }

    function finish() {

        $.ajax({
            url: '{{ route('client.checkMarqueds',['id'=>$intento->id]) }}',
            method: 'POST',
            data: null,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,

            success: function(response) {
               if(response.success){
                Swal.fire({
                    title: 'Desea finalizar  el examen ?',
                    text: "No podra  revertir esta accion",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: `Si , finalizar`,
                    cancelButtonText: `Cancelar`,

                }).then((result) => {


                    if (result.isConfirmed) {

                        window.location.assign("{{ route('client.test.finish', ['id' => $intento->id]) }}")
                    }
                })
               }else{

                var html='';
                for(var k in response.sinMarcar) {
                    console.log(k, response.sinMarcar[k]);
                    html+='<p><li><strong class="">'+ response.sinMarcar[k].name+'</strong></li></p>';
                 }
                Swal.fire({
                    title: '<strong class="text-danger">Hay '+(response.sinMarcar.length)+' preguntas sin responder <span class="text-info">¿ Desea finalizar  el examen ?</span> </strong>',
                    icon: 'warning',
                    html:html,
                    showCancelButton: true,
                    confirmButtonText: `Si , finalizar`,
                    cancelButtonText: `Volver`,

                  })
               }
            }
        });

    }

</script>
@endsection


