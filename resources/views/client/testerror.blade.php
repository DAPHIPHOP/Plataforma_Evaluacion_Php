@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-bold text-white" >Error</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    <p>{{ session('status') }}</p>

                                    <a href="{{ route('client.test') }}" class="btn btn-primary">Start test again</a>
                                </div>
                            </div>
                        </div>
                    @endif

                @if($error=='antes')
                <p class="text-info">El examen estara disponible desde: {{ $quizz->disp_from }} </p>
                @else
                <p class="text-info">El acceso al examen caduco : {{ $quizz->disp_to->diffForHumans() }} </p>
                @endif



               {{--      <a href="{{ route('client.results.send', $result->id) }}" class="btn btn-primary">GET DETAILS IN PDF BY EMAIL</a>
 --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
