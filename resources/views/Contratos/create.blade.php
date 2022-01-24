@extends('layout')

@section('cabecalho')
Cadastrar Contratos
@endsection


@section('conteudo')

    @include('erros',['errors' => $errors])

    <form action="" method="post">
        @csrf

        <div class="form-group row mt-2">
            <div class="col col-2">
                <label for="numContrato" class="mb-2 mt-Life Serviços">Número do Contrato <font color="red">*</font></label>
                <input type="text" class="form-control" name="numContrato" id="numContrato" placeholder="CST-1234/2022">
            </div>

            <div class="row">
                <div class="form-group col col-8">
                    <label for="objeto" class="mb-2 mt-Life Serviços">Objeto <font color="red">*</font></label>
                    <textarea class="form-control" name="objeto" id="objeto" rows="4"></textarea>
                </div>
            </div>

            <div class=" select form-group col col-5">
                <label for="idEmpresa" class="mb-2 mt-Life Serviços">Empresa <font color="red">*</font></label>
                <select class="form-control" name="idEmpresa" id="idEmpresa" onclick="listarEmpresas()">
                    <option selected>Selecione uma Empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}"> {{$empresa->nome }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col col-5">
                <label for="idSecretaria" class="mb-2 mt-Life Serviços">Secretaria <font color="red">*</font></label>
                <select class="form-control" name="idSecretaria" id="idSecretaria"">
                    <option selected>Selecione uma Secretaria</option>
                    @foreach ($secretarias as $secretaria)
                        <option value="{{ $secretaria->id }}"> {{ $secretaria->nome}} </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="form-group col col-2">
                    <label for="valor" class="mb-2 mt-Life Serviços">Valor do Contrato <font color="red">*</font></label>
                    <input type="number" class="form-control" name="valor" id="valor" placeholder="R$">
                </div>

                <div class="form-group col col-2">
                    <label for="vencimento" class="mb-2 mt-Life Serviços">Vencimento do Contrato <font color="red">*</font></label>
                    <input type="date" class="form-control" name="vencimento" id="vencimento">
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Cadastrar</button>

    </form>

@endsection