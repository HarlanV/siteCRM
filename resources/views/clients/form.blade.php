@extends($form)

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
                            <label for="sector">Setor de atuação</label>
                            <input type="text" class="form-control" name="sector" id="sector" value="{{$register->sector ??''}}">
                        </div>
                    </div>
                </div>

            <!-- CONTAINER DE REPETIÇÃO  --> 
            <div class="container-fluid" id= "contactContainer" style="border:1px solid #cecece;">
                    @yield('formcontact')
            </div>
                <input type="button"  {{$addClient ??''}} value="+" onClick="addInput('contactContainer');">

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
                        <label for="comment">Comentarios</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment" >{{$client->comment ??''}}</textarea>
                    </div>
            </div>
        <button class="btn btn-primary mt-2">SALVAR</button>          
    </form>

    <script>

        var counter = 0;
        var limit = 3;
        function addInput(divName){
                if (counter == limit)  {
                    alert("Você atingiu o limite de  " + (counter+1) + " contatos.");
                }  
        
                else {
                    var html =`
                    <div id="contactData">
        
                        <div class="form-row">
                            <!-- Nome do Contato ${(counter+1)} -->
                            <div class="form-group col-md-5">
                                <label for="correspondent${(counter+1)}" >Nome do contato</label>
                            <input type="text" class="form-control" name="correspondent${(counter+1)}" id="correspondent${(counter+1)}" value="">
                            </div>
                        </div>
        
                        <div class="form-row">
                            <!-- Telefone ${(counter+1)} -->
                            <div class="form-group col-md-5">
                                <label for="phone${(counter+1)}"> Telefone : </label>                                                       
                                <input type="text" class="form-control" name="phone${(counter+1)}" id="phone${(counter+1)}" value=" ">
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
                                <input type="email" class="form-control" id="email${(counter+1)}" name="email${(counter+1)}" value="" >
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="contador" name="contador" value=${(counter+1)}>
        `;
                document.getElementById(divName).innerHTML += html
                counter++;
                    }
                }
        </script>
        
@endsection
<!-- FIM -->
