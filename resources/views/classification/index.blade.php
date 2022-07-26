@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado de giros
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" style="width: 50%" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('giro.create') }}" role="button"
                                title="Crear giro">
                                <i class="fa fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('giro.index') }}" role="button"
                                title="Lista completa">
                                <i class="fas fa-list-ul"></i></a>
                            <div class="my-2">
                                <form action="{{ route('giro.index') }}" class="input-group d-flex justify-content-end">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $search_to_word }}" name="search"
                                            class="form-control" placeholder="Buscar" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary ancla" id="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo de convenio</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($classifications) != 0)
                                    @foreach ($classifications as $classification)
                                        <tr>
                                            <td>{{ $classification->name }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('giro.edit', $classification->id) }}"
                                                    class="btn btn-success ancla"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('giro.destroy', $classification->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger ancla"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $classification->name }}?') "><i
                                                            class="fas fa-eraser"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No existen giros.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $classifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
