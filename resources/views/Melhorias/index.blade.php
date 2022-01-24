@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>MELHORIAS A FAZER<br><br>
    </div>
@endsection

@section('conteudo')

    <div class="container mt-5">
        <ul>
            <li><h5>Adicionar no cadastro de Contratos as seguintes opções:</h5></li>
                <ul>
                    <font color='green'>
                    <li>Campo Empresa: Na Datalist de Empresa desenvolver uma funcionalidade para buscar as empresas já cadastradas no Banco.</li>
                    <li>Campo Secretaria: Na Datalist de Secretaria desenvolver uma funcionalidade para buscar as secretarias já cadastradas no Banco.
                    </font>
                    </li>
                </ul><br><br>
                
            <li><h5>Adicionar no cadastro de Empenhos as seguintes opções:</h5></li>
                <ul>
                    <font color='green'>
                    <li>Campo Empresa: Na Datalist de Empresa desenvolver uma funcionalidade para buscar as empresas já cadastradas no Banco.</li>
                    <li>Campo Secretaria: Na Datalist de Secretaria desenvolver uma funcionalidade para buscar as secretarias já cadastradas no Banco.</li>
                    <li>Campo Contrato: Na Datalist de Contratos desenvolver uma funcionalidade para buscar os contratos já cadastradas no Banco.</li>
                    </font>
                </ul><br><br>

            <li><h5>Adicionar no cadastro de Notas Fiscais as seguintes opções:</h5></li>
                <ul>
                    <font color='green'>
                    <li>Campo Empresa: Na Datalist de Empresa desenvolver uma funcionalidade para buscar as empresas já cadastradas no Banco.</li>
                    <li>Campo Secretaria: Na Datalist de Secretaria desenvolver uma funcionalidade para buscar as secretarias já cadastradas no Banco.</li>
                    <li>Campo Contrato: Na Datalist de Contratos desenvolver uma funcionalidade para buscar os contratos já cadastradas no Banco.</li>
                    <li>Campo Empenho: Na Datalist de Empenhos desenvolver uma funcionalidade para buscar os empenhos já cadastradas no Banco.</li>
                    </font>
                </ul><br><br>
        </ul>
    </div>

    
    {{-- <div class="container">
        <label for="datalist" class="form-label">Teste Datalist</label>
        <input type="form-control" list="datalistOptions" id="datalist">
        <datalist id="datalistOptions">
            <option value="Teste 1">
            <option value="Teste 2">
            <option value="Teste 3">
            <option value="Abcd">
            <option value="Abcde">   
            <option value="abcde">
        </datalist>
    </div> --}}

@endsection