<?php

include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input'),true);
//uncomment below for local testing
//$incomingData = json_decode(file_get_contents('booking.json'),true);
print("Hello Tracey");
print_r($incomingData);

//the service is lodging (id 14) then don't run the validation
if($incomingData['service_id'] === '14'){
    echo json_encode(array());
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}


?>
