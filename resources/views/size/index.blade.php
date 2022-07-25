@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado de tamaño de instancias
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('tamanio.create') }}" role="button"
                                title="Crear tamaño de instancia">
                                <i class="fa fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('tamanio.index') }}" role="button"
                                title="Lista completa">
                                <i class="fas fa-list-ul"></i></a>
                            <div class="my-2">
                                <form action="{{ route('tamanio.index') }}" class="input-group d-flex justify-content-end">
                                    <div class="form-outline">
                                        <input type="text" name="search" class="form-control" placeholder="Buscar"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-primary ancla" id="search">
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
                                    <th size="col">Tamaño</th>
                                    <th size="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($sizes) != 0)
                                    @foreach ($sizes as $size)
                                        <tr>
                                            <td>{{ $size->name }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('tamanio.edit', $size->id) }}"
                                                    class="btn btn-success ancla"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('tamanio.destroy', $size->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger ancla"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $size->name }}?') "><i
                                                            class="fas fa-eraser"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No existen tamaños de instancias.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $sizes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
