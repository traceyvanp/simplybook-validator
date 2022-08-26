<?php


include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input/booking'), true);
/*
$childs = implode("", $incomingData);
echo $childs;
echo "are you here??"
*/

//uncomment for local testing
//$incomingData = json_decode(file_get_contents('booking.json'),true);

if(!$incomingData){
//if($incomingData['service_id'] == "14"){
    echo $incomingData;
    //echo json_encode(array());
} else {
    echo $incomingData;
/*
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
    */
}

?>
