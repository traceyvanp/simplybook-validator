<?php

include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';


$incomingData = json_decode(file_get_contents('php://input'),true);

print(json_encode($incomingData["client_id"]));

?>
