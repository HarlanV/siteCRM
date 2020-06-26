@extends('layout')

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
    <!-- Exibir mensagem da section apenas se existir mensagem -->

    @include('subviews.responseMessage',['message'=>$mensagem])

    <p>Lista de contatos disponiveis: <p>
    <!--  Impressão da lista de registros do cliente  -->
    <ul class="list-group">
        @foreach($registers as $register)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <!--a href="/client/{{ $clientId }}/show_register/"-->
                {{$register->sector}} 
                <!--/a-->
             <!-- Icones de cada cliente -->
                <span class="d-flex">
                     <!-- icon: listar contatos -->
                    <a href="{{ route('edit_client_form', array('id'=>$clientId, 'id_contact'=>$register->id)) }}" class="btn btn-outline-primary btn-sm mr-1">
 
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form method="POST" action="{{ route('delete_register', array('id'=>$clientId,'register_Id'=>$register->id)) }}"
                        onsubmit="return confirm('Tem certeza que deseja exlcuir o registro  {{ addslashes($register->sector)}} ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    
                    </form>
            </li>
        @endforeach
    </ul>
    <a name="" id="" class="btn btn-dark mt-2" href=" {{ route('register_form', array('id'=>$clientId)) }}" role="button">Adicionar novo contato</a>

@endsection