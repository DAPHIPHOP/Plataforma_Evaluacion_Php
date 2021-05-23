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
                        @foreach($users as $users)
                        <tr>
                            <td hidden>{{ $users->id}}</td>
                                <td>{{ $users->name}}</td>
                                <td>{{ $users->apellidos}}</td>
                                <td>{{ $users->email}}</td>
                                <td hidden>{{ $users->email_verified_at}}</td>
                                <td hidden>{{ $users->password}}</td>
                                <td hidden>{{ $users->remember_token}}</td>
                                
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