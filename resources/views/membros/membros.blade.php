@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Membros ativos (Pendente)
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Lista de membros atualmente cadastrados como em atividade
@endsection

<!-- Conteudo principal -->
    @section('conteudo')
    <!-- Botão esquerdo adicionar -->
    <a name="" id="" class="btn btn-dark mb-2" href="teste/create" role="button">Adicionar</a>

    <!--  Impressão da lista de membros  -->
    <ul class="list-group">
        <?php foreach ($members as $member): ?>
        <li class="list-group-item"><?=$member;?></li>
        <?php endforeach; ?>
    </ul>
    @endsection

<!-- FIM -->