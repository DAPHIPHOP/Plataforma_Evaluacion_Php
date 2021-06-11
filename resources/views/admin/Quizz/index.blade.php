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
            Lista de evaluaciones
        </div>
        <div class="container">
            <a class="btn btn-success btn-block btn-lg mt-5 mb-5 " href="{{ route('admin.quizz.create') }}">Crear
                evaluacion</a>
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
                                Disponible desde
                            </th>
                            <th>
                                Disponible hasta
                            </th>
                            <th>Duracion</th>
                            <th>Resultados</th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr data-entry-id="{{ $quiz->id }}">
                                <td>
                                    {{ $quiz->id ?? '' }}
                                </td>
                                <td>
                                    {{ $quiz->name ?? '' }}
                                </td>
                                <td>
                                    {{ $quiz->disp_from }}
                                </td>
                                <td>
                                    {{ $quiz->disp_to }}
                                </td>
                                <td>
                                    {{ $quiz->duration }} minutos
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.reporte.index', ['quizz' => $quiz]) }}"><i
                                        class="fa fa-file-excel mr-2"></i>Excel</a>
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.quizz.result', ['id' => $quiz]) }}">Resultados</a>

                                </td>
                                <td>



                                    <a class="btn  btn-success" href="{{ route('admin.quizz.show', $quiz->id) }}">
                                        Ver
                                    </a>

                                    <a class="btn  btn-info" href="{{ route('admin.quizz.edit', $quiz->id) }}">
                                        Editar
                                    </a>


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
