@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Controle de Pagamentos das Notas Fiscais<br><br>
    </div>
@endsection

@section('conteudo')
    <div style="overflow: auto">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary d-flex justify-content-between">
                <div class="container align-items-center justify-content-between">
                    <div class="row row-cols-7 ">
                        <div class="col h5">Empresa</div>
                        <div class="col h5 ms-5">Secretaria</div>
                        <div class="col h5 ms-4">Contrato</div>
                        <div class="col h5 ms-5">Empenho</div>
                        <div class="col h5 ms-5">Competência</div>
                        <div class="col h5">Vencimento</div>
                        <div class="col h5">Editar</div>
                    </div>
                </div>
            </li>
    </div>
@endsection