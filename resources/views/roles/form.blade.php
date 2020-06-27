@extends($form)

@section('formRole')

<form method="POST">
@csrf
    <div class="form">
        <div class="form-row" >
            
            <!-- Nome da empresa -->
            <div class="form-group col-md-7">
                <label for="roleName" >Titulo do cargo</label>
            <input type="text" class="form-control" name="roleName" id="roleName" value="{{$role->roleName ??''}}">
            </div>

        </div>

        Marque abaixo quais os poderes que este cargo terá no site:
        <div class="container-fluid mb-2" style="border:1px solid #cecece;">
            
            @include('formValues.checkboxRole',[
                'option'=>'director',
                'question'=>'O usuario possui cargo de diretoria.'
            ])

            @include('formValues.checkboxRole',[
                'option'=>'viewClient',
                'question'=>'O usuario pode visualizar a lista de clientes.'
            ])

            @include('formValues.checkboxRole',[
                'option'=>'editClient',
                'question'=>'O usuario pode EDITAR a lista de clientes.'
            ])

            @include('formValues.checkboxRole',[
                'option'=>'viewMember',
                'question'=>'O usuario pode visualizar a lista membros.'
            ])

            @include('formValues.checkboxRole',[
                'option'=>'editMember',
                'question'=>'O usuario pode EDITAR a lista de membros.'
            ])

            @include('formValues.checkboxRole',[
                'option'=>'createLogin',
                'question'=>'O usuario pode cadastrar outros usuarios e delegar poderes.'
            ])        
        </div>

        <!-- Salvar  --> 
        @if (empty($viewOnly) || !$viewOnly)
        <button class="btn btn-primary mt-2">SALVAR</button>
        @endif

    </div>          
</form>

        
@endsection

