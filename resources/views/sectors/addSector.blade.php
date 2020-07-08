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

  @include('sectors.form')

@endsection