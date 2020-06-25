<!-- Exibir mensagem da section apenas se existir mensagem -->
@if(!empty($message))
    <div class="alert alert-success">
    {{$message}}
    </div>
@endif