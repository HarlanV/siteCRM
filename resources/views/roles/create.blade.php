@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Novo cargo
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Cadastro de novo cargo interno
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibe erros capturados pelo $request->validate() -->
    @include('subviews.responseError',['errors'=>$errors])
    
    <!-- Formulario Simples para adicionar membro -->
    @yield('formRole')

@endsection
