<?php

$incomingData = json_decode(file_get_contents('php://input'),true);
$incomingData = 1


if(!$incomingData){
    echo json_encode(array());
} else {
    echo '{"errors":["This is your customized error."]}';
}
