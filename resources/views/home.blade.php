@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-primary">
                        <h2>{{ __('PLATAFORMA DE LA OFICINA SERVICIOS EXTERNOS') }}</h2>
                    </div>

                    <div class="card-body" id="body-main"
                        style=" background-image: url({{ asset('img/bg-juarez.jpg') }}); background-size: cover; background-position: inherit;"
                        @if (session('status')) <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> @endif
                        </div>
                    </div>
                </div>
            </div>
        @endsection
