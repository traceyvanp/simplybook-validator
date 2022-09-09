# Simplybook External Plugin Validator

You can validate bookings through the use of an external script. The script can check variables from the booking, and only if conditions are fulfilled, the booking is processed. Additionally the validation script can bring back the information that can be injected into intake form variables.

---

This script needs to verify that the value for the id **"7008b1093d4364990ee9d7489967a0e3"** (intake form question id for number of hunters) under "additional_fields" is less than or equal to the total sum of products.

Incoming data example:
```
{
    "current_booking": {
        "id": null,
        "location_id": "1",
        "category_id": null,
        "service_id": "15",
        "provider_id": "1",
        "start_date": "2022-10-03",
        "start_time": "08:30:00",
        "end_date": null,
        "end_time": null,
        "code": null,
        "hash": null,
        "promo_code": null,
        "price_with_tax": null,
        "price_without_tax": null,
        "products": [
            {
                "id": "11",
                "qty": 1
            },
            {
                "id": "13",
                "qty": "2"
            }
        ],
        "count": "1",
        "additional_fields": {
            "7008b1093d4364990ee9d7489967a0e3": "4",
            "00c438e5d44942a5885f6526aedd53f2": "No",
            "d6a81f257114e020001509bcab18c7d3": true
        }
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
    "errors":["The number of hunt packages must be equal to or greater than the number of hunters in your party."]
}
```
