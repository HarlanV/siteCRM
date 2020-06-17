@extends('layout')

@section('return-button')
<a name="" id="" class="btn btn-dark mb-2" href="/client/{{ $client->id }}/contacts" role="button">
  <i class="fas fa-arrow-circle-left"></i>
</a>
@endsection

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Edição Cliente: {{$client->name ??''}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Dados de contato da empresa {{$client->name}}

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

<!-- Botão para adicionar -->

  <!-- Formulario Simples para adicionar membro -->  
  @yield('formClient')

@endsection