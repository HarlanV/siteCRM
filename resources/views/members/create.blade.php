@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    CADASTRO DE MEMBROS
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Formulario de cadastro completo de novos membros.
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
   
<!-- formulario com dados de membros -->
    @include('members.form')
    
@endsection
