@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Actualizar evaluacion
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quizz.update",['quizz'=>$quizz]) }}" enctype="multipart/form-data">
            @csrf
            @method('Put')
            <div class="form-group">
                <label class="required" for="name">Nombre</label>
                <input class="form-control " type="text" name="name" value="{{$quizz->name}}" required>


            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Disponible desde</label>
                <input type="text" class="form-control col-3" name="disp_from" placeholder="{{now()}}" value="{{$quizz->disp_from}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Disponible hasta</label>
                <input type="text" class="form-control col-3" name="disp_to" placeholder="{{now()}}"  value="{{$quizz->disp_to}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">duracion</label>
                <input type="text" class="form-control col-1" name="duration"  value="{{$quizz->duration}}">
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
