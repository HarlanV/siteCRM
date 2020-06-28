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
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <!-- Cargo Atual -->
                <div class="form-group col-md-5">
                    <label for="id_role">Cargo atual</label>
                    <select id="id_role" class="form-control" name="id_role">
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->roleName}}</option>                            
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        INFORMAÇÕES PESSOAIS
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- RG do membro -->
                <div class="form-group col-md-5">
                    <label for="rg"> Documento de Identidade: </label>
                    <input type="text" class="form-control" id="rg" name="rg">
                </div>

                <!-- Orgão emissor do RG -->
                <div class="form-group col-md-2">
                    <label for="emissor"> Emissor: </label>
                    <input type="text" class="form-control" id="emissor" name="emissor">
                </div>

                <!-- CPF do Membro-->
                <div class="form-group col-md-5">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                </div>

            </div>

            <div class="form-row">

                <!-- Nome no Documento -->
                <div class="form-group col-md-7">
                    <label for="documentName" > Nome Completo </label>
                    <input type="text" class="form-control" name="documentName" id="documentName">
                </div>

                <!-- Data de Nascimento -->
                <div class="form-group col-md-2">
                    <label for="birthdate"> Data de Nascimento </label>
                    <input type="text" class="form-control" name="birthdate" id="birthdate">
                </div>

                <!-- Sexo -->
                <div class="form-group col-md-3">
                    @include('formValues.sexIdentity')
                </div>

            </div>
        </div>

        INFORMAÇÕES DE CONTATO
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- Email principal -->
                <div class="form-group col-md-6">
                    <label for="email">Email principal:</label>
                    <input type="email" class="form-control" id="email" name="email[]">
                </div>

                <!-- Email secundario-->
                <div class="form-group col-md-6">
                    <label for="secondaryEmail">Email alternativo:</label>
                    <input type="email" class="form-control" id="secondaryEmail" name ="email[]">
                </div>
            </div>

            <div class="form-row">

                <!-- DDD 1 -->
                <div class="form-group col-md-1">
                    <label for="ddd1"> DDD: </label>
                    <input type="text" class="form-control" name="ddd[]" id="ddd1">
                </div>

                <!-- Telefone -->
                <div class="form-group col-md-5">
                    <label for="phone"> Telefone: </label>
                    <input type="text" class="form-control" name="phone[]" id="phone">
                </div>

                <!-- DDD 2 -->
                <div class="form-group col-md-1">
                    <label for="ddd2"> DDD: </label>
                    <input type="text" class="form-control" name="ddd[]" id="ddd2">
                </div>   

                 <!-- Telefone Secundário -->
                <div class="form-group col-md-5">
                    <label for="secondaryPhone"> Telefone alternativo: </label>
                    <input type="text" class="form-control" name="phone[]" id="secondaryPhone">
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
                    <input type="text" class="form-control" name="city" id="city">  
                </div>

                <!-- CEP -->
                <div class="col col-3">
                    <label for="cep" >CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep">  
                </div>

                <!-- Endereco -->
                <div class="form-group col-md-12">
                    <label for="adress" >Endereço completo [Rua, Bairro, etc]</label>
                    <input type="text" class="form-control" name="adress" id="adress">
                </div>
            </div>
        </div>

        HISTORICO DO MEMBRO
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            <div class="form-row">

                <!-- Inicio do Trainee -->
                <div class="form-group col-md-3">
                    <label for="traineeStart">Inicio do Trainee</label>
                    <input type="text" class="form-control" id="traineeStart" name="traineeStart">
                </div>

                <!-- Fim do Trainee -->
                <div class="form-group col-md-3">
                    <label for="traineeFinish">Fim do Trainee</label>
                    <input type="text" class="form-control" id="traineeFinish" name="traineeFinish">
                </div>

                <!-- Efetivação -->
                <div class="form-group col-md-3">
                    <label for="effectivated">Efetivação</label>
                    <input type="text" class="form-control" id="effectivated" name="effectivated">
                </div>

                <!-- Desligamento -->
                <div class="form-group col-md-3">
                    <label for="disconected">Desligamento</label>
                    <input type="text" class="form-control" id="disconected" name="disconected">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="clientCommit">Comentarios</label>
            <textarea class="form-control" id="clientCommit" rows="3"></textarea>
        </div>

    @if (empty($viewOnly) || !$viewOnly)
    <button class="btn btn-primary mt-2">SALVAR</button>
    @endif

    </form>
        
@endsection

