@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Crear convenio
                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('convenio.store') }}" id="form">
                            @csrf
                            <div class="row mb-3">
                                {!! Form::label('', 'Folio del convenio', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('invoice', '', [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'invoice',
                                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();',
                                    ]) !!}
                                    @error('invoice')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Fecha de firma', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::date('start_date', '', [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'start_date',
                                    ]) !!}
                                    @error('start_date')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Fecha de vigencia', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::date('end_date', '', [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'required',
                                        'autofocus',
                                        'id' => 'end_date',
                                    ]) !!}
                                    @error('end_date')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Estatus', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('status_id', $status, '', [
                                        'class' => 'form-select',
                                        'id' => 'region_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('status_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Tipo de convenio', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('agreement_type_id', $agreements_types, '', [
                                        'class' => 'form-select',
                                        'id' => 'agreement_type_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('agreement_type_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Instancia', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('instance_id', $instances, '', [
                                        'class' => 'form-select',
                                        'id' => 'instance_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('instance_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Indicador', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('indicator_id', $indicators, '', [
                                        'class' => 'form-select',
                                        'id' => 'indicator_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('indicator_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('', 'Indicador SYSAD', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('sysad_indicator_id', $sysadIndicators, '', [
                                        'class' => 'form-select',
                                        'id' => 'sysad_indicator_id',
                                        'placeholder' => 'Seleccione',
                                    ]) !!}
                                    @error('sysad_indicator_id')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('specialties_id', 'Carreras', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    <div class="form-check scroll-check">
                                        @foreach ($specialties as $specialty)
                                            <label class="form-check-label inline_label">
                                                {!! Form::checkbox('specialties_id[]', $specialty->id, null, ['class' => 'form-check-input']) !!}
                                                {{ $specialty->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('specialties_id')
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
                                    <a class="btn btn-danger" href="{{ route('convenio.index') }}"><i class="fa fa-ban"
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
