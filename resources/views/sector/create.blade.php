@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Crear sector
                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sector.store') }}" id="form">
                            @csrf
                            <div class="row mb-3">
                                {!! Form::label('', 'Nombre', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', '', ['class' => 'form-control', 'autofocus', 'required', 'autofocus', 'id' => 'rol', 'onkeyup' => 'firstLetterToCapitalize(rol);']) !!}
                                    @error('name')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::button('<i class="fa fa-plus" aria-hidden="true"></i> Crear', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary',
                                        'id' => 'btn-submit',
                                    ]) }}
                                    <a class="btn btn-danger" href="{{ route('sector.index') }}"><i class="fa fa-ban"
                                            aria-hidden="true"></i>
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
