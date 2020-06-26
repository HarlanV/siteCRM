@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
PAGINA PRINCIPAL 
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de acesso principal aos gerenciamentos.
@endsection

<!-- CONTEUDO PRINCIAL -->
    @section('conteudo')

    <a name="" id="" class="btn btn-dark mb-2" href="{{route('list_members')}}" role="button">Gerenciar Membros</a>
    <a name="" id="" class="btn btn-dark mb-2" href="{{route('list_clients')}}" role="button">Gerenciar Clientes</a>
    
@endsection
