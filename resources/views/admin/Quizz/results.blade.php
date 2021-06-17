@extends('layouts.admin')
@section('content')
    @can('category_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12 ">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            Resultados de evaluacion : <b>{{ $quizz->name }}</b>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Nota
                            </th>
                            <th>
                                Estado
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizz->students as $student)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $student->alumno->user->name }} {{ $student->alumno->user->apellidos }}
                                </td>
                                <td>
                                    {{ $student->results->sum('points') }}
                                </td>
                                <td>
                                    @if ($student->estado == 'Finalizado')
                                        <h4><span class="badge badge-success">Finalizado</span></h4>
                                    @else
                                        <h4> <span class="badge badge-warning">En curso</span></h4>
                                    @endif

                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function() {





        })

    </script>
@endsection
