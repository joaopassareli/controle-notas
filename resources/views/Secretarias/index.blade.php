@extends('layout')

@section('cabecalho')
    <div class="alert alert-secondary justify-content-center">
        <br>Secretarias<br><br>
    </div>
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    <a href="{{ route('cadastrar_secretarias') }}" class="btn btn-secondary mb-5">Adicionar</a>

    <ul class="list-group">

        <li class="list-group-item list-group-item-secondary d-flex align-items-center justify-content-between">
            <span><h5>Secretarias</h5></span>
            <span><h5>Editar</h5></span>
        </li>

        @foreach ($secretarias as $secretaria)
        <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
            <div>
                <span class="me-3" id="nome-secretaria-{{ $secretaria->id }}">{{ $secretaria->nome; }}</span>

                <div class="input-group w-500" hidden id="input-nome-secretaria-{{ $secretaria->id }}">
                    <input type="text" class="form-control" value="{{ $secretaria->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSecretaria({{ $secretaria->id }})">
                            <i class="far fa-check-square"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                {{-- Colocar no badge a quantidade de contratos pertencentes à secretaria --}}
                <span class="badge bg-secondary rounded-pill me-1">?</span> 
            </div>

            <span class="d-flex">
            
                <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $secretaria->id }})">
                    <i class="fas fa-edit"></i>
                </button>
            

                <a href="/secretarias/{{ $secretaria->id }}/temporadas" class="btn btn-info btn-sm me-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                <form method="post" action="/secretarias/{{ $secretaria->id }}"
                    onsubmit="return confirm('Você deseja excluir a secretaria {{ addSlashes($secretaria->nome) }}?')">
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                </form>
            </span>

        </li>
        @endforeach   
    </ul>

<script>

    function toggleInput(secretariaId) {
        const nomeSecretariaElement = document.getElementById("nome-secretaria-" + secretariaId);
        const inputSecretariaElement = document.getElementById("input-nome-secretaria-" + secretariaId);

        if (nomeSecretariaElement.hasAttribute('hidden')){
            nomeSecretariaElement.removeAttribute('hidden');
            inputSecretariaElement.hidden = true;
        }else{
            inputSecretariaElement.removeAttribute('hidden');
            nomeSecretariaElement.hidden = true;
        }
    }

    function editarSecretaria(secretariaId) {
        let formData = new FormData();
        const nome = document.querySelector(`#input-nome-secretaria-${secretariaId} > input`).value;
        const token = document.querySelector(`input[name="_token"]`).value;

        formData.append('nome', nome);
        formData.append('_token', token);
        const url = `/secretarias/${secretariaId}/editaNome`;

        fetch(url, {
            method: 'POST',
            body: formData
        }).then( () => {
            toggleInput(secretariaId);
            document.getElementById("nome-secretaria-"+ secretariaId).textContent = nome;
        });
    } 
    
</script>

@endsection