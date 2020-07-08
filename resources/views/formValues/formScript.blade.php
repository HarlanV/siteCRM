<?php 
$it = empty($contactsCounts) ? 1 : $contactsCounts; 
?>

<script>

    var counter = 0 + <?php echo "{$it}" ?> ;

    function addInput(divName){
            var html =`
            <div id="contactData">
                @include('clients.editSectorForm')
            </div>
            <input type="hidden" id="contador" name="contador" value=${(counter+1)}>`;

        document.getElementById(divName).innerHTML += html

        counter++;
        }
        
</script>
    