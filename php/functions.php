<?php
session_start();
error_reporting(0);

function adminLogin(){    
    include('includes/config.php');
    if($_SESSION['alogin']!=''){
    $_SESSION['alogin']='';
    }
    if(isset($_POST['login']))
    {
    $uname=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname AND Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
    }
}

function dashboard(){
    include('includes/config.php');
    if(strlen($_SESSION['alogin'])=="")
    {   header("Location: index.php"); }
}

function pendingApproval(){
    // Regd Users
    include('includes/config.php');    
    $sql1 ="SELECT * FROM student_req_form WHERE req_status is null AND DATE(dateOfUse) = CURRENT_DATE()";
    $query1 = $dbh -> prepare($sql1);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    $pendingApproval=$query1->rowCount();
    echo $pendingApproval;   
}

function getApproved(){
    // Regd Users
    include('includes/config.php');    
    $sql1 ="SELECT * FROM student_req_form WHERE req_status = 'APPROVED' AND DATE(dateOfUse) = CURRENT_DATE()";
    $query1 = $dbh -> prepare($sql1);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    $approved=$query1->rowCount();
    echo $approved;   
}

function getDeclined(){
    // Regd Users
    include('includes/config.php');    
    $sql1 ="SELECT * FROM student_req_form WHERE req_status = 'DECLINED' AND DATE(dateOfUse) = CURRENT_DATE()";
    $query1 = $dbh -> prepare($sql1);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    $declined=$query1->rowCount();
    echo $declined;   
}

function getTotalRequest(){
    // Regd Users
    include('includes/config.php');    
    $sql1 ="SELECT * FROM student_req_form WHERE DATE(dateOfUse) = CURRENT_DATE()";
    $query1 = $dbh -> prepare($sql1);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    $totalRequest=$query1->rowCount();
    echo $totalRequest;   
}

function addStudentRequest(){   
    include('includes/config.php');
    
    if(isset($_POST['request']))
    {        
    $firstName=$_POST['firstName'];    
    $middleName=$_POST['middleName']; 
    $lastName=$_POST['lastName']; 
    $room=$_POST['room']; 
    $section=$_POST['section']; 
    $subject=$_POST['subject']; 
    $dateOfUse=$_POST['dateOfUse']; 
    $time=$_POST['time']; 
    $days=$_POST['days']; 
    $instructorName=$_POST['instructorName'];
    $type=$_POST['type'];
    $referenceNo= rand(100000,999999);

    $con = mysqli_connect("localhost", "root", "", "sls");  
    $number = count($_POST["name"]);            
    if($number > 0)  
    {  
         for($i=0; $i<$number; $i++)  
         {  
              if(trim($_POST["name"][$i] != ''))  
              {  
                   $sql = "INSERT INTO item_request(item,quantity,referenceNo) VALUES('".mysqli_real_escape_string($con, $_POST["name"][$i])."','".mysqli_real_escape_string($con, $_POST["quantity"][$i])."',$referenceNo)";  
                   mysqli_query($con, $sql);                                 
              }  
         }
    }
    
    $sql="INSERT INTO  student_req_form(firstName,middleName,lastName,room,section,subject,dateOfUse,time,days,instructorName,type,referenceNo) VALUES(:firstName,:middleName,:lastName,:room,:section,:subject,:dateOfUse,:time,:days,:instructorName,:type,:referenceNo)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
    $query->bindParam(':middleName',$middleName,PDO::PARAM_STR);
    $query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
    $query->bindParam(':room',$room,PDO::PARAM_STR);
    $query->bindParam(':section',$section,PDO::PARAM_STR);
    $query->bindParam(':subject',$subject,PDO::PARAM_STR);
    $query->bindParam(':dateOfUse',$dateOfUse,PDO::PARAM_STR);
    $query->bindParam(':time',$time,PDO::PARAM_STR);
    $query->bindParam(':days',$days,PDO::PARAM_STR);
    $query->bindParam(':instructorName',$instructorName,PDO::PARAM_STR);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->bindParam(':referenceNo',$referenceNo,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    
    if($lastInsertId)
    {
    global $msg;
    $msg="Student Request successfully added. Your Reference No. $referenceNo";
    echo $msg;
    }
    else 
    {
    global $error;
    $error="Something went wrong. Please try again";
    echo $error;
    }
    }
}

function request(){
    include('includes/config.php');
    if(isset($_POST['approved']))
    { 
        // UPDATE STATUS
        $referenceNo=intval($_GET['referenceNo']);                 
        $sql="UPDATE student_req_form SET req_status='APPROVED' WHERE referenceNo=$referenceNo ";              
        $query = $dbh->prepare($sql);              
        $query->execute();
        global $msg;
        $msg="Request Approved";
        echo $msg;     
    }

    if(isset($_POST['declined']))
    { 
        $referenceNo=intval($_GET['referenceNo']);                 
        $sql="UPDATE student_req_form SET req_status='DECLINED' WHERE referenceNo=$referenceNo ";
        $query = $dbh->prepare($sql);              
        $query->execute();
        global $msg;
        $msg="Request Declined";
        echo $msg;
    }

    if(isset($_POST['return']))
    { 
        $referenceNo=intval($_GET['referenceNo']);
        $remarks=$_POST['remarks'];
        $sql="UPDATE student_req_form SET req_status='RETURN',remarks=:remarks WHERE referenceNo=$referenceNo ";
        $query = $dbh->prepare($sql);   
        $query->bindParam(':remarks',$remarks,PDO::PARAM_STR);           
        $query->execute();
        global $msg;
        $msg="Request Item Return";
        echo $msg;
    }
}

function stockCount(){
    include('includes/config.php');
    if(isset($_POST['approved']))
    { 
        $referenceNo=intval($_GET['referenceNo']); 
        $sql="SELECT a.id,(a.qty-b.quantity) as stock FROM inventory as a INNER JOIN  item_request as b on a.matName = b.item WHERE referenceNo=$referenceNo";             
        $query = $dbh->prepare($sql);              
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount() > 0)
        {
           
            foreach($results as $result1)
            {               
                $sql2="UPDATE inventory SET qty=$result1->stock WHERE id=$result1->id ";              
                $query2 = $dbh->prepare($sql2);              
                $query2->execute();
            }
        }
    }

    if(isset($_POST['return']))
    { 
        $referenceNo=intval($_GET['referenceNo']); 
        $sql="SELECT a.id,(a.qty+b.quantity) as stock FROM inventory as a INNER JOIN  item_request as b on a.matName = b.item WHERE referenceNo=$referenceNo";             
        $query = $dbh->prepare($sql);              
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount() > 0)
        {
           
            foreach($results as $result1)
            {               
                $sql2="UPDATE inventory SET qty=$result1->stock WHERE id=$result1->id ";              
                $query2 = $dbh->prepare($sql2);              
                $query2->execute();
            }
        }
    }
}



