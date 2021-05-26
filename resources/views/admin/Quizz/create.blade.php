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
                <div class="card col-12" id="q-container">
                    <div class="card-body">

                    </div>
                  </div>
                <div class="row preguntas " id="preguntas">
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
                    <div id="copy" class="col-12 container">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pregunta</label>
                            <textarea class="form-control" id="nombre"></textarea>


                        </div>
                        <p>Opciones</p>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <input type="text" class="form-control" id="opt1">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control" id="opt1">

                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control" id="opt1">

                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1">

                                <input type="text" class="form-control" id="opt1">

                        </div>

                    </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="addquestion">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        jQuery(function($) {
            $("#addquestion").click(function(e) {

                e.preventDefault();

                var cantidad = $(".clone").length + 1;
                var cloned = $("#copy:first").clone(true);

                inpt_nombre=cloned.find('#nombre').attr('name', 'pregunta'+cantidad)

                cloned.addClass('mt-4');

                cloned.appendTo('#preguntas');
               // cloned.find('.p:first').html('Pregunta ' + cantidad);
                //cloned.find('.r:first').html('Respuesta ' + cantidad);
                // cloned.find('#checkbox-respuesta').attr('name', 'respuesta'+cantidad);

            });
        })


    </script>

@endsection
