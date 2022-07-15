@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Editar área de conocimiento
                        </h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('instancia.update', $instance->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                {!! Form::label('', 'Nombre de la instancia', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', $instance->name, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'instance',
                                        'onkeyup' => 'firstLetterToCapitalize(instance);',
                                    ]) !!}
                                    @error('name')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Responsable', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('responsible', $instance->responsible, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'responsible',
                                        'onkeyup' => 'firstLetterToCapitalize(responsible);',
                                    ]) !!}
                                    @error('responsible')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Email', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', $instance->email, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'email',
                                    ]) !!}
                                    @error('email')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Teléfono', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('phone', $instance->phone, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                    ]) !!}
                                    @error('phone')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Alcance', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('scope_id', $scopes, $instance->scope_id, [
                                        'class' => 'form-select',
                                        'id' => 'region_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('scope_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Sector', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('sector_id', $sectors, $instance->sector_id, [
                                        'class' => 'form-select',
                                        'id' => 'sector_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('sector_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Tipo de sector', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('sector_type_id', $sectors_types, $instance->sector_type_id, [
                                        'class' => 'form-select',
                                        'id' => 'sector_type_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('sector_type_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Tamaño de instancia', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('size_id', $sizes, $instance->size_id, [
                                        'class' => 'form-select',
                                        'id' => 'size_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('size_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Giro', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('classification_id', $classifications, $instance->classification_id, [
                                        'class' => 'form-select',
                                        'id' => 'classification_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('classification_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Área de conocimiento', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('area_id', $areas, $instance->area_id, [
                                        'class' => 'form-select',
                                        'id' => 'area_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('area_id')
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
                                    <a class="btn btn-danger" href="{{ route('instancia.index') }}"><i class="fa fa-ban"
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
