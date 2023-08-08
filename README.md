# PHP CRUD with Session-Based Login and Logout

This is a simple PHP application that demonstrates a CRUD (Create, Read, Update, Delete) system with user authentication using session-based login and logout functionality.

## Features

- User Authentication: Secure login and logout functionality using PHP sessions.
- Create, Read, Update, Delete: Perform basic CRUD operations on user data.
- Database: MySQL database is used to store user information and CRUD data.
- Responsive Design: The application is designed to work well on various screen sizes.

## Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/your-username/php-crud-with-session-login-logout.git
2. Configure Database:
 .Create a MySQL database.
 .Import the provided crud.sql file to set up the required tables.

3. Update Database Configuration:
 .Open connection.php and update the database connection settings:
    $connection =  mysqli_connect("localhost","root","","crud");

4. Run the Application:

 - Place the project files in your web server's directory.
 - Access the application through your web browser.

5. Usage
Register:

Open the registration page and create a new account.
Login:

Use your registered email and password to log in.
CRUD Operations:

After logging in, you can create, read, update, and delete user data.
Logout:

Click on the "Logout" link to securely log out.
