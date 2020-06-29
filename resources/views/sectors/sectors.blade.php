@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Cliente: {{$name}}
    
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Relação de  contatos conhecidos com a empresa {{$name}}
$sector

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibir mensagem da section apenas se existir mensagem -->
    @include('subviews.responseMessage',['message'=>$mensagem])

    <p>Lista de contatos disponiveis: <p>

    <!--  Impressão da lista de registros do cliente  -->
    <ul class="list-group">
        @foreach($sectors as $sector)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('view_sector', array('id'=>$clientId, 'id_contact'=>$sector->id)) }}">
                {{$sector->sector}} 
                </a>
            @auth
             <!-- Icones de cada cliente -->
                <span class="d-flex">

                     <!-- icon: editar registro -->
                    <a href="{{ route('edit_sector_form', array('id'=>$clientId, 'id_sector'=>$sector->id)) }}" class="btn btn-outline-primary btn-sm mr-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    
                    <!-- icon: deletar registro -->
                    <form method="POST" action="{{ route('delete_sector', array('id'=>$clientId,'id_sector'=>$sector->id)) }}"
                        onsubmit="return confirm('Tem certeza que deseja exlcuir o registro  {{ addslashes($sector->sector)}} ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    
                </span>
            @endauth
            </li>
        @endforeach
    </ul>
    @auth
    <a name="" id="" class="btn btn-dark mt-2" href=" {{ route('sector_form', array('id'=>$clientId)) }}" role="button">Adicionar novo contato</a>
    @endauth
@endsection