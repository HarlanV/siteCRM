@extends('layout')

@section('return-button')

    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
@endsection
<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Cliente: {{$name}}
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Relação de possiveis contatos conhecidos com a empresa {{$name}}
@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')
<p>Lista de contatos disponiveis: <p>
    <!--  Impressão da lista de contatos do cliente  -->
    <ul class="list-group">
        @foreach($sectors as $sector)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="# ">
                {{$sector->sector}} 
                </a>
             <!-- Icones de cada cliente -->
                <span class="d-flex">
                    [status aqui. Pendente]
                    <!--
                    @foreach($sector->phones as $phone)
                    Telefone = {{$phone->phone}}
                    @endforeach()
                    -->
            </li>
        @endforeach
    </ul>
    <a name="" id="" class="btn btn-dark mt-2" href="" role="button">Adicionar novo contato</a>
@endsection