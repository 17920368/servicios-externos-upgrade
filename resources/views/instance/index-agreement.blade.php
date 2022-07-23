@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Listado de convenios de la instancia
                            {{ $agreements[0]->instances->name }}.
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end flex-wrap">
                            {{-- <a class="btn btn-primary my-2 ancla" href="{{ route('convenio.create') }}" role="button"
                                title="Crear convenio">
                                <i class="fas fa-plus"></i></a>
                            <a class=" btn btn-secondary my-2 ancla" href="{{ route('convenio.index') }}" role="button"
                                title="Lista completa">
                                <i class="fas fa-list-ul"></i></a> --}}
                            {{-- <div class="my-2">
                                <form action="{{ route('instancia.show', $id) }}"
                                    class="input-group d-flex justify-content-end">
                                    <div class="form-outline">
                                        <input type="text" name="search" class="form-control" placeholder="Buscar"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-primary ancla">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div> --}}
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Tipo de convenio</th>
                                    <th scope="col">Fecha de firma</th>
                                    <th scope="col">Fecha de vigencia</th>
                                    <th scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($agreements) != 0)
                                    @foreach ($agreements as $agreement)
                                        <tr>
                                            <td>{{ $agreement->invoice }}</td>
                                            <td>{{ $agreement->agreements_types->name }}</td>
                                            <td>{{ $agreement->start_date }}</td>
                                            <td>{{ $agreement->end_date }}</td>
                                            <td>{{ $status[$agreement->status] }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No existen convenios.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $agreements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
