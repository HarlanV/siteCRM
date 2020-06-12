@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Membros ativos (Pendente)

@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Lista de membros atualmente cadastrados como em atividade

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
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('form_create_member') }}" role="button">Adicionar</a>

    <!--  Impressão da lista de membros  -->
    <ul class="list-group">
        @foreach($members as $member)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$member->nome}}

             <!-- Botão Deletar  -->
            <form method="POST" action="/membro/{{$member->id}}"
                onsubmit="return confirm('Tem certeza que deseja exlcuir o membro {{ addslashes($member->nome)}} ?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection