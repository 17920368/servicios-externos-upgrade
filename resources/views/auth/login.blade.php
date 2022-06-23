@extends('layouts.app')

@section('content')
    <div class="container">
        <img class="imgHeader" src="{{ asset('img/banner_principal_login.png') }}" alt="Banner ITVO">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-uppercase">
                    <div class="card-header text-uppercase text-center">
                        <h3>{{ __('Acceso a la plataforma') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror text-uppercase" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="CORREO ELECTRÓNICO">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror inputText" name="password"
                                    required autocomplete="current-password" placeholder="CONTRASEÑA">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('RECUÉRDAME') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary button-login">
                                        {{ __('INGRESAR') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿OLVIDÓ SU CONTRASEÑA?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
