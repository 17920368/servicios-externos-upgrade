@extends('layouts.app')

@section('content')
    <div class="container col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado de convenios.
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            <a class="btn btn-primary my-2 ancla" href="{{ route('convenio.create') }}" role="button"
                                title="Crear convenio">
                                <i class="fas fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('convenio.index') }}" role="button"
                                title="Lista completa">
                                <i class="fas fa-list-ul"></i></a>
                            <div class="my-2 w-25 ancla">
                                {!! Form::select('specialty_id', $specialties, '', [
                                    'class' => ['form-select', 'w-100', 'mw-100'],
                                    'id' => 'specialty_id',
                                    'placeholder' => 'Seleccione carrera',
                                    'onChange' => 'onChangeToResponse()',
                                    'title' => 'Filtrar por carrera',
                                ]) !!}
                            </div>
                            <div class="my-2">
                                <form action="{{ route('convenio.index') }}" class="input-group d-flex justify-content-end">
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
                                    <th scope="col">Folio</th>
                                    <th scope="col">Instancia</th>
                                    <th scope="col">Tipo de convenio</th>
                                    <th scope="col">Fecha de firma</th>
                                    <th scope="col">Fecha de vigencia</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($agreements) != 0)
                                    @foreach ($agreements as $agreement)
                                        <tr>
                                            <td>{{ $agreement->invoice }}</td>
                                            <td>{{ $agreement->instances->name }}</td>
                                            <td>{{ $agreement->agreements_types->name }}</td>
                                            <td>{{ $agreement->start_date }}</td>
                                            <td>{{ $agreement->end_date }}</td>
                                            <td>{{ $status[$agreement->status] }}</td>
                                            <td class="d-flex justify-content-start"><a title="Editar"
                                                    href="{{ route('convenio.edit', $agreement->id) }}"
                                                    class="btn btn-success ancla"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('convenio.destroy', $agreement->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button title="Eliminar" type="submit" class="btn btn-danger ancla"
                                                        onclick="return confirm( '¿Está seguro de eliminar {{ $agreement->name }}?') "><i
                                                            class="fas fa-eraser"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No existen convenios.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if (!isset($validate))
                            {{ $agreements->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onChangeToResponse() {
            let specialties = document.getElementById("specialty_id");
            let specialty_id = specialties.value;
            location.href = "/convenios/por-carrera/" + specialty_id;
        }
    </script>
@endsection
