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
                    <th scope="row" class="bg-info">Disponible desde</th>
                    <td>{{$quizz->disp_from}}</td>

                  </tr>
                  <tr>
                    <th scope="row" class="bg-info">Disponible hasta</th>
                    <td>{{$quizz->disp_to}}</td>

                  </tr>
                  <tr>
                    <th scope="row" class="bg-info">Duracion</th>
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
                                            $bg='';
                                          if( $option->is_answer==1){
                                                    $checked = 'checked';
                                                    $bg='bg-success';
                                                }

                                        @endphp
                                        <div class="form-check mb-3 {{$bg}}">
                                            <input disabled  {{ $checked }} class="form-check-input" type="radio"
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
                    @endforeach

                </div>

            </form>
        </div>
    </div>



@endsection
