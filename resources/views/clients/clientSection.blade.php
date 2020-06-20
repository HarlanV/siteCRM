@extends('clients.form')

<!-- CONTEUDO PRINCIAL -->
@section('formcontact')
@csrf
<form method="POST">

    <?php


        if (empty($contactsCounts)){
        $contactsCounts=1;
    }
        $it = 0;

        while($contactsCounts>=1){
        $correspondentVal = 'correspondent'.$it;
        $emailVal = 'email'.$it;
        $phoneVal = 'phone'.$it;
        $emailVal = 'email'.$it;
        $sectorVal= 'sector'.$it;
        $bestHourVal = 'bestHour'.$it;

    ?>

    <div id="contactData">
        
        <div class="form-row">

            <!-- Nome do Contato  -->
            <div class="form-group col-md-5">
            <label for="{{$correspondentVal}}" >Nome do correpondente</label>
            <input type="text" class="form-control" name="{{$correspondentVal}}" id="{{$correspondentVal}}" value="{{$register->clientContacts[$it]->correspondent ??''}}">
            </div>
        </div>
        
        <div class="form-row">
            <!-- Telefone -->
            <div class="form-group col-md-5">
                <label for="{{$phoneVal}}"> Telefone : </label>                                                       
                <input type="text" class="form-control" name="{{$phoneVal}}" id="{{$phoneVal}}" value="{{$register->clientContacts[$it]->phone ??''}}">
            </div>

            <!-- Melhor periodo de contato -->
            <!-- AINDA NÃO Auto-PREENCHIDO COM VALOR CORRETO [pendente!] -->
            <!-- IDEIA: Mudar para checkbox -->
            <div class="form-group col-md-2">
                <label for="{{$bestHourVal}}">Melhor horario</label>
                <select id="{{$bestHourVal}}" class="form-control" name="{{$emailVal}}">
                    <option value="Manha">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Tarde">Indiferente</option>
                </select>
                </div>
            <!-- Email -->
            <div class="form-group col-md-5">
                <label for="{{$emailVal}}">E-mail:</label>
                <input type="email" class="form-control" id="{{$emailVal}}" value="{{$register->clientContacts[$it]->email ??''}}" name="{{$emailVal}}">
            </div>
        </div>
    </div>
    <?php
        $contactsCounts--;
        $it++;
        }
        if (!empty($viewOnly) || $viewOnly){
        $addClient='hidden';
    }
      
    ?>
@endsection
<!-- FIM -->
