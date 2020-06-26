@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Edição dados de cliente: {{$client->name ??''}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Dados de contato da empresa {{$client->name}}

@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

  <!-- Formulario para adicionar membro -->  
  @yield('formClient')

@endsection