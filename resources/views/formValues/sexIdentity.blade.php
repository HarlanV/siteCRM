<?php
    $sexIds = [
        "HC"=>'Homem',
        "MC"=>'Mulher',
        "NB"=>'Não Binário',
    ];
 if (empty($register->sexId)) {
    $stored = 'valor inexistente';
}else{
    $stored = $register->sexId;
}
?>

<label for="sexId">Sexo: </label>
<select id="sexId" class="form-control" value="{{$register->sexId ??''}}" name="sexId">

    @foreach ($sexIds as $sex=>$sexId)
    @if($stored == $sexId)
        <option value={{$sex}} selected>
            {{$sexId}}
        </option>
    @else()
    <option value={{$sex}}>
        {{$sexId}}
    </option>
    @endif
    @endforeach

</select>