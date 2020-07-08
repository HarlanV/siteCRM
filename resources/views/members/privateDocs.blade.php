<?php 



?>
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