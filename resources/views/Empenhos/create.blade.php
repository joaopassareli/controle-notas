@extends('layout')

@section('cabecalho')
Cadastrar Empenhos
@endsection


@section('conteudo')

    @include('erros',['errors' => $errors])

    <form action="" method="post">
        @csrf

        <div class="container">
            <div class="col col-2">
                <label for="numEmpenho" class="mb-2 mt-3">Número do Empenho <font color="red">*</font></label>
                <input type="text" class="form-control" name="numEmpenho" id="numEmpenho">

                <label for="anoEmpenho" class="mb-2 mt-2">Ano do Empenho <font color="red">*</font></label>
                <input type="text" class="form-control" name="anoEmpenho" id="anoEmpenho">

                <label for="emissao" class="mb-2 mt-2">Data de Emissão <font color="red">*</font></label>
                <input type="date" class="form-control" name="emissao" id="emissao">

                <label for="saldo" class="mb-2 mt-2">Saldo Total do Empenho <font color="red">*</font></label>
                <input type="saldo" class="form-control" name="saldo" id="saldo" placeholder="R$ 123,45">
            </div>

            <div>
                <div class="col col-6">
                    <label for="idEmpresa" class="mb-2 mt-2">Empresa<font color="red">*</font></label>
                    <select class="form-control" name="idEmpresa" id="idEmpresa">
                        <option selected>Selecione uma Empresa</option>
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id}}"> {{ $empresa->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-6">
                    <label for="idSecretaria" class="mb-2 mt-2">Secretaria<font color="red">*</font></label>
                    <select class="form-control" name="idSecretaria" id="idSecretaria">
                        <option selected>Selecione uma Secretaria</option>
                        @foreach ($secretarias as $secretaria)
                            <option value="{{ $secretaria->id }}"> {{ $secretaria->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-6">
                    <label for="idContrato" class="mb-2 mt-2">Contrato<font color="red">*</font></label>
                    <select class="form-control" name="idContrato" id="idContrato">
                        <option selected>Selecione um Contrato</option>
                        @foreach ($contratos as $contrato)
                            <option value="{{ $contrato->id }}"> {{ $contrato->numContrato }} </option>
                        @endforeach
                    </select>
                </div>
                
            </div>
        </div> 

        <button class="btn btn-primary mt-3">Cadastrar</button>

    </form>

@endsection