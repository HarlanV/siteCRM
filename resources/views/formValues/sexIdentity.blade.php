<?php
    $sexIds = [
        "HC"=>'Masculino',
        "MC"=>'Feminino',
        "NB"=>'Não Binário',
    ];
 if (empty($member->sexId)) {
    $stored = 'valor inexistente';
}else{
    $stored = $member->sexId;
}

?>

<label for="sexId">Sexo: </label>
<select id="sexId" class="form-control" name="sexId">

    @foreach ($sexIds as $value=>$valor)
        @if($stored == $value)
            <option value ="{{$value}}" selected>
                {{$valor}}
            </option>
        @else()
            <option value="{{$value}}">
                {{$valor}}
            </option>
        @endif
    @endforeach

</select>


