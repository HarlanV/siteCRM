<?php
    $estados = [
        "AC"=>'Acre',
        "AL"=>'Alagoas',
        "AP"=>'Amapá',
        "AM"=>'Amazonas',
        "BA"=>'Bahia',
        "CE"=>'Ceará',
        "DF"=>'Distrito Federal',
        "ES"=>'Espírito Santo',
        "GO"=>'Goiás',
        "MA"=>'Maranhão',
        "MT"=>'Mato Grosso',
        "MS"=>'Mato Grosso do Sul',
        "MG"=>'Minas Gerais',
        "PA"=>'Pará',
        "PB"=>'Paraíba',
        "PR"=>'Paraná',
        "PE"=>'Pernambuco',
        "PI"=>'Piauí',
        "RJ"=>'Rio de Janeiro',
        "RN"=>'Rio Grande do Norte',
        "RS"=>'Rio Grande do Sul',
        "RO"=>'Rondônia',
        "RR"=>'Roraima',
        "SC"=>'Santa Catarina',
        "SP"=>'São Paulo',
        "SE"=>'Sergipe',
        "TO"=>'Tocantins',
        "EX"=>'Estrangeiro'
    ];
 if (empty($sector->state)) {
    $stored = 'valor inexistente';
}else{
    $stored = $sector->state;
}
?>

<label for="state">Estado</label>
<select id="state" class="form-control" value="{{$sector->state ??''}}" name="state">

    @foreach ($estados as $st=>$state)
    @if($stored == $st)
        <option value={{$st}} selected>
            {{$state}}
        </option>
    @else()
    <option value={{$st}}>
        {{$state}}
    </option>
    @endif
    @endforeach

</select>