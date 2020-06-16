@extends('layout')

@section('return-button')
    <!-- Botao para retornar -->
    <a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_clients') }}" role="button">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
@endsection

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
CADASTRO DE CLIENTE
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Cadastro e Alteração de dados cadastrais
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
    <div class="form">
        <div class="form-row">
            <!-- Nome da empresa -->
            <div class="form-group col-md-7">
                <label for="name" >Nome da empresa</label>
                <input type="text" class="form-control" name="name" id="nome">
            </div>
            <!-- Nome da contato -->
            <div class="form-group col-md-5">
                <label for="sector">Setor ou Nome para contato</label>
                <input type="text" class="form-control" name="sector" id="sector">
            </div>
        </div>

        <div class="form-row">
            <!-- Telefone -->
            <div class="form-group col-md-5">
                <label for="phone"> Telefone: </label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <!-- Melhor periodo de contato -->
            <div class="form-group col-md-2">
                <label for="bestTime">Melhor horario</label>
                <select id="bestTime" class="form-control">
                    <option value="Manha">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Tarde">Indiferente</option>
                </select>
                </div>
            <!-- Email -->
            <div class="form-group col-md-5">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="Email">
            </div>
        </div>

        <div class="form-row">
            <!-- Estados Brasileiros -->
            <div class="form-group col-md-3">
                <label for="state">Estado</label>
                <select id="state" class="form-control">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                </select>
            </div>

            <!-- Cidade -->
            <div class="col col-3">
                <label for="city" >Cidade</label>
                <input type="text" class="form-control" name="city" id="city">
                
            </div>
            <!-- Endereco -->
            <div class="form-group col-md-6">
            <label for="adress" >Endereço completo</label>
            <input type="text" class="form-control" name="adress" id="city">
        </div>

            </div>
            <div class="form-group">
                <label for="clientCommit">Comentarios</label>
                <textarea class="form-control" id="clientCommit" rows="3"></textarea>
            </div>
    <button class="btn btn-primary mt-2">SALVAR</button>
</form>
@endsection
<!-- FIM -->