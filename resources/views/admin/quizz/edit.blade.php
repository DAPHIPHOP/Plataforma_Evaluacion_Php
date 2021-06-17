@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Actualizar evaluacion
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.quizz.update', ['quizz' => $quizz]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('Put')
                <div class="form-group">
                    <label class="required" for="name">Nombre</label>
                    <input class="form-control " type="text" name="name" value="{{ $quizz->name }}" required>


                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Disponible desde</label>
                    <input type="text" class="form-control col-3" name="disp_from" placeholder="{{ now() }}"
                        value="{{ $quizz->disp_from }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Disponible hasta</label>
                    <input type="text" class="form-control col-3" name="disp_to" placeholder="{{ now() }}"
                        value="{{ $quizz->disp_to }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">duracion</label>
                    <input type="text" class="form-control col-1" name="duration" value="{{ $quizz->duration }}">
                </div>

                <div class="col preguntas " id="preguntas">
                    @foreach ($quizz->quizzQuestions as $question)
                        <div  class="card col-12 container mb-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pregunta</label>
                                <input type="hidden" value="{{$question->id}}" name="question[]">
                                <textarea class="form-control" name="text-{{$question->id}}">{{ $question->question_text }}</textarea>


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
                                    <input class="form-check-input" type="radio" id="ans1" value="{{$option->id}}"  name="ans-{{$question->id}}" {{$is_answer}}>
                                    <input type="text" class="form-control" name="opt-{{$option->id}}" value="{{$option->option_text}}">
                                </div>
                            @endforeach




                        </div>
                    @endforeach

                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
