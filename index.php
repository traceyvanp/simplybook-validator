<?php

file_put_contents('test.dat', file_get_contents('php://input'));
echo("This is a test.");

include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input'),true);
//$incomingData = $incomingData['current_booking'];
//echo $incomingData;
echo $incomingData['service_id'];

if(!$incomingData){
    echo json_encode(array());
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}

/*
//uncomment for local testing
$incomingData = json_decode(file_get_contents('booking.json'),true);
$incomingData = $incomingData['current_booking'];
if($incomingData['service_id'] === "14"){
    echo json_encode(array());
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}
*/

?>
