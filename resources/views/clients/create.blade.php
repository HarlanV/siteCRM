@extends('layout')

@section('return-button')
    <!-- Botao para retornar -->
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
@endsection

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
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    
    <!-- Formulario Simples para adicionar membro -->
    @yield('formClient')

@endsection
<!-- FIM -->