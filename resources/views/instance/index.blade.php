@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado de instancias.
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('instancia.create') }}" role="button"
                                title="Crear instancia">
                                <i class="fas fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('instancia.index') }}" role="button"
                                title="Lista completa">
                                <i class="fas fa-list-ul"></i></a>
                            <div class="my-2">
                                <form action="{{ route('instancia.index') }}"
                                    class="input-group d-flex justify-content-end">
                                    <div class="form-outline">
                                        <input type="text" name="search" class="form-control" placeholder="Buscar"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-primary ancla">
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
                                    <th scope="col">Instancia</th>
                                    <th scope="col">Encargado</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($instances) != 0)
                                    @foreach ($instances as $instance)
                                        <tr>
                                            <td>{{ $instance->name }}</td>
                                            <td>{{ $instance->responsible }}</td>
                                            <td>{{ $instance->email }}</td>
                                            <td>{{ $instance->phone }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('instancia.edit', $instance->id) }}"
                                                    class="btn btn-success ancla"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('instancia.destroy', $instance->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger ancla"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $instance->name }}?') "><i
                                                            class="fas fa-eraser"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No existen instancias.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $instances->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
