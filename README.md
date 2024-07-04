#  Verivox PHP Developer Challange
A service to read the tarrif from the Tariff Provider, do the calculations, and return the results.
Also a RESTful service to retrieve the results.

###  Requirements
 - PHP 8.2
 - Laravel 11.x
 - Docker

###  Setup  ###
 - Clone the project `git clone git@github.com:iumairish/verivox.git verivox`
 - `cd verivox` into the project directory
 - Run command `docker-compose up -d` to run the project

Once docker instalation and enviornment configuration completed, head to `http://127.0.0.1/`

 ### RestAPI Detail

 - Endpoint: 
 ```plaintext
 POST http://127.0.0.1/api/tarrif/compare
 ```
 - Request Body:
 ```javascript
{ 
    "consumption": 3500
}
```
 - Example Response:
```json
{
    "total": 2,
    "data": [
        {
            "name": "Product A",
            "annualCost": 950.0
        },
        {
            "name": "Product B",
            "annualCost": 800.0
        },
        ...
    ]
}
```


### Testing

Run Unit tests by running the comman, `php artisan test`