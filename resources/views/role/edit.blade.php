@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Editar rol
                        </h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('roles.update', $rol->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                {!! Form::label('', 'Nombre del rol', [
                                    'class' => 'col-md-4 col-form-label
                                                            text-md-end',
                                ]) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', $role->name, [
                                        'class' => 'form-control',
                                        'autofocus',
                                        'autofocus',
                                        'id' => 'rol',
                                        'onkeyup' => 'firstLetterToCapitalize(rol);',
                                    ]) !!}
                                    @error('name')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('permissions', 'Permisos', [
                                    'class' => 'col-md-4 col-form-label
                                                            text-md-end',
                                ]) !!}
                                <div class="col-md-6">
                                    <div class="form-check scroll-permissions">
                                        @foreach ($permissions as $permission)
                                            <label class="form-check-label inline_label">
                                                {!! Form::checkbox('permissions[]', $permission->id, null, [
                                                    'class' => 'form-check-input',
                                                    'id' => $permission->id,
                                                ]) !!}
                                                {{ $permission->description }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <strong class="text-danger text-center mt-5">{{ $message }}</strong>
                                    @enderror
                                </div>
                                @foreach ($role->permissions as $registre)
                                    @foreach ($permissions as $permission)
                                        @if ($permission->id == $registre->id)
                                            <script>
                                                checkActive({{ $permission->id }});

                                                function checkActive(idPermission) {
                                                    let checkPermission = document.getElementById(
                                                        idPermission
                                                    );
                                                    checkPermission.setAttribute("checked", "");
                                                }
                                            </script>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary',
                                    ]) }}
                                    <a class="btn btn-danger" href="{{ route('roles.index') }}"><i class="fa fa-ban"
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
