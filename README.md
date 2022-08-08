# science laboratory system
Science Laboratory System

How to run the Science Laboratory System
1. Download the  zip file or clone in git
2. Extract the file and copy sls folder
3. Paste inside root directory(for xampp xampp/htdocs, for wamp wamp/www, for lamp var/www/html)
4. Open PHPMyAdmin (http://localhost/phpmyadmin)
5. Create a database with name sls 
6. Import sls.sql file(given inside the zip package)
7. Run the script http://localhost/sls/sls (frontend)

Credential for user admin:
Username: admin
Password: admin

============================================================================================

**Role's:**

Admin Account, Student/Professor

**Key Feature:**

Student/Professor
 - Submit request form to admin

Admin
- View admin page dashboard (Daily Basis)
- View student's request history (Daily Basis)
- Can export request form as an .xlsx file extention
- Can manage inventory (view, add, edit, delete materials)
- Can Approved/Declined request
- When item is approved, the item qty is deducted base on request
- When item is return, the item qty is added base on return item
- Can add comment/remarks on equipment condition (Return)
