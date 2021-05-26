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
                            <th scope="col">ID EVALUACION</th>
                            <th scope="col">NOMBRE EVALUACION</th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        @foreach($evaluacions as $evaluacion)
                            <tr>
                                <td>{{ $evaluacion->id}}</td>
                                <td>{{ $evaluacion->name}}</td>
                                <td>
                                    <a href="{{route('admin.blocappresults')}}" class="btn btn-info">Ver alumnos</a>
                {{ $evaluacion->students }}
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