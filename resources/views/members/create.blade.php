@extends('layout')
@section('return-button')
<a name="" id="" class="btn btn-dark mb-2" href="{{ route('list_members') }}" role="button">
    <i class="fas fa-arrow-circle-left"></i>
</a>
@endsection
<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Cadastro de membros
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area genérica para cadastrar novos membros. 
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
   
<!-- FORMULARIO ALTERNATIVO -->

<form method="post">
    @csrf
        <div class="form">
            <div class="form-row">
                <!-- Nome da empresa -->
                <div class="form-group col-md-7">
                    <label for="name" >Nome do membro</label>
                    <input type="text" class="form-control" name="name" id="nome">
                </div>

                <!-- Melhor periodo de contato -->
                <div class="form-group col-md-5">
                    <label for="role">Cargo atual</label>
                    <select id="role" class="form-control">
                        <option value="Manha">Analista</option>
                        <option value="Tarde">Trainee</option>
                        <option value="Tarde">Presidente</option>
                        <option value="Noite">Diretor Comercial</option>
                        <option value="Noite">Diretor de Projetos</option>
                        <option value="Noite">Diretor de Marketing</option>
                        <option value="Noite">Diretor de G.P.</option>
                        <option value="Noite">Diretor ADM/FIN</option>
                    </select>
                </div>

            </div>
    
            <div class="form-row">
                <!-- Email principal -->
                <div class="form-group col-md-6">
                    <label for="email">Email principal:</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <!-- Email secundario-->
                <div class="form-group col-md-6">
                    <label for="secondaryEmail">Email alternativo:</label>
                    <input type="email" class="form-control" id="secondaryEmail">
                </div>
            </div>

            <div class="form-row">
                <!-- Telefone -->
                <div class="form-group col-md-5">
                    <label for="phone"> Telefone: </label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>

                <div class="form-group col-md-5">
                    <label for="secondaryPhone"> Telefone alternativo: </label>
                    <input type="text" class="form-control" name="secondaryPhone" id="secondaryPhone">
                </div>
                <!-- Estados Brasileiros -->
                <div class="form-group col-md-2">
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
            </div>
            

    
            <div class="form-row">
                <!-- Cidade -->
                <div class="col col-3">
                    <label for="city" >Cidade</label>
                    <input type="text" class="form-control" name="city" id="city">  
                </div>
                <!-- Endereco -->
                <div class="form-group col-md-6">
                    <label for="adress" >Endereço completo [Rua, Bairro, etc]</label>
                    <input type="text" class="form-control" name="adress" id="city">
                </div>
    
                <!-- CEP -->
                <div class="col col-3">
                    <label for="cep" >CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep">  
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