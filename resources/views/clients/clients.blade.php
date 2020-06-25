@extends('layout')
<!-- Botão de retorno -->
@section('return-button')
<p></p>
@endsection

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Clientes cadastrados
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Lista de clientes atualmente cadastrados na base de dados
@endsection


<!-- Conteudo principal -->
@section('conteudo')

@include('subviews.responseMessage',['message'=>$mensagem])
 
    <!-- Botão para adicionar -->
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('form_create_client') }}" role="button">ADICIONAR</a>
    
    <!--  Impressão da lista de cliente  -->
    <ul class="list-group">
        @foreach($clients as $client)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="client-name-{{ $client->id }}">{{ $client->name }} </span>

             <!-- Icones de cada cliente -->
                <span class="d-flex">

                    <!-- icon: listar contatos -->                   
                    <a href="{{ route('list_registers', array('id'=>$client->id))}}" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>

                    <!-- icon: deletar clientes-->   
                    <form method="POST" action="{{ route('delete_client', array('id'=>$client->id)) }}"
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
@endsection


