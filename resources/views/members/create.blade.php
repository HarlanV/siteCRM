@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Cadastro de membros ou clientes (pendente)
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area genérica para cadastrar novos membros ou novos clientes. 
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
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_members') }}" role="button">RETORNAR</a>
    <!-- Formulario Simples para adicionar membro -->
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <button class="btn btn-primary">SALVAR</button>
    </form>

    @endsection
<!-- FIM -->