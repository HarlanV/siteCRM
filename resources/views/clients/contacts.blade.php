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
    <!-- Exibir mensagem da section apenas se existir mensagem -->
    @if(!empty($mensagem))
        <div class="alert alert-success">
        {{$mensagem}}
        </div>
    @endif

<ul class="list-group">
    <li class="d-flex justify-content-end align-items-center">
        
        <a name="b2" id="b2" class="btn btn-warning mt-2" href="#">
            Relatorio [desativado]
        </a>
    </li>
    
</ul class="list-group">


<p>Lista de contatos disponiveis: <p>
    <!--  Impressão da lista de contatos do cliente  -->
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