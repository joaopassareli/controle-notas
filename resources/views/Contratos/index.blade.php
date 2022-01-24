@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Contratos Cadastrados<br><br>
    </div>
@endsection

@section('conteudo')
    
    @include('mensagem', ['mensagem' => $mensagem])

    <a href="{{ route('cadastrar_contratos') }}" class="btn btn-secondary mb-5">Adicionar</a>

    <ul class="list-group">
        <li class="list-group-item list-group-item-secondary d-flex justify-content-between">
            <div class="container align-items-center justify-content-between">
                <div class="row row-cols-7 ">
                    <div class="col h5">Contratos</div>
                    <div class="col h5 ms-5">Objeto</div>
                    <div class="col h5 ms-4">Empresa</div>
                    <div class="col h5 ms-5">Secretaria</div>
                    <div class="col h5 ms-5">Valor</div>
                    <div class="col h5">Vencimento</div>
                    <div class="col h5">Editar</div>
                </div>
            </div>
        </li>
        
        @foreach ($contratos as $contrato)  
            <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between align-self-center">             
                <div class="container">
                    <div class="row row-cols-7">
                        <div class="col justify-content-center" id="numero-contrato-{{ $contrato->id }}">{{ $contrato->numContrato; }}</div>            
                        <div class="col justify-content-center" id="objeto-contrato-{{ $contrato->id }}">{{$contrato->objeto }}</div>
                        <div class="col justify-content-center" id="empresa-contrato-{{ $contrato->id }}">{{ $contrato->idEmpresa}}</div>
                        <div class="col justify-content-center" id="secretaria-contrato-{{ $contrato->id }}">{{ $contrato->idSecretaria}}</div>
                        <div class="col justify-content-center" id="valor-contrato-{{ $contrato->id }}">R$ {{ $contrato->valor}}</div>
                        <div class="col justify-content-center" id="vencimento-contrato-{{ $contrato->id }}">{{ $contrato->vencimento}}</div>
                    </div>
                </div>


                <div class="input-group w-50" hidden id="input-nome-contrato-{{ $contrato->id }}">
                    <input type="text" class="form-control" value="{{ $contrato->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarcontrato({{ $contrato->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                
                <span class="d-flex">
                    <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $contrato->id }})">
                        <i class="fas fa-edit" title="Editar Nome"></i>
                    </button>
                    
                    <a href="/contratos/{{ $contrato->id }}/contratos" class="btn btn-info btn-sm me-1">
                        <i class="fas fa-external-link-alt" title="Ir para a página de contratos desta contrato"></i>
                    </a>

                    <form method="post" action="/contratos/{{ $contrato->id }}"
                        onsubmit="return confirm('Você deseja excluir a contrato {{ addSlashes($contrato->numContrato) }}?')">
                            @csrf
                            @method('DELETE')
                            
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt" title="Excluir contrato"></i>
                            </button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>

@endsection