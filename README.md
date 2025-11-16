# Simple Web Login & Registration System

A beginner-friendly web project demonstrating HTML/CSS basics and a PHP authentication system with MySQL. Includes login, registration, database connectivity, and clean UI structure.

## Features
- HTML/CSS interface for login & registration  
- PHP-based authentication (login + register)  
- MySQL database connection via phpMyAdmin  
- Input validation & error handling  
- Organized and easy-to-extend file structure  

## How It Works
1. User submits login or registration form  
2. PHP processes the data and connects to MySQL  
3. Registration inserts a new user into the database  
4. Login checks credentials and allows access if valid  
5. CSS handles layout and styling  

## Database Setup
1. Open phpMyAdmin  
2. Create a database (e.g., `web_login`)  
3. Import or create a `users` table:
```
id (INT, AUTO_INCREMENT, PRIMARY KEY)
username (VARCHAR)
password (VARCHAR)
email (VARCHAR)
```
4. Update `db_connect.php` with your MySQL username/password  

## How to Run
1. Install XAMPP or WAMP  
2. Move the project folder into:
   - `htdocs` (XAMPP)  
   - `www` (WAMP)  
3. Start Apache + MySQL  
4. Visit:
```
http://localhost/your-project-folder
```
