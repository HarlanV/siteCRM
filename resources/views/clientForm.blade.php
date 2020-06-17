

@extends($form)

<!-- CONTEUDO PRINCIAL -->
@section('formClient')

<form method="POST">
    @csrf
    
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
                    <label for="sector">Area/Setor</label>
                    <input type="text" class="form-control" name="sector" id="sector" value="{{$contact->sector ??''}}">
                </div>
            </div>
        </div>
        
        <div class="container-fluid" id= "contactContainer" style="border:1px solid #cecece;">
            <div id="contactData">
                <div class="form-row">
                    <!-- Nome do Contato -->
                    <div class="form-group col-md-5">
                        <label for="correspondent1" >Nome do contato</label>
                    <input type="text" class="form-control" name="correspondent1" id="correspondent1" value="{{$client->name ??''}}">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Telefone -->
                    <div class="form-group col-md-5">
                        <label for="phone1"> Telefone: </label>
                        <input type="text" class="form-control" name="phone1" id="phone1" value="{{$phone->phone ??''}}">
                    </div>
        
                    <!-- Melhor periodo de contato -->
                    <div class="form-group col-md-2">
                        <label for="bestHour1">Melhor horario</label>
                        <select id="bestHour1" class="form-control" name="bestHour1">
                            <option value="Manha">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                            <option value="Tarde">Indiferente</option>
                        </select>
                        </div>
                    <!-- Email -->
                    <div class="form-group col-md-5">
                        <label for="email'">E-mail:</label>
                        <input type="email'" class="form-control" id="email1" value="{{$contact->email ??''}}">
                    </div>
                </div>
            </div>
        </div>
        <input type="button" value="+" onClick="addInput('contactContainer');">

        <div class="container-fluid mt-2" style="border:1px solid #cecece;">
            <div class="form-row" >
                <!-- Estados Brasileiros -->
                <div class="form-group col-md-3">
                    <label for="state">Estado</label>
                    <select id="state" class="form-control" value="{{$contact->state ??''}}">
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
                    <input type="text" class="form-control" name="city" id="city" value="{{$contact->city ??''}}">
                    
                </div>
                <!-- Endereco -->
                <div class="form-group col-md-6">
                <label for="adress" >Endereço completo</label>
                <input type="text" class="form-control" name="adress" id="adress" value="{{$contact->adress ??''}}">
                </div>
    
            </div>
                <div class="form-group">
                    <label for="clientCommit">Comentarios</label>
                    <textarea class="form-control" id="clientCommit" rows="3" >{{$contact->clientCommmit ??''}}</textarea>
                </div>
        </div>

        <button class="btn btn-primary mt-2">SALVAR</button>
    </form>
@endsection
<!-- FIM -->
<script>
    
var counter = 1;
var limit = 3;
function addInput(divName){
        if (counter == limit)  {
          alert("Você atingiu o limite de  " + counter + " contatos.");
        }  
        else {
            var html =`
            <div id="contactData">
                <div class="form-row">
                    <!-- Nome do Contato ${(counter+1)} -->
                    <div class="form-group col-md-5">
                        <label for="correspondent${(counter+1)}" >Nome do contato</label>
                    <input type="text" class="form-control" name="correspondent${(counter+1)}" id="correspondent${(counter+1)}" value="{{$client->name ??''}}">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Telefone ${(counter+1)} -->
                    <div class="form-group col-md-5">
                        <label for="phone${(counter+1)}"> Telefone : </label>
                        <input type="text" class="form-control" name="phone${(counter+1)}" id="phone${(counter+1)}" value="{{$phone->phone ??''}}">
                    </div>
        
                    <!-- Melhor periodo de contato ${(counter+1)} -->
                    <div class="form-group col-md-2">
                        <label for="bestHour${(counter+1)}">Melhor horario</label>
                        <select id="bestHour${(counter+1)}" class="form-control" name="bestHour">
                            <option value="Manha">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                            <option value="Tarde">Indiferente</option>
                        </select>
                        </div>
                    <!-- Email -->
                    <div class="form-group col-md-5">
                        <label for="email${(counter+1)}">E-mail:</label>
                        <input type="email" class="form-control" id="email${(counter+1)}" value="{{$contact->email ??''}}" name="email${(counter+1)}">
                    </div>
                </div>
            </div>`;
        document.getElementById(divName).innerHTML += html
        counter++;
         }
     }
</script>