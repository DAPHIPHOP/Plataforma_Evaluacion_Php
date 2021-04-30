@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white border rounded border-info shadow-lg ">
            <form class="mt-5 mb-5" id="form" name="form" action="{{ route('client.test') }}">
                @csrf
                <div class="form-group justify-content-center ">
                    <p class="text-center font-weight-bold">
                        Código de evaluación
                    </p>
                    <input class="form-control form-control-lg " id="exampleFormControlInput1" placeholder="Ingrese el codigo aqui" type="text" required="">
                    </input>
                </div>
                <div class="form-check mt-5 mb-2">
                    <input class="form-check-input " id="exampleCheck1" type="checkbox" required="">
                        <a class="form-check-label font-weight-bold" data-target="#exampleModal" data-toggle="modal" for="exampleCheck1" href="#">
                            Acepto los términos y condiciones
                        </a>
                    </input>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg" type="submit" id="submit">
                        Ingresar
                    </button>
                </div>
            </form>
            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Términos y condiciones
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                      {{--   <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-primary" type="button">
                                Save changes
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

    $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });
</script>
@endsection
