@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Empresas Cadastradas<br><br>
    </div>
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    {{-- @auth --}}
        <a href="{{ route('cadastrar_empresa') }}" class="btn btn-secondary mb-5">Adicionar</a>
    {{-- @auth --}}

    <ul class="list-group">

        <li class="list-group-item list-group-item-secondary d-flex align-items-center justify-content-between">
            <span><h5>Empresas</h5></span>
            <span><h5>Editar</h5></span>
        </li>
        
        @foreach ($empresas as $empresa)  
            <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <div>
                    <span class="me-2" id="nome-empresa-{{ $empresa->id }}"> {{ $empresa->nome; }} </span> 

                    <div class="input-group w-100 p-2" hidden id="input-nome-empresa-{{ $empresa->id }}">
                        <input type="text" class="form-control" value="{{ $empresa->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarEmpresa({{ $empresa->id }})">
                                <i class="far fa-check-square"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <span class="badge bg-secondary rounded-pill me-1" title="Quantidade de contratos desta Empresa">?</span>             
                </div>


                <div class="input-group w-50" hidden id="input-nome-empresa-{{ $empresa->id }}">
                    <input type="text" class="form-control" value="{{ $empresa->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarEmpresa({{ $empresa->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                
                <span class="d-flex">
                    <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $empresa->id }})">
                        <i class="fas fa-edit" title="Editar Nome"></i>
                    </button>
                    
                    <a href="/empresas/{{ $empresa->id }}/contratos" class="btn btn-info btn-sm me-1">
                        <i class="fas fa-external-link-alt" title="Ir para a página de contratos desta empresa"></i>
                    </a>

                    <form method="post" action="/empresas/{{ $empresa->id }}"
                        onsubmit="return confirm('Você deseja excluir a empresa {{ addSlashes($empresa->nome) }}?')">
                            @csrf
                            @method('DELETE')
                            
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt" title="Excluir Empresa"></i>
                            </button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>

<script>
    
    function toggleInput(empresaId) {
        const nomeEmpresaElement = document.getElementById("nome-empresa-" + empresaId);
        const inputEmpresaElement = document.getElementById("input-nome-empresa-" + empresaId);

        if (nomeEmpresaElement.hasAttribute('hidden')){
            nomeEmpresaElement.removeAttribute('hidden');
            inputEmpresaElement.hidden = true;
        }else{
            inputEmpresaElement.removeAttribute('hidden');
            nomeEmpresaElement.hidden = true;
        }
    }

    function editarEmpresa(empresaId) {
        let formData = new FormData();
        const nome = document.querySelector(`#input-nome-empresa-${empresaId} > input`).value;
        const token = document.querySelector(`input[name="_token"]`).value;

        formData.append('nome', nome);
        formData.append('_token', token);
        const url = `/empresas/${empresaId}/editaNome`;

        fetch(url, {
            method: 'POST',
            body: formData
        }).then( () => {
            toggleInput(empresaId);
            document.getElementById("nome-empresa-"+ empresaId).textContent = nome;
        });
    } 
    
</script>

@endsection