@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a class="text-success" href="{{route('user.index')}}">&leftarrow; Voltar para a listagem</a>

{{--                        @if($errors)--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <div class="alert alert-danger mt-4" role="alert">--}}
{{--                                    {{ $error }}--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}

                        <form action="{{route('user.store')}}" method="post" class="mt-4" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o RECURSO"
                                       name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Insira o RECURSO"
                                       name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Senha:</label>
                                <input type="password" class="form-control" id="password" placeholder="Insira o RECURSO"
                                       name="password" value="{{ old('password') }}">
                            </div>

                            <button type="submit" class="mt-2 btn btn-block btn-success">Cadastrar Novo RECURSO</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
