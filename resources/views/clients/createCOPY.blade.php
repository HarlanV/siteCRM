@extends('layout')

@section('return-button')
    <!-- Botao para retornar -->
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
@endsection

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
                <label for="sector">Setor ou Nome para contato</label>
                <input type="text" class="form-control" name="sector" id="sector">
            </div>

            <div class="col col-3">
                <label for="phone" >Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

        </div>
        <button class="btn btn-primary mt-2">SALVAR</button>
    </form>

@endsection
<!-- FIM -->