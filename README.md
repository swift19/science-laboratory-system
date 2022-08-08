# science laboratory system
Science Laboratory System

How to run the Science Laboratory System
1. Download the  zip file or clone in git
2. Extract the file and copy sls folder
3. Paste inside root directory(for xampp xampp/htdocs, for wamp wamp/www, for lamp var/www/html)
4. Open PHPMyAdmin (http://localhost/phpmyadmin)
5. Create a database with name sls 
6. Import sls.sql file(given inside the zip package)
7. Run the script http://localhost/science-laboratory-system-master (frontend)

Credential for user admin:
Username: admin
Password: admin

==========================================================================

**Role's:**

Admin Account, Student/Professor

**Key Feature:**

Student/Professor
 - Submit request form to admin
![image](https://user-images.githubusercontent.com/36355952/183422560-d207da58-ca7d-4888-af76-b88aae516f9c.png)
 - Hover Dropdown material to check how many stock of the item left
![image](https://user-images.githubusercontent.com/36355952/183422782-1a385078-7938-4e7e-a9ea-c818e90f8f0a.png)

Admin
- Admin login page
![image](https://user-images.githubusercontent.com/36355952/183422951-169af3cc-df5c-4723-86ba-494387aeb979.png)
- View admin page dashboard (Daily Basis)
![image](https://user-images.githubusercontent.com/36355952/183423061-b34dc75e-df82-43be-9db2-3af2b24e3b6b.png)
- View student's request history (Daily Basis)
- Can export request form as an .xlsx file extention
- Can manage inventory (view, add, edit, delete materials)
- Can Approved/Declined request
- When item is approved, the item qty is deducted base on request
- When item is return, the item qty is added base on return item
- Can add comment/remarks on equipment condition (Return)
- Can add/delete notice, display in homepage for student or professor to see
![image](https://user-images.githubusercontent.com/36355952/183422381-63c2dce5-9da5-4977-b2c3-69871a8e6f3c.png)

