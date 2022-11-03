@extends('layouts.app')

@section('content')   <!-- pagina adentro del inicio de seccion  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! Hola mudo') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
