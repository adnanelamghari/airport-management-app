# Airport managment app

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites
  * [Composer](https://getcomposer.org)
  * [PHP 7.2.* ](http://php.net/downloads.php) or higher
  * [MySQL](https://www.mysql.com/fr/)
  * [NPM](https://www.npmjs.com/get-npm)

### Installing

* Run those commands on terminal:
	```
	composer install
	```
	```
	npm install
	```
* Open MySQL console or PhpMyadmin and create a database with the name "airport"
* Create the database schema
1. Open the project in your IDE
2. Go to terminal and run:
	```
	php bin/console make:migration
	```
	```
	php bin/console doctrine:migrations:migate
	```
5. The database schema will be created automaticaly when you run the project.


## Running the project

To run the project:
	```
	php bin/console server:run
	```
On the browser: http://127.0.0.1:8000    

### Login page
![login](https://user-images.githubusercontent.com/31404363/46182834-dc968d00-c2c5-11e8-83f0-254d7e55d059.PNG)

### Register page
![register](https://user-images.githubusercontent.com/31404363/46182840-dd2f2380-c2c5-11e8-8737-99ad229cf199.PNG)

### Current user's flights


### Flights list page (for Admin role)
![capture2](https://user-images.githubusercontent.com/31404363/47156423-05b3a780-d2df-11e8-8ca7-002cd4fb30d5.PNG)

### New Flight
![capture3](https://user-images.githubusercontent.com/31404363/47156426-05b3a780-d2df-11e8-8830-109931a702d2.PNG)

### Flight page
in progress..
### Airplanes list page (for Admin role)
![capture](https://user-images.githubusercontent.com/31404363/47156429-05b3a780-d2df-11e8-8d34-8c0ecbf5a8b1.PNG)




## Authors

* **Adnane Lamghari** [LinkedIn](https://www.linkedin.com/in/adnane-lamghari/)









