@extends('layout')

@section('return-button')

    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
@endsection
<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Cliente: {{$name}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Relação de  contatos conhecidos com a empresa {{$name}}
@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

<ul class="list-group">
    <li class="d-flex justify-content-end align-items-center">
        
        <a name="b2" id="b2" class="btn btn-warning mt-2" href="/">
            Relatorio
        </a>
    </li>
    
</ul class="list-group">


<p>Lista de contatos disponiveis: <p>
    <!--  Impressão da lista de contatos do cliente  -->
    <ul class="list-group">
        @foreach($contacts as $contact)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/client/{{ $clientId }}/addContact/">
                {{$contact->sector}} 
                </a>
             <!-- Icones de cada cliente -->
                <span class="d-flex">
                     <!-- icon: listar contatos -->
                    <a href="/client/{{ $clientId }}/edit/{{ $contact->id }}" class="btn btn-outline-primary btn-sm mr-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form method="POST" action="/client/{{$clientId}}"
                        onsubmit="return confirm('Tem certeza que deseja exlcuir o contato de  {{ addslashes($contact->sector)}} ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <!--
                    /@foreach($contact->phones as $phone)
                    Telefone = {{$phone->phone}}
                    @endforeach()
                    -->         
            </li>
        @endforeach
    </ul>
    <a name="" id="" class="btn btn-dark mt-2" href="" role="button">Adicionar novo contato</a>

@endsection