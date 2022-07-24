@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (isset($title))
                            <h1 class="text-center h4">Listado de convenios {{ $title }} {{ $status[$index] }}
                            </h1>
                        @else
                            <h1 class="text-center h4">Listado de convenios {{ $status[$index] }}
                            </h1>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Instancia</th>
                                    <th scope="col">Fecha de firma</th>
                                    <th scope="col">Fecha de vigencia</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Tipo de convenio</th>
                                    {{-- <th scope="col">Acciones</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($agreements) != 0)
                                    @foreach ($agreements as $agreement)
                                        <tr>
                                            <td>{{ $agreement->invoice }}</td>
                                            <td>{{ $agreement->instances->name }}</td>
                                            <td>{{ $agreement->start_date }}</td>
                                            <td>{{ $agreement->end_date }}</td>
                                            <td class="text-capitalize">{{ $status[$agreement->status] }}</td>
                                            <td>{{ $agreement->agreements_types->name }}</td>
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
