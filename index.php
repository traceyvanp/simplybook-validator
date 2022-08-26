<?php


include_once 'ExternalValidatorException.php';
include_once 'ExternalValidator.php';

$incomingData = json_decode(file_get_contents('php://input'), true);
/*
$childs = implode("", $incomingData);
echo $childs;
echo "are you here??"
*/
console_log($incomingData);

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

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
