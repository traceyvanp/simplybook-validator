<?php

include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input'),true);
//uncomment below for local testing
//$incomingData = json_decode(file_get_contents('booking.json'),true);
$booking = $incomingData['booking'];

//the service is lodging (id 14) then don't run the validation
if($incomingData['service_id'] === '14'){
    echo json_encode(array('error' => 'this works'));
} elseif($booking['service_id'] === '14'){
    echo json_encode(array('error' => 'actually this works'));
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}


?>
