@extends('layouts.app')
<title>{{ config('app.name', 'Editar | ACL') }}</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">Dashboard</div>

                    <div class="card-body">
                        <a class="text-success" href="{{route('role.index')}}">&leftarrow; Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{route('role.update', ['role' => $role->id])}}" method="post" class="mt-4"
                              autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o RECURSO"
                                       name="name" value="{{ old('name') ?? $role->name}}">
                            </div>


                            <div class="d-flex justify-content-end align-items-center">
                                <button type="submit" class="mt-2 btn btn-block btn-success">Editar RECURSO</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        {{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
