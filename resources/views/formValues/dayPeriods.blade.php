<?php
    $dayPeriods = [
        'Manha'=>'Manhã',
        'Tarde'=>'Tarde',
        'Noite'=>'Noite',
        'Indiferente'=>'Indiferente'        
    ];
    
if (empty($sector->clientContacts[$it]->bestHour)) {
    $stored = 'valor inexistente';
}else{
    $stored = $sector->clientContacts[$it]->bestHour;
}

?>
<label for="{{$bestHourVal}}">Melhor horario</label>
<select id="{{$bestHourVal}}" class="form-control" name="bestHour[]">
    @foreach ($dayPeriods as $value=>$valor)
        @if($stored == $value)
        <option value={{$value}} selected>{{$valor}}</option>
        @else
        <option value={{$value}}>{{$valor}}</option>
        @endif
    @endforeach
</select>