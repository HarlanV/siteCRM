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

    @include('subviews.sectorForm')
    
<?php

    $contactsCounts--;
    $it++;
    }
    if (!empty($viewOnly) || $viewOnly){
    $editClient='hidden';
    
}
$it--;    
?>
