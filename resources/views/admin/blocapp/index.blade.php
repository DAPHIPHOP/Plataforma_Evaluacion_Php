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
                            <th scope="col">ID</th>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMRES</th>
                            <th scope="col">IPPUBLICA</th>
                            <th scope="col">ESTADO</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->id}}</td>
                                <td>{{ $estudiante->codigo}}</td>
                                <td>{{ $estudiante->nombres}}</td>
                                <td>{{ $estudiante->ipPublica}}</td>
                                <td>{{ $estudiante->estado}}</td>
                                <td>
                                    <button class="btn btn-info">Mas Detalles</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
