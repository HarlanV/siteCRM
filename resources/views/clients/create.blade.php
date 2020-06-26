@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
CADASTRO DE CLIENTE
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Cadastro de novos clientes e contatos
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')
<!-- Exibe erros capturados pelo $request->validate() -->

@include('subviews.responseError',['errors'=>$errors])
    
    <!-- Formulario Simples para adicionar membro -->
    @yield('formClient')

@endsection
<!-- FIM -->