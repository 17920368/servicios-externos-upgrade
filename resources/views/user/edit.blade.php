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
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="user" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        autocomplete="name" autofocus value="{{ $user->name }}"
                                        onkeyup="firstLetterToCapitalize(user);">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Dirección de correo
                                                                                                                                            electrónico') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required
                                        autocomplete="email" value="{{ $user->email }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" value="{{ $user->password }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {!! Form::label('roles', 'Rol', ['class' => 'col-md-4 col-form-label text-md-end']) !!}
                                <div class="col-md-6">
                                    <div class="form-check scroll-roles">
                                        @foreach ($roles as $rol)
                                            <label class="form-check-label inline_label">
                                                {!! Form::checkbox('roles', $rol->id, null, ['class' => 'form-check-input', 'id' => $rol->id]) !!}
                                                {{ $rol->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @foreach ($user->roles as $registre)
                                @foreach ($roles as $rol)
                                    @if ($rol->id == $registre->id)
                                        <script>
                                            checkActive({{ $rol->id }});

                                            function checkActive(idRol) {
                                                let checkRol = document.getElementById(idRol);
                                                checkRol.setAttribute("checked", "");
                                            }
                                        </script>
                                    @endif
                                @endforeach
                            @endforeach
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary',
                                    ]) }}
                                    <a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fa fa-ban"
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
