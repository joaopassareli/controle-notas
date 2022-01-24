@extends('layout')

@section('cabecalho')
Cadastrar Empresas
@endsection


@section('conteudo')

    @include('erros',['errors' => $errors])

    <form action="" method="post">
        @csrf

        <div class="row mt-5">
            <div class="col col-8">
                <label for="nome" class="mb-2">Nome da Empresa</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>

        <button class="btn btn-primary mt-3">Cadastrar</button>

    </form>

@endsection