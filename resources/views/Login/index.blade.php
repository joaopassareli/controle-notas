@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Login <br><br>
    </div>
@endsection

@section('conteudo')
    
    {{-- Mensagem de erro caso o login não seja realizado. --}}
    {{-- @include('erros', ['errors' => $errors]) --}}


    <form method="post">
        @csrf

        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="usuario" name="usuario" id="usuario" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        {{-- <button type="submit" class="btn btn-primary mt-3">Entrar</button> --}}
        <a href="/empresas" class="btn btn-primary mt-3">Entrar</a>

        <a href="/registrar" class="btn btn-secondary mt-3">Registrar-se</a>
    </form>

@endsection