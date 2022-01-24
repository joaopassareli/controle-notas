@extends('layout')

@section('cabecalho')
Cadastrar Nota Fiscal
@endsection


@section('conteudo')

    @include('erros',['errors' => $errors])

    <form action="" method="post">
        @csrf

        <div class="row mt-5">
            <div class="col col-2">
                <label for="numNota" class="mb-2">Nº da Nota Fiscal</label>
                <input type="text" class="form-control" name="numNota" id="numNota">

                <label for="emissao" class="mt-2 mb-2">Data de Emissão</label>
                <input type="date" class="form-control" name="emissao" id="emissao">

                <label for="valor" class="mt-2 mb-2">Valor da Nota</label>
                <input type="text" class="form-control" name="valor" id="valor" placeholder="R$">
                
                <label for="competencia" class="mt-2 mb-2">Competência</label>
                <input type="text" class="form-control" name="competencia" id="competencia" placeholder="mês/ano">
            </div>

            <div class="row">
                <div class="col col-5">
                    <label for="idEmpresa" class="mt-2 mb-2">Empresa</label>
                    <input type="text" class="form-control" name="idEmpresa" id="idEmpresa">

                    <label for="idSecretaria" class="mt-2 mb-2">Secretaria</label>
                    <input type="text" class="form-control" name="idSecretaria" id="idSecretaria">

                    <label for="idContrato" class="mt-2 mb-2">Contrato</label>
                    <input type="text" class="form-control" name="idContrato" id="idContrato">
                </div>
            </div>

            <div class="row">
                <div class="col col-2">
                    <label for="idEmpenho" class="mt-2 mb-2">Empenho</label>
                    <input type="text" class="form-control" name="idEmpenho" id="idEmpenho">
                </div>
            </div>
            
        </div>

        <button class="btn btn-primary mt-3">Cadastrar</button>

    </form>

@endsection