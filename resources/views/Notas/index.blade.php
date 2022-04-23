@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Notas Fiscais Cadastradas<br><br>
    </div>
@endsection

@section('conteudo')
    
    @include('mensagem', ['mensagem' => $mensagem])

    <a href="{{ route('cadastrar_notas') }}" class="btn btn-secondary mb-5">Adicionar</a>

    <ul class="list-group">
        <li class="list-group-item list-group-item-secondary d-flex justify-content-between">
            <div class="container align-items-center justify-content-between">
                <div class="row row-cols-9">
                    <div class="col h5">Nota Fiscal</div>
                    <div class="col h5">Emissão</div>
                    <div class="col h5">Valor</div>
                    <div class="col h5">Competencia</div>
                    <div class="col h5">Empenho</div>
                    <div class="col h5">Empresa</div>
                    <div class="col h5">Secretaria</div>
                    <div class="col h5">Contrato</div>
                    <div class="col h5">Editar</div>
                </div>
            </div>
        </li>

        @foreach ($notas as $nota)        
        <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
            <div class="container">
                <div class="row row-cols-9">
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->numNota}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->emissao}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">R$ {{ $nota->valor}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->competencia}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->idEmpenho}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->idEmpresa}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->idSecretaria}}</div>
                    <div class="col justify-content-center" id="{{ $nota->id}}">{{ $nota->idContrato}}</div>
                </div>
            </div>

            <div class="input-group w-50" hidden id="input-numero-nota-{{ $nota->id }}">
                <input type="text" class="form-control" value="{{ $nota->numNota }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarNota({{ $nota->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            
            <span class="d-flex">
                <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $nota->id }})">
                    <i class="fas fa-edit" title="Editar Nota"></i>
                </button>
                
                <a href="/notas/{{ $nota->id }}/contratos" class="btn btn-info btn-sm me-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                <form method="post" action="/notas/{{ $nota->id }}"
                    onsubmit="return confirm('Você deseja excluir a Nota Fiscal nº {{ addSlashes($nota->numNota) }}?')">
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt" title="Excluir Nota"></i>
                        </button>
                </form>
            </span>


        </li>
        @endforeach

    </ul>

@endsection