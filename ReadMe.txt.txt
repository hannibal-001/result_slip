KCA STUDENT RESULT SLIP MANAGEMENT SYSTEM
=========================================

DESCRIPTION:
------------
This is a simple web-based system developed using PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap 5. 
It allows an administrator to securely log in and manage student result slips within KCA University.

FEATURES:
---------
✔ Secure admin login with session protection  
✔ Redirect to login page if user is not authenticated  
✔ Logout functionality to end session  
✔ Admin dashboard page  
✔ Clean user interface using Bootstrap 5  

FILES INCLUDED:
---------------
- index.php              → Main admin dashboard (protected by session)
- login.php              → Login form and authentication
- logout.php             → Ends session and redirects to login
- includes/db_connect.php → Database connection file
- users.sql              → SQL script to create `users` table and insert an admin user
- README.txt             → This file

HOW TO RUN:
-----------
1. Create a database named `kca_results` in phpMyAdmin
2. Import the `users.sql` file to create the `users` table and add the default admin
3. Place the project folder inside your XAMPP `htdocs` directory:
   Example path: `C:\xampp\htdocs\KCA_Result_System`
4. Start Apache and MySQL from XAMPP Control Panel
5. Open your browser and go to:
   http://localhost/KCA_Result_System/login.php

DEFAULT ADMIN CREDENTIALS:
---------------------------
Username: admin  
Password: admin123

NOTES:
------
- Make sure you have no whitespace before `<?php` in your PHP files.
- Session-based protection is implemented in `index.php` to restrict unauthorized access.

DEVELOPED BY:
-------------
JUMA MUSA TALA 
Institution: KCA University  
Year: 2025
