# rental-car

## Overview

This is a car rental website project. The project allows users to browse available cars, make reservations, and manage their bookings. The website is built using HTML, CSS, JavaScript, PHP, and MySQL.

## Features

- **User Authentication:** Users can register, log in, and log out.
- **Car Listings:** Users can browse a list of available cars.
- **Reservations:** Users can make reservations by selecting a car, and return location (under developement).
- **User Dashboard:** Users can view and manage their reservations (under developement).
- **Responsive Design:** The website is responsive and works well on different devices.

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL


## Installation

### Prerequisites

- XAMPP or any other local server environment.
- A web browser.

### Steps

1. **Move the project to your server directory:**
    - For XAMPP, move the project folder to `C:\xampp\htdocs\`.

2. **Create a database:**
    - Open PHPMyAdmin.
    - Create a new database named `car_rental`.

3. **Import the database:**
    - Import the `car_rental.sql` file from the project directory into the `car_rental` database.

4. **Update the database configuration:**
    - Open `connection.php` file in the project directory.
    - Update the database credentials to match your local server setup.

    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";
    ```

5. **Start the server:**
    - Open XAMPP Control Panel.
    - Start the Apache and MySQL modules.

6. **Access the website:**
    - Open a web browser.
    - Navigate to ` http://localhost/rental-car-main/index.php`  
  to log in use this:
  email:challatoufik3@gmail.com
  password:tawfikchella  
  
## Usage

- **Register:** Create a new account.
- **Log in:** Access your account using your credentials.
- **Browse Cars:** View available cars for rent.
- **Make a Reservation:** Select a car and provide the required details to make a reservation (under developement).
- **Manage Reservations:** View and manage your reservations from your dashboard (under developement).
