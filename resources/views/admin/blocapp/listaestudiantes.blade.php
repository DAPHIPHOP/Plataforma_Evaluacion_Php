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
                            <th hidden scope="col">ID ALUMNO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">EMAIL</th>
                            <th hidden scope="col">EMAILVERIFIED</th>
                            <th hidden scope="col">PASSWORD</th>
                            <th hidden scope="col">REMEMBER_TOKEN</th>
                            <th hidden scope="col">idDirecciones</th>
                            <th scope="col">DireccionIP</th>
                            <th scope="col">DireccionMAC</th>
                            <th hidden scope="col">idAlumno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizz->students as $student)
                        <tr>
                            <td>{{ $student->alumno->user->name}}</td>
                                <td>
                                @foreach ($student->aplicaciones as $app)
                                <li>{{$app->nombreAppList}}</li>

                                @endforeach
                                </td>
                                <td>{{$student->direcciones->direccionIP}}</td>
                                <td>{{$student->direcciones->direccionMAC}}</td>
                                <td hidden></td></td>
                                <td hidden></td>
                                <td hidden></td>

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
