@extends($form)

@section('formMember')

<form method="post">
@csrf
    <div class="form">
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- Nome do membro -->
                <div class="form-group col-md-7">
                    <label for="name" >Nome Social do membro</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$member->name ??''}}" >
                </div>

                <!-- Cargo Atual -->
                <div class="form-group col-md-5">
                   @include('formValues.roleSelect')
                </div>
            </div>
        </div>

        INFORMAÇÕES PESSOAIS
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- RG do membro -->
                <div class="form-group col-md-5">
                    <label for="rg"> Documento de Identidade: </label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{$documents->rg ??''}}">
                </div>                                                               

                <!-- Orgão emissor do RG -->
                <div class="form-group col-md-2">
                    <label for="rgEntity"> Emissor: </label>
                    <input type="text" class="form-control" id="rgEntity" name="rgEntity" value="{{$documents->rgEntity ??''}}" >
                </div>

                <!-- CPF do Membro-->
                <div class="form-group col-md-5">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$documents->cpf ??''}}">
                </div>

            </div>

            <div class="form-row">

                <!-- Nome no Documento -->
                <div class="form-group col-md-7">
                    <label for="documentName" > Nome Completo </label>
                    <input type="text" class="form-control" name="documentName" id="documentName" value="{{$documents->name ??''}}">
                </div>

                <!-- Data de Nascimento -->
                <div class="form-group col-md-3">
                    <label for="birthdate"> Data de Nascimento </label>
                    <input type="text" class="form-control" name="birthdate" id="birthdate" value="{{$documents->birthdate ??''}}">
                </div>

                <!-- Sexo -->
                <div class="form-group col-md-2">
                    @include('formValues.sexIdentity' )
                </div>

            </div>
        </div>

        INFORMAÇÕES DE CONTATO
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- Email principal -->
                <div class="form-group col-md-6">
                    <label for="email">Email principal:</label>
                    <input type="email" class="form-control" id="email" name="email[]" value="{{$contacts->primaryEmail ??''}}">
                </div>

                <!-- Email secundario-->
                <div class="form-group col-md-6">
                    <label for="secondaryEmail">Email alternativo:</label>
                    <input type="email" class="form-control" id="secondaryEmail" name ="email[]" value="{{$contacts->secondaryEmail ??''}}">
                </div>
            </div>

            <div class="form-row">

                <!-- Telefone -->
                <div class="form-group col-md-6">
                    <label for="phone"> Telefone: </label>
                    <input type="text" class="form-control" name="phone[]" id="phone" value= "{{$contacts->primaryPhone ??''}}">
                </div>

                 <!-- Telefone Secundário -->
                <div class="form-group col-md-6">
                    <label for="secondaryPhone"> Telefone alternativo: </label>
                    <input type="text" class="form-control" name="phone[]" id="secondaryPhone" value="{{$contacts->secondaryPhone ??''}}">
                </div>

            </div>
        
            <div class="form-row">

                <!-- Estados Brasileiros -->
                <div class="form-group col-md-3">
                    @include('formValues.states')
                </div>

                <!-- Cidade -->
                <div class="col col-6">
                    <label for="city" >Cidade</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{$contacts->city ??''}}" >  
                </div>

                <!-- CEP -->
                <div class="col col-3">
                    <label for="cep" >CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" value="{{$contacts->cep ??''}}" >  
                </div>

                <!-- Endereco -->
                <div class="form-group col-md-12">
                    <label for="adress" >Endereço completo [Rua, Bairro, etc]</label>
                    <input type="text" class="form-control" name="adress" id="adress" value="{{$contacts->adress ??''}}" >
                </div>
            </div>
        </div>

        HISTORICO DO MEMBRO
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- Inicio do Trainee -->
                <div class="form-group col-md-3">
                    <label for="traineeStart">Inicio do Trainee</label>
                    <input type="text" class="form-control" id="traineeStart" name="traineeStart" value="{{$documents->traineeStart ??''}}" >
                </div>

                <!-- Fim do Trainee -->
                <div class="form-group col-md-3">
                    <label for="traineeFinish">Fim do Trainee</label>
                    <input type="text" class="form-control" id="traineeFinish" name="traineeFinish" value="{{$documents->traineeFinish ??''}}" >
                </div>

                <!-- Efetivação -->
                <div class="form-group col-md-3">
                    <label for="effectivated">Efetivação</label>
                    <input type="text" class="form-control" id="effectivated" name="effectivated" value="{{$documents->effectivated ??''}}">
                </div>

                <!-- Desligamento -->
                <div class="form-group col-md-3">
                    <label for="disconected">Desligamento</label>
                    <input type="text" class="form-control" id="disconected" name="disconected" value="{{$documents->disconected ??''}}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="comment">Comentarios</label>
            <textarea class="form-control" id="comment" rows="3" name="comment">{{$member->comment ??''}}</textarea>
        </div>

    @if (empty($viewOnly) || !$viewOnly)
    <button class="btn btn-primary mt-2">SALVAR</button>
    @endif

    </form>
        
@endsection

