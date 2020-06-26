@extends($form)

@section('formClient')
<form method="POST">
    @csrf
        <div class="form">
            <!-- CONTAINER DE REPETIÇÃO  --> 
            <div class="d-flex justify-content-around">
                <div class="form-group col-md-5">
                    <label for="sector">Setor de Contato</label>
                    <input type="text" class="form-control" name="sector" id="sector" value="{{$register->sector ??''}}">
                </div>
            </div>
            <div class="container-fluid" id= "contactContainer" style="border:1px solid #cecece;">
               
                    @yield('formcontact')
            </div>
            <input type="button"  {{$addClient ??''}} value="+" onClick="addInput('contactContainer');">

            <div class="container-fluid mt-2" style="border:1px solid #cecece;">
                <div class="form-row" >
                    <!-- Estados Brasileiros -->
                    <div class="form-group col-md-3">
                        @include('formValues.states')
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
                        <textarea class="form-control" id="comment" rows="3" name="comment" >{{$register->comment ??''}}</textarea>
                    </div>
                </div>
        <button class="btn btn-primary mt-2">SALVAR</button>
        </div>          
</form>

<script>

var counter = 0 + <?php echo "{$it}" ?>;
var limit = 3;
function addInput(divName){
    if (counter == limit)  {
        alert("Você atingiu o limite de  " + (counter+1) + " contatos.");
    }  

    else {
        var html =`
        <div id="contactData">
            @yield('formcontact')
        </div>
        <input type="hidden" id="contador" name="contador" value=${(counter+1)}>`;
    document.getElementById(divName).innerHTML += html
    counter++;
        }
}
</script>
        
@endsection
<!-- FIM -->
