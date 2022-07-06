@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body card-bg">
                        <h1 class="text-center h4">Listado indicadores sysad.
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('indicador.create') }}" role="button"
                                title="Crear indicador sysad">
                                <i class="fa fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('indicador.index') }}" role="button"
                                title="Lista completa">
                                <i class="fa fa-list" aria-hidden="true"></i></a>
                            <div class="my-2">
                                <form action="{{ route('indicador.index') }}"
                                    class="input-group d-flex justify-content-end">
                                    <div class="form-outline">
                                        <input type="text" name="search" class="form-control" placeholder="Buscar"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Indicador sysad</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($indicators) != 0)
                                    @foreach ($indicators as $indicator)
                                        <tr>
                                            <td>{{ $indicator->name }}</td>
                                            <td>{{ $indicator->description }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('indicador.edit', $indicator->id) }}"
                                                    class="btn btn-success ancla"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('indicador.destroy', $indicator->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $indicator->name }}?') "><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No existen indicadores sysad.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $indicators->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-bg {
            background-image: url('{{ asset('img/itvo.ico') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20%;
            background-opacity: 0.5;
        }
    </style>
@endsection
