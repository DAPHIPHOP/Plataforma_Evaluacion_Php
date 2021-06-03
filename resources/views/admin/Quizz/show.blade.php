@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
             <b>Evaluacion : </b> {{$quizz->name}}
        </div>

        <div class="card-body">
            <table class="table table-bordered">

                <tbody>
                  <tr>
                    <th scope="row">Disponible desde</th>
                    <td>{{$quizz->disp_from}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Disponible hasta</th>
                    <td>{{$quizz->disp_to}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Duracion</th>
                    <td>{{$quizz->duration}}</td>

                  </tr>
                </tbody>
              </table>
            <form method="POST" action="{{ route('admin.quizz.update', ['quizz' => $quizz]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('Put')


                <div class="col preguntas " id="preguntas">
                    @foreach ($quizz->quizzQuestions as $question)
                        <div id="copy" class="card col-12 container mb-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pregunta {{$loop->iteration}}</label>
                                <textarea class="form-control" id="nombre">{{ $question->question_text }}</textarea>


                            </div>
                            <p>Opciones</p>
                            @foreach ($question->questionOptions as $option)
                            @php
                                $is_answer='';
                                if($option->is_answer==1){
                                    $is_answer='checked';
                                }
                            @endphp
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" id="ans1" value="0"  name="ans{{$question->id}}" {{$is_answer}}>
                                    <input type="text" class="form-control" id="opt1" value="{{$option->option_text}}">
                                </div>
                            @endforeach




                        </div>
                    @endforeach

                </div>

            </form>
        </div>
    </div>



@endsection
