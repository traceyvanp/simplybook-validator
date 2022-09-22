<?php

include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input'),true);
//uncomment below for local testing
//$incomingData = json_decode(file_get_contents('booking.json'),true);

//temp test
if($incomingData['service_id'] === "14"){
    echo json_encode(array("error" => "this works"));
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}


?>
