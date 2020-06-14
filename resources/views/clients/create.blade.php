@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Cadastro de novos clientes
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de cadastro de novos clientes na base de dados
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
    <form method="post">
        @csrf

        <div class="row">
            <div class="col col-6">
                <label for="name" >Nome da empresa</label>
                <input type="text" class="form-control" name="name" id="nome">
            </div>

            <div class="col col-3">
                <label for="setor_contato">Setor ou Nome para contato</label>
                <input type="text" class="form-control" name="setor_contato" id="setor_contato">
            </div>

            <div class="col col-3">
                <label for="telefone" >Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone">
            </div>

        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>

    @endsection
<!-- FIM -->