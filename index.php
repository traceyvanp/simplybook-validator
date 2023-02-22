<?php

$incomingData = json_decode(file_get_contents('php://input'),true);


if(!$incomingData){
    echo json_encode(array());
} else {
    $arr = array('error' => array($incomingData['service_id']));
    echo json_encode($arr);
}
