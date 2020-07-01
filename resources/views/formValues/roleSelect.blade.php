<?php
 if (empty($member->role_id)) {
    $stored = 'valor inexistente';
}else{
    $stored = $member->role_id;                          

}

?>
<label for="id_role">Cargo atual</label>
<select id="id_role" class="form-control" name="id_role">
    @foreach ($roles as $value=>$valor)
        @if($stored == $value)
            <option value ="{{$valor->id}}" selected>
                {{$valor->roleName}}
            </option>
        @else()
            <option value="{{$valor->id}}">
                {{$valor->roleName}}
            </option>
        @endif
    @endforeach

</select>



        

