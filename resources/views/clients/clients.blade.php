@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Clientes cadastrados

@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Lista de clientes atualmente cadastrados na base de dados

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibir mensagem da section apenas se existir mensagem -->
    @if(!empty($mensagem))
        <div class="alert alert-success">
        {{$mensagem}}
        </div>
    @endif

    <!-- Botão para adicionar -->
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('form_create_client') }}" role="button">Adicionar</a>

    <!--  Impressão da lista de cliente  -->
    <ul class="list-group">
        @foreach($clients as $client)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="client-name-{{ $client->id }}">{{ $client->name }} </span>

                <!-- Caixa de edição de cliente. Hidden por default -->
                <div class="input-group w-50" hidden id="input-client-name-{{ $client->id }}">
                    <input type="text" class="form-control" value="{{ $client->name }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editClient({{ $client->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
                
             <!-- Icones de cada cliente -->
                <span class="d-flex">

                    <!-- icon: listar clients ocultos-->
                    <button class="btn btn-info btn-sm mr-1" onclick="inputClient({{ $client->id }})">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- icon: listar contatos -->
                    <a href="/client/{{ $client->id }}/contacts" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>

                    <!-- icon: deletar clientes-->
                    <form method="POST" action="/client/{{$client->id}}"
                        onsubmit="return confirm('Tem certeza que deseja exlcuir o cliente {{ addslashes($client->nome)}} ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

    <script>
        /** 
         * Metodo para exibir area de edicao de membro
         * 
         *  
        */
        function inputClient (clientId){
            const nameOld = document.getElementById(`client-name-${clientId}`);
            const inputName = document.getElementById(`input-client-name-${clientId}`);

            if(nameOld.hasAttribute('hidden')){

                nameOld.removeAttribute("hidden");
                inputName.hidden = true;

            } else {
                nameOld.hidden = true;
                inputName.removeAttribute("hidden");

            }
        }

        function editClient(clientId)
            {
                let formData = new FormData();

                const name = document
                    .querySelector(`#input-client-name-${clientId} > input`)
                    .value;
                const token = document
                    .querySelector('input[name="_token"]')
                    .value;

                
                formData.append('name',name);
                formData.append('_token',token);
                const url = `/client/${clientId}/editName`;

                fetch(url, {
                    method: 'POST',
                    body:   formData
                }).then(() =>{
                    inputClient(clientId);
                    document.getElementById(`client-name-${clientId}`).textContent = name;
                } );
            }

    </script>

@endsection


