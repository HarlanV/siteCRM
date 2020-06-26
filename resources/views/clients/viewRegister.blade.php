@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Dados do cliente: {{$client->name ??''}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Exibição dos dados de contato da empresa {{$client->name}}

@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

  <!-- Formulario para adicionar membro -->  
  @yield('formClient')

@endsection