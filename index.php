<?php

//$incomingData = json_decode(file_get_contents('php://input'),true);

$incomingData = json_decode('{
    "service_id":"17",
    "provider_id":"6",
    "client_id":"599",
    "start_datetime":"2023-02-25 13:00:00",
    "end_datetime":"2023-02-25 17:00:00",
    "count":1,
    "additional_fields":[
        {
            "id":"7008b1093d4364990ee9d7489967a0e3",
            "name":"How many hunters are in this group? (Note: four (4) hunters max are allowed per group. To book for more, please add another hunt. There must be at least as many packages booked as hunters, or booking will not be confirmed.)",
            "value":"1"
        },
        {
            "id":"00c438e5d44942a5885f6526aedd53f2",
            "name":"Do you have any hunters under the age of 14 in your group? If yes, please call us at 1-800-789-8524.",
            "value":"Yes"
        },
        {
            "id":"a7e5703711a9f2e254a57644bd67132bf",
            "name":"The hunt you have chosen is without guide and dogs. Please confirm that you have your own dogs and dont require a guide.",
            "value":"true"
        },
        {
            "id":"d6a81f257114e020001509bcab18c7d3",
            "name":"The hunt you have chosen is without guide and dogs. Please confirm that you have your own dogs and dont require a guide.",
            "value":"true"
        }
    ]
}',true);


if(!$incomingData){
    echo json_encode(array());
} else {
    echo '{"errors":["This is your customized error."]}';
}
