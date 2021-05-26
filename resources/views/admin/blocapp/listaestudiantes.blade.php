@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Tabla
                </div>

                <table class="table table-dark table-striped mt-4 text-center ">

                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">DireccionIP</th>
                            <th scope="col">DireccionMAC</th>
                            <th scope="col">Lista de Aplicaciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizz->students as $student)
                        <tr>
                            <td>{{ $student->alumno->user->dni}}</td>
                            <td>{{ $student->alumno->user->name}}</td>
                            <td>{{ $student->alumno->user->apellidos}}</td>
                            <td>{{$student->direcciones->direccionIP}}</td>
                            <td>{{$student->direcciones->direccionMAC}}</td>
                               {{--   <td>
                                    <a href="{{route('admin.blocappresultsapps')}}" class="btn btn-info">Ver Aplicaciones</a>
                                </td>  --}}
                                  <td>
                                @foreach ($student->aplicaciones as $app)
                                <li>{{$app->nombreAppList}}</li>

                                @endforeach
                                </td>  

                        </tr>
                        @endforeach



                    </tbody>
                </table


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
