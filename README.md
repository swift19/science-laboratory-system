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
![image](https://user-images.githubusercontent.com/36355952/183423319-4a00a9a0-cf56-4dee-a288-8d4d0c988a29.png)
- Can export request form as an .xlsx file extention
![image](https://user-images.githubusercontent.com/36355952/183423605-b43f4de1-695c-482a-a8f4-ce1e027fe702.png)
- Can manage inventory (view, add, edit, delete materials)
![image](https://user-images.githubusercontent.com/36355952/183423692-a48d3ff5-4099-4a32-9bfa-e5ea5bbf03c6.png)
- Can Approved/Declined request
- When item is approved, the item qty is deducted base on request
- Can Update status to return
- When item is return, the item qty is added base on return item
![image](https://user-images.githubusercontent.com/36355952/183423771-e9c85054-5525-443e-ba15-e1049c88d1d0.png)
- Can add comment/remarks on equipment condition (Return)
![image](https://user-images.githubusercontent.com/36355952/183424008-52f4ba7b-f8df-4127-885a-ee67185dc6d6.png)
- Can add/delete notice board, display in homepage for student or professor to see
![image](https://user-images.githubusercontent.com/36355952/183422381-63c2dce5-9da5-4977-b2c3-69871a8e6f3c.png)

