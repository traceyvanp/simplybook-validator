<?php


include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input/booking'),true);
$incomingData = $incomingData['current_booking'];

/*
//uncomment for local testing
$incomingData = json_decode(file_get_contents('booking.json'),true);
$incomingData = $incomingData['current_booking'];
*/

if($incomingData['service_id'] === "14"){
    echo json_encode(array());
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}

?>