function addInventoryType(){   
    include('includes/config.php');
    if(isset($_POST['submit']))
    {
    $type=$_POST['type'];
    $sql="INSERT INTO  inventory_type(type) VALUES(:type)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    global $msg;
    $msg="Inventory type successfully added";
    echo $msg;
    }
    else 
    {
    global $error;
    $error="Something went wrong. Please try again";
    echo $error;
    }
    }
}

function editType(){
    include('includes/config.php'); 
    if(isset($_POST['update']))
    {
    $id=intval($_GET['typeId']);
    $type=$_POST['type'];
    $sql="UPDATE inventory_type SET type=:type WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    global $msg;
    $msg="Inventory type successfully updated";
    echo $msg;
    }
}

function deleteType(){
    include('includes/config.php');       
    if(isset($_POST['remove']))
    {       
    $id = $_POST['id'];        
    $sql="DELETE FROM  inventory_type WHERE id=:id ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    global $msg;
    $msg="Inventory type successfully deleted";
    echo $msg;
    }    
}

function addInventory(){   
    include('includes/config.php');   
    if(isset($_POST['submit']))
    {
    $matName=$_POST['matName'];
    $type=$_POST['type'];
    $description=$_POST['description'];   
    $qty=$_POST['qty'];    
    $sql="INSERT INTO  inventory(matName,type,description,qty) VALUES(:matName,:type,:description,:qty)";
    $query = $dbh->prepare($sql);    
    $query->bindParam(':matName',$matName,PDO::PARAM_STR);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':qty',$qty,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    global $msg;
    $msg="Inventory successfully added";
    echo $msg;
    }
    else 
    {
    global $error;
    $error="Something went wrong. Please try again";
    echo $error;
    }
    }
}

function deleteItem(){
    include('includes/config.php');       
    if(isset($_POST['remove']))
    {               
    $id = $_POST['id'];
    $sql="DELETE FROM  inventory WHERE id=:id ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    global $msg;
    $msg="Inventory successfully deleted";
    echo $msg;
    }    
}

function editItem(){
    include('includes/config.php'); 
    if(isset($_POST['Update']))
    {
    $id=intval($_GET['itemId']);
    $matName=$_POST['matName'];
    $type=$_POST['type'];
    $description=$_POST['description'];   
    $qty=$_POST['qty'];
    $sql="UPDATE  inventory SET matName=:matName,type=:type,description=:description,qty=:qty WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':matName',$matName,PDO::PARAM_STR);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':qty',$qty,PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    global $msg;
    $msg="Item Information updated successfully";
    echo $msg;
    }
}

function addNotice(){
    include('includes/config.php');
    if(isset($_POST['submit']))
    {
    $ntitle=$_POST['noticetitle'];
    $ndetails=$_POST['noticedetails']; 
    $sql="INSERT INTO  tblnotice(noticeTitle,noticeDetails) VALUES(:ntitle,:ndetails)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ntitle',$ntitle,PDO::PARAM_STR);
    $query->bindParam(':ndetails',$ndetails,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    echo '<script>alert("Notice added succesfully")</script>';
    echo "<script>window.location.href ='manage-notices.php'</script>";
    }else {
    echo '<script>alert("Something went wrong. Please try again.")</script>';
    }
    }
}

function deleteNotice(){
    include('includes/config.php');
    if($_GET['id'])
    {
    $id=$_GET['id'];
    $sql="DELETE FROM tblnotice WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Notice deleted.")</script>';
    echo "<script>window.location.href ='manage-notices.php'</script>";

    }
}
 ?>
