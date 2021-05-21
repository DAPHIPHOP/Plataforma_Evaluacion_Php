@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear nueva evaluacion
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.quizz.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Nombre</label>
                    <input class="form-control " type="text" name="name" id="name" required>


                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Disponible desde</label>
                    <input type="text" class="form-control col-3" name="disp_from" placeholder="{{ now() }}"
                        value="{{ now() }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Disponible hasta</label>
                    <input type="text" class="form-control col-3" name="disp_to" placeholder="{{ now() }}"
                        value="{{ now() }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">duracion</label>
                    <input type="text" class="form-control col-1" name="duration">
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Nueva pregunta
                </button>
                <hr>
                <div class="row d-none">
                    <div class="card col-12">
                        <div class="card-body">

                        </div>
                      </div><div class="card col-12">
                        <div class="card-body">

                        </div>
                      </div>
                </div>



                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pregunta</label>
                            <textarea class="form-control"></textarea>


                        </div>
                        <p>Opciones</p>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control">

                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control">

                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control">

                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
