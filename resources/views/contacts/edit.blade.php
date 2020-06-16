@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Cliente: {{$name}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Dados de contato da empresa {{$name}}

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

<!-- Botão para adicionar -->
  <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">RETORNAR</a>

ZONA DE EDIÇÃO DE CONTATOS DE UM CLIENTE
@endsection