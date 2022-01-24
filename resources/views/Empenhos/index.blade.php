@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Empenhos Cadastrados<br><br>
    </div>
@endsection

@section('conteudo')
        
    @include('mensagem', ['mensagem' => $mensagem])

    <a href="{{ route('cadastrar_empenhos') }}" class="btn btn-secondary mb-5">Adicionar</a>

    <ul class="list-group">
        <li class="list-group-item list-group-item-secondary d-flex justify-content-between">
            <div class="container align-items-center justify-content-between">
                <div class="row row-cols-7">
                    <div class="col h5">Empenhos</div>
                    <div class="col h5 ms-4">Ano</div>
                    <div class="col h5 ms-4">Emissão</div>
                    <div class="col h5 ms-3">Saldo</div>
                    <div class="col h5">Empresa</div>
                    <div class="col h5">Secretaria</div>
                    <div class="col h5">Contrato</div>
                    <div class="col h5">Editar</div>
                </div>
            </div>
        </li>

        @foreach ($empenhos as $empenho)  
            <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between align-self-center">             
                <div class="container">
                    <div class="row row-cols-8">
                        <div class="col justify-content-center" id="numero-empenho-{{ $empenho->id }}">{{ $empenho->numEmpenho; }}</div>            
                        <div class="col justify-content-center" id="ano-empenho-{{ $empenho->id }}">{{$empenho->anoEmpenho }}</div>
                        <div class="col justify-content-center" id="emissao-empenho-{{ $empenho->id }}">{{ $empenho->emissao}}</div>
                        <div class="col justify-content-center" id="saldo-empenho-{{ $empenho->id }}">{{ $empenho->saldo}}</div>
                        <div class="col justify-content-center" id="empresa-empenho-{{ $empenho->id }}">{{ $empenho->idEmpresa}}</div>
                        <div class="col justify-content-center" id="secretaria-empenho-{{ $empenho->id }}">{{ $empenho->idSecretaria}}</div>
                        <div class="col justify-content-center" id="contrato-empenho-{{ $empenho->id }}">{{ $empenho->idContrato}}</div>
                    </div>
                </div>


                <div class="input-group w-50" hidden id="input-nome-empenho-{{ $empenho->id }}">
                    <input type="text" class="form-control" value="{{ $empenho->numEmpenho }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarempenho({{ $empenho->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                
                <span class="d-flex">
                    <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $empenho->id }})">
                        <i class="fas fa-edit" title="Editar Nome"></i>
                    </button>
                    
                    <a href="/empenhos/{{ $empenho->id }}/notas" class="btn btn-info btn-sm me-1">
                        <i class="fas fa-external-link-alt" title="Ir para a página de notas pagas com este empenho"></i>
                    </a>

                    <form method="post" action="/empenhos/{{ $empenho->id }}"
                        onsubmit="return confirm('Você deseja excluir o empenho {{ addSlashes($empenho->numEmpenho) }}/{{addSlashes($empenho->anoEmpenho)}}?')">
                            @csrf
                            @method('DELETE')
                            
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt" title="Excluir empenho"></i>
                            </button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>

@endsection