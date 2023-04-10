@extends('layouts.app')
<title>{{ config('app.name', 'Gestão | ACL') }}</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Controle de acesso
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>RECURSO</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles AS $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td class="d-flex">
                                        <a class="m-1 btn text-light btn-sm btn-success" href="{{route('role.edit', ['role' => $role->id])}}">Editar</a>
                                        <a class="m-1 btn text-light btn-sm btn-warning" href="">Perfis</a>
                                        <form class="m-1" action="{{route('role.destroy', ['role' => $role->id])}}"  method="post">
                                            @csrf
                                            @method('delete')
                                            <input class="text-light btn btn-sm btn-danger" type="submit" value="Remover">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                            <div class="d-flex justify-content-end align-items-center">
                                <a class="btn btn-success" href="{{route('role.create')}}">&plus; Cadastrar RECURSO</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
