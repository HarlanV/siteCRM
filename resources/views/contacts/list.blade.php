@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')

    Dados cadastrais da empresa {{$name}}

@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')

    Dados cadastrais da empresa {{$name}}
    Cadastro dos clientes desesjado

@endsection

<!-- CCONTEUDO PRINCIAL -->
@section('conteudo')

<!-- Botão para adicionar -->
  <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">RETORNAR</a>

    <!--  Impressão da lista de contatos do cliente  -->
    <ul class="list-group">
        @foreach($sectors as $sector)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Setor/Nome de contato: {{$sector->sector}}
             <!-- Icones de cada cliente -->
                <span class="d-flex">
                    @foreach($sector->phones as $phone)
                    Telefone = {{$phone->phone}}
                    @endforeach()
            </li>
        @endforeach
    </ul>
@endsection