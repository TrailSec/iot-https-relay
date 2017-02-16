# IoT HTTPS Relay
An API that acts as a relay for IoT devices that do not support HTTPS i.e. you can use HTTPS APIs using HTTP

**Warning! Please be sure to understand the security issues of using this relay app and use at your own risk.**

## How to relay my HTTP requests over to firebase?

To relay a request to your firebase's realtime database:

1. Construct a **POST** request to http://iot-https-relay-firebase.appspot.com/firebase/DatabaseService
2. Set content type as **application/x-www-form-urlencoded** (see table below for POST parameters to include)
3. Send the request & you're done!
4. Still stuck? Import this [collection](https://github.com/tohjustin/iot-https-relay/blob/master/postman-tests.json) on [Postman](https://www.getpostman.com/) & see how the POST requests are being constructed

| POST parameters 	| Description                                                                                                                                	|
|-----------------	|--------------------------------------------------------------------------------------------------------------------------------------------	|
| url             	| Firebase database to relay request to (eg. "https://[YOUR-PROJECT-ID].firebaseio.com/")                                                                                                 	|
| path            	| Path to resource  (eg. Passing in "/geolocation" means that you want to relay your request to "https://[YOUR-PROJECT-ID].firebaseio.com/geolocation") 	|
| method          	| Pass in any of the following methods: **"GET" / "PUT" / "POST" / "PATCH" / "DELETE"**                                                                                                           	|
| data            	| JSON String data to include in your relayed request  (Exclude this parameter for **GET** or **DELETE** requests)     	|
| token           	| Authentication Token  (Exclude this parameter if your database doesn't require auth)                      	|
