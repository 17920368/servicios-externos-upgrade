@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Editar tipo convenio
                        </h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('tipo-convenio.update', $agreement_type->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                {!! Form::label('', 'Nombre', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', $agreement_type->name, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'autofocus',
                                        'id' => 'agreement_type',
                                        'onkeyup' => 'firstLetterToCapitalize(agreement_type);',
                                    ]) !!}
                                    @error('name')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary',
                                    ]) }}
                                    <a class="btn btn-danger" href="{{ route('tipo-convenio.index') }}"><i
                                            class="fa fa-ban" aria-hidden="true"></i>
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
