@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
NOVO ACESSO
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Cadastro de novo usuario autorizado
@endsection
<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

@include('subviews.responseError',['errors'=>$errors])

<form method="post">
    @csrf

    <div class="form-group">
        <label for="id">Membro</label>
        <select id="id" class="form-control" name="id">
            @foreach ($members as $member)
                <option value ="{{$member->id}}"> {{$member->name}} </option>
            @endforeach()
        </select>
    </div >

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Salvar
    </button>
</form>

@endsection