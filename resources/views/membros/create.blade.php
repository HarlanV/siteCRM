@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Cadastro de membros ou clientes (pendente)
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area genérica para cadastrar novos membros ou novos clientes. 
@endsection

<!-- Conteudo principal -->
    @section('conteudo')
    <!-- Formulario Simples para adicionar membro -->
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>

    @endsection
<!-- FIM -->