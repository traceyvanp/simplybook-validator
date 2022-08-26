<?php


include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

echo "are you here?";
/*
$incomingData = file_get_contents('php://input');
$obj = json_decode($incomingData, true);
$childs = implode("", $obj);
echo $childs;
echo "are you here??"


//uncomment for local testing
//$incomingData = json_decode(file_get_contents('booking.json'),true);

/*
if($incomingData['service_id'] == "14"){
    echo json_encode(array());
} else {
    $validator = new ExternalValidator();
    $result = $validator->validate($incomingData);
    echo json_encode($result);
}
*/
?>
