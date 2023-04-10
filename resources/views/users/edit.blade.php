@extends('layouts.app')
<title>{{ config('app.name', 'Editar | ACL') }}</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">Dashboard</div>

                    <div class="card-body">
                        <a class="text-success" href="{{route('user.index')}}">&leftarrow; Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{route('user.update', ['user' => $user->id])}}" method="post" class="mt-4"
                              autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o RECURSO"
                                       name="name" value="{{ old('name') ?? $user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Alterar nome"
                                       name="email" value="{{ old('email') ?? $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password" placeholder="Alterar senha"
                                       name="password" value="{{ old('password')}}">
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
