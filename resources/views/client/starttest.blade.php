@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white border rounded border-info shadow-lg ">
            <form class="mt-5 mb-5" id="form" name="form" action="{{ route('client.recfacial') }}" method="GET">
                @csrf
                <div class="form-group justify-content-center ">
                    <p class="text-center font-weight-bold">
                        Código de evaluación
                    </p>
                    <input class="form-control form-control-lg " id="exampleFormControlInput1" placeholder="Ingrese el codigo aqui" type="text" required="" name="id">
                    </input>
                </div>
                <div class="form-check mt-5 mb-2">
                    <input class="form-check-input " id="exampleCheck1" type="checkbox" required="">
                        <a class="form-check-label font-weight-bold" data-target="#exampleModal" data-toggle="modal" for="exampleCheck1" href="#">
                            Acepto las condiciones de servicio y la política de privacidad de Face-Blocapp.
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
                            <h4 class="modal-title" id="exampleModalLabel">
                                Términos y condiciones de uso
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">
                                1. Cláusulas
                            </h5>
                            <h5 class="modal-title" id="exampleModalLabel">
                                2. Condiciones legales de prestación del servicio
                            </h5>
                            <br>
                            <h5 class="modal-title" id="exampleModalLabel">
                                3. Condiciones de acceso del usuario
                            </h5>
                            <br>
                            <p>Cláusulas</p>
                            <br>
                            <p>El usuario se compromete a leer detenidamente los términos y condiciones generales, antes de utilizar los servicios que ofrece el sistema.</p>
                            <br>
                            <p>Condiciones legales de prestación del servicio</p>
                            <br>
                            <p>Los datos ingresados por usuario  no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales. Es responsabilidad exclusiva del Usuario mantener la confidencialidad de dichos datos de su cuenta virtual y contraseña, notificar inmediatamente a soporte, si tiene conocimiento del uso no autorizado de su cuenta o de cualquier vulneración de las medidas de seguridad.</p>
                            <br>
                            <p>Condiciones de acceso del usuario</p>
                            <br>
                            <p>Se hace de conocimiento que el uso del ejecutable bloqueara todas la aplicaciones y pestañas a excepción del navegador permitido y es obligatorio que tenga instalado en el dispostivo para rendir la evaluación.Por consiguiente, el usuario debe acceder a la evaluación solamente a través del navegador Google Chrome, además debe de cerrar todas las aplicaciones en ejecución antes de inciar la evaluación.
                                por último, el usuario debe tener una Cámara web a disposición durante el uso del sitio web ya que el sistema Face-Blocapp ejecutara un reconocimiento facial antes de ingresar a la evaluación y durante el transcurso de esta para validar al usuario.</p>
                            </div>
                         <div class="modal-footer">
                            <a href="{{asset('BlocApp.exe')}}" class="btn btn-secondary" type="button">
                                Aceptar
                            </a>

                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>
@endsection
