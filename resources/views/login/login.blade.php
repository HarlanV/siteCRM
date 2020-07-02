@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
LOGIN
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de acesso Restrita a usuarios cadastrados. Favor entrar com login e senha
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')
@include('subviews.responseError',['errors'=>$errors])

<form method="post">
    @csrf


    <div class="form-group">
        <label for="email">E-mail</label>
   <input type="email" name="email" id="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>

<a href="{{route('create_user')}}" class="btn btn-secondary mt-3">
        Registrar-se
    </a>
</form>
@endsection