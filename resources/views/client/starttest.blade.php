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
                            Acepto los términos y condiciones (Descarga el BlocApp)
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
                            <p>El acceso al sitio web por parte del usuario, la utilización del contenido, productos y/o servicios implica estar de acuerdo con los terminos siguientes:</p>
	                        <p>     1.El estudiante solo deberan usar el navegador Google Chrome para realizar un examen.</p>
                            <p>     2.El estudiante acepta el tratamiendo de los datos que seran utilizados solo para este fin.</p>
                            <p>     3.El estudiante deben contan con una camara para realiza un examen.</p>
	                        <p>     4.El estudiante debe descargar el ejecutable BlocApp y ejecutarlo antes de un examen.</p>
                            <p>Los datos ingresados por usuario  no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p>
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
