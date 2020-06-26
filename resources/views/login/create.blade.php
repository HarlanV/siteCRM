@extends('layout')

<!-- Botao para retornar -->
@section('return-button')  
<p></p>
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

@include('subviews.responseError',['errors'=>$errors])

<form method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Salvar
    </button>
</form>
@endsection