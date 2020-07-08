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
    
                    <!-- Area de atuação -->
                    <div class="form-group col-md-5">
                        <label for="market">Area(s) de atuação</label>
                        <input type="text" class="form-control" name="market" id="market" value="{{$client->market ??''}}">
                    </div>
                </div>
            </div>

            <!-- Container de contatos  --> 
            <div class="container-fluid" id= "contactContainer" style="border:1px solid #cecece;">
                <div class="d-flex justify-content-around">
                    <div class="form-group col-md-5">
                        <label for="sector">Setor de Contato</label>
                        <input type="text" class="form-control" name="sector" id="sector" value="{{$sector->sector ??''}}">
                    </div>
                </div>
                @include('clients.editSectorForm')
            </div>

             <!-- Botadão '+' para dicionar -->
            <input type="button"  {{$editClient ??''}} value="+" onClick="addInput('contactContainer');">
            @include('formValues.formScript')
            <div class="container-fluid mt-2" style="border:1px solid #cecece;">
                <div class="form-row" >

                    <!-- Estados Brasileiros -->
                    <div class="form-group col-md-3">
                        @include('formValues.states')
                    </div>
        
                    <!-- Cidade -->
                    <div class="col col-3">
                        <label for="city" >Cidade</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{$sector->city ??''}}">
                    </div>

                    <!-- Endereco -->
                    <div class="form-group col-md-6">
                    <label for="adress" >Endereço completo</label>
                    <input type="text" class="form-control" name="adress" id="adress" value="{{$sector->adress ??''}}">
                    </div>
                </div>

                     <!-- Comentários -->
                    <div class="form-group">
                        <label for="comment">Comentarios</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment" >{{$sector->comment ??''}}</textarea>
                    </div>
                </div>

        @if (empty($viewOnly) || !$viewOnly)
        <button class="btn btn-primary mt-2">SALVAR</button>
        @endif
        </div>          
</form>

