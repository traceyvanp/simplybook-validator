# Simplybook External Plugin Validator

You can validate bookings through the use of an external script. The script can check variables from the booking, and only if conditions are fulfilled, the booking is processed. Additionally the validation script can bring back the information that can be injected into intake form variables.

---

This script needs to verify that a booking can not be made if the value for the question **"Is anyone in your party under the age of 18?"** is "Yes".

Incoming data example:
```
{
    "service_id":"9",
    "provider_id":"45",
    "client_id":"8123",
    "start_datetime":"2021-01-11 11:40:00",
    "end_datetime":"2021-01-11 11:45:00",
    "count":1,
    "additional_fields":[
        {
            "id":"7008b1093d4364990ee9d7489967a0e3",
            "name":"Is anyone in your party under the age of 18?",
            "value":"Yes"
        }
    ]
}
```
---


Output data example (in case of successful validation):
```
{}
```

---

Output data example (in case of product sum being less than intake field value):
```
{
    "errors":["Please call us at ____ to book."]
}
```
