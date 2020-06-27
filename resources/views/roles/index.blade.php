@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Cargos Internos

@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Gerenciamento de cargos internos e autorizações

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
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('form_create_role') }}" role="button">Adicionar</a>

    <!--  Impressão da lista de membros  -->
    <ul class="list-group">
       

        @foreach($roles as $role)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="client-name-{{ $role->id }}">{{ $role->roleName }} 
            </span>
            
            <span class="d-flex">

                
                @auth
                <!-- icon: deletar cargo-->   
                <form method="POST" action="{{ route('delete_role', array('id'=>$role->id)) }}"
                    onsubmit="return confirm('Tem certeza que deseja exlcuir o cargo {{ addslashes($role->roleName)}} ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                @endauth

            </span>


        </li>
    @endforeach



    </ul>
@endsection