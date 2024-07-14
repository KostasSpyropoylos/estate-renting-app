# Estate Rental App

## Overview
Our application allows users to browse available properties for short-term rental, make reservations, create listings for their own properties, and manage their account.

## Quick Links
- [Interfaces](#interfaces)
- [Database](#database)
- [Footer](#footer)
- [How to use](#how-to-use)

## Interfaces

### 1. Feed
The main page displays all available properties for short-term rental. Each property is accompanied by essential information like photo, title, location, number of rooms, and price per night. Users can browse properties and make reservations upon logging in.

### 2. Login/Register
Users can register for a new account or log in using the provided form. Registration requires first name, last name, unique username, password, and unique email. Validation ensures data integrity.

### 3. Book
This interface handles property reservation. Users can select booking dates, and the system checks availability. Upon confirmation, users enter their details, and the final payment amount is calculated with a random discount percentage.

### 4. Create Listing
Users can create listings for their properties by providing details such as photo, title, location, number of rooms, and price per night. Upon submission, if all details are valid, the listing is saved, and users receive a confirmation message.

## Database
The application data is stored in a MySQL database named `ds_estate` with three tables:

- `users`: stores user information
- `listings`: stores property listings
- `reservations`: stores reservations

Tables are designed based on application functionalities and data requirements.

## Footer
The footer is present on all interfaces and includes contact information of the company and an embedded Google Maps for location reference.

## How to Use

1. Clone the project (via SSH)
    ```sh
    git clone git@github.com:KostasSpyropoylos/house-renting-app.git
    ```

2. Import the `ds_estate.sql` Database to MySQL

3. When running the project, make sure the URL is set to:
    ```sh
    http://localhost:3000/
    ```
    The project uses custom routing.
