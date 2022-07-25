@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center h4">Reporte de indicadores por fecha
                        </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="my-2">
                                <form action="{{ route('agreement.by.date') }}"
                                    class="input-group d-flex justify-content-center" id="form">
                                    <div class="form-outline ancla">
                                        {!! Form::date('date', $date, [
                                            'class' => 'form-control',
                                            'autofocus',
                                            'required',
                                        ]) !!}
                                    </div>
                                    <button id="btn_submit" type="submit" title="Buscar" class="btn btn-primary ancla">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button id="btn_clear" type="button" title="Limpiar búsqueda"
                                        class="btn btn-danger ancla">
                                        <i class="fas fa-backspace"></i>
                                    </button>
                                    <button type="button" title="Ver indicadores" class="btn btn-secondary ancla">
                                        <i class="fa fa-bullseye"></i>
                                    </button>
                                    {{-- <a tid="modal-btn" ype="button" href="#" class="btn btn-primary ml-5"
                                        data-toggle="modal" data-target="#exampleModal">
                                        <i class="bi bi-calculator"></i>
                                        VER CANTIDAD
                                    </a> --}}
                                </form>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (count($agreements) != 0)
                            <h2 class="h6 text-center">Total de convenios: {{ count($agreements) }}</h2>
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
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($agreements) != 0)
                                    @foreach ($agreements as $agreement)
                                        <tr>
                                            <td>{{ $agreement->invoice }}</td>
                                            @for ($i = 0; $i < count($instances); $i++)
                                                @if ($instances[$i]->id == $agreement->instance_id)
                                                    <td>{{ $instances[$i]->name }}</td>
                                                @break;
                                            @endif
                                        @endfor
                                        <td>{{ $agreement->start_date }}</td>
                                        <td>{{ $agreement->end_date }}</td>
                                        <td>{{ $status[$agreement->status] }}</td>
                                        @for ($i = 0; $i < count($agreements_types); $i++)
                                            @if ($agreements_types[$i]->id == $agreement->agreement_type_id)
                                                <td>{{ $agreements_types[$i]->name }}</td>
                                            @break;
                                        @endif
                                    @endfor
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No existen convenios.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- @if (count($agreements) != 0)
                    {{ $agreements->links() }}
                @endif --}}
            </div>
        </div>
    </div>
</div>
</div>
<script defer>
    const btn_clear = document.getElementById("btn_clear");
    const btn_submit = document.getElementById("btn_submit");
    btn_clear.addEventListener('click', (e) => {
        e.preventDefault();
        if (dataValidate()) {
            let res = confirm('¿Desea limpiar la búsqueda?');
            if (res) {
                clearSearch();
            }
        } else {
            alert("Error al limpiar la búsqueda")
        }
    })

    function clearSearch() {
        location.href = "{{ route('agreement.by.date') }}";
    }

    function dataValidate() {
        let agreements = {{ count($agreements) }};
        if (agreements != 0) {
            return true;
        } else {
            return false;
        }
    }
    btn_submit.addEventListener("click", (e) => {
        let form = document.getElementById("form");
        let formData = new FormData(form);
        formValidate(e, formData);
    })

    function formValidate(e, formData) {
        if (formData.get("date") == "") {
            e.preventDefault();
            alert("Favor de completar el formulario");
        }
    }
</script>
@endsection
