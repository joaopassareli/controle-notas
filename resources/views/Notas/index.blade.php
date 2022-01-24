@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Notas Fiscais Cadastradas<br><br>
    </div>
@endsection

@section('conteudo')

    <a href="{{ route('cadastrar_notas') }}" class="btn btn-secondary mb-5">Adicionar</a>

@endsection