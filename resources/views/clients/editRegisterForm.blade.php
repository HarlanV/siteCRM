<?php 
if ($form == 'registers.addRegister' ){
    $extension = 'registers.form';
}else{
    $extension = 'clients.form';
}
?>
@extends($extension)
<!-- CONTEUDO PRINCIAL -->
@section('formcontact')
@csrf
<form method="POST" >
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

    <div id="contactData"
    style=
    "margin:10px -5px 10px -5px;
    padding:10px;
    border:1px solid #cecece"
    >
        
        <div class="form-row">

            <!-- Nome do Contato  -->
            <div class="form-group col-md-5">
            <label for="{{$correspondentVal}}" >Nome do correpondente</label>
            <input type="text" class="form-control" name="correspondent[]" id="{{$correspondentVal}}" value="{{$register->clientContacts[$it]->correspondent ??''}}">
            </div>
        </div>
        
        <div class="form-row">
            <!-- Telefone -->
            <div class="form-group col-md-5">
                <label for="{{$phoneVal}}"> Telefone : </label>                                                       
                <input type="text" class="form-control" name="phone[]" id="{{$phoneVal}}" value="{{$register->clientContacts[$it]->phone ??''}}">
            </div>

            <!-- Melhor periodo de contato -->
            <div class="form-group col-md-2">
                @include('formValues.dayPeriods')
            </div>
            <!-- Email -->
            <div class="form-group col-md-5">
                <label for="{{$emailVal}}">E-mail:</label>
                <input type="email" class="form-control" id="{{$emailVal}}" value="{{$register->clientContacts[$it]->email ??''}}" name="email[]">
            </div>
        </div>
    </div>

    <?php
        $contactsCounts--;
        $it++;
        }
        if (!empty($viewOnly) || $viewOnly){
        $editClient='hidden';
        
    }
    $it--;    
    ?>
@endsection

