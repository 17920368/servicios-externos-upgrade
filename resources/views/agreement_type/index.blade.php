@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado tipos de convenios
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('tipo-convenio.create') }}" role="button"
                                title="Crear tipo de convenio">
                                <i class="fa fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('tipo-convenio.index') }}"
                                role="button" title="Lista completa">
                                <i class="fa fa-list" aria-hidden="true"></i></a>
                            <div class="my-2">
                                <form action="{{ route('tipo-convenio.index') }}"
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($agreements_types) != 0)
                                    @foreach ($agreements_types as $agreement_type)
                                        <tr>
                                            <td>{{ $agreement_type->name }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('tipo-convenio.edit', $agreement_type->id) }}"
                                                    class="btn btn-success ancla"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('tipo-convenio.destroy', $agreement_type->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $agreement_type->name }}?') "><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No existen tipos de convenios</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $agreements_types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
