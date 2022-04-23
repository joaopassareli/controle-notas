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

            <li><h5>Adicionar nos badges:</h5></li>
            <ul>
                <li>Empresa: No badge deverá mostrar quantos contratos vigentes a Prefeitura possui com esta empresa.</li>
                <li>Secretaria: No badge deverá mostrar quantos contratos vigentes esta secretaria possui com todas as empresas cadastradas.</li>
                <li>Contrato: No botão de link, redirecionar para uma página que apresente todos os empenhos e Notas Fiscais geradas para este contrato.</li>
                <li>Empenho: No botão de link, redirecionar para uma página que apresente todas as Notas Fiscais geradas para este empenho.</li>
            </ul><br><br>
        </ul>
    </div>

@endsection