@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Cadastro

@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Cadastro dos clientes desesjado

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')
    <!--  Impressão da lista de cliente  -->
    <ul class="list-group">
        @foreach($sectors as $sector)
            <li>
                Setor de contato: {{$sector->sector}}
             <!-- Icones de cada cliente -->
                <span class="d-flex">
                  
            </li>
        @endforeach
    </ul>
@endsection