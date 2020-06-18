
@extends($form)

<!-- CONTEUDO PRINCIAL -->
@section('formClient')

<form method="POST">
    @csrf
<!--{{($mycounter = 1)}}-->
        <div class="form">
            <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row" >
                <!-- Nome da empresa -->
                <div class="form-group col-md-7">
                    <label for="name" >Nome da empresa</label>
                <input type="text" class="form-control" name="name" id="nome" value="{{$client->name ??''}}">
                </div>
  

                <!-- Nome do Setor -->
                <div class="form-group col-md-5">
                    <label for="sector">Setor de atuação</label>
                    <input type="text" class="form-control" name="sector" id="sector" value="{{$register->sector ??''}}">
                </div>
            </div>
        </div>
        <!-- CONTAINER DE REPETIÇÃO  -->                
        <!-- Ciclo de repetição dos contatos -->
        <div class="container-fluid" id= "contactContainer" style="border:1px solid #cecece;">
                @yield('contactContainer')
        </div>

        <input type="button" value="+" onClick="addInput('contactContainer');">

        <div class="container-fluid mt-2" style="border:1px solid #cecece;">
            <div class="form-row" >
                <!-- Estados Brasileiros -->
                <div class="form-group col-md-3">
                    <label for="state">Estado</label>
                    <select id="state" class="form-control" value="{{$register->state ??''}}" name="state">
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
                    <input type="text" class="form-control" name="city" id="city" value="{{$register->city ??''}}">
                </div>
                <!-- Endereco -->
                <div class="form-group col-md-6">
                <label for="adress" >Endereço completo</label>
                <input type="text" class="form-control" name="adress" id="adress" value="{{$register->adress ??''}}">
                </div>
    
            </div>
                <div class="form-group">
                    <label for="clientCommit">Comentarios</label>
                    <textarea class="form-control" id="clientCommit" rows="3" name="clientCommit" >{{$contact->clientCommmit ??''}}</textarea>
                </div>
        </div>
        
                <button class="btn btn-primary mt-2">SALVAR</button>
                
    </form>
@endsection
<!-- FIM -->
