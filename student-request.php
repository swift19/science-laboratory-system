<?php
require_once 'php/init.php';
addStudentRequest();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SLS | Student - Request Form </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper no-margin-top">
                <div class="content-container">
                  
                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Request Form</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Request Form</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           <br/>
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <?php if($msg){?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                                            </div><?php } 
                                            else if($error){?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap! </strong> <?php echo htmlentities($error); ?>
                                            </div>
                                                <?php } ?>
                                                <form class="form-horizontal" method="post" >

<div class="form-group">
    <label for="default" class="col-lg-2">First Name </label>
    <div class="col-lg-2">
    <input type="text" name="firstName" class="form-control" id="firstName" required="required" autocomplete="off">
    </div>

    <label for="default" class="col-lg-2 ">Middle Name</label>
    <div class="col-lg-2">
    <input type="text" name="middleName" class="form-control" id="middleName" required="required" autocomplete="off">
    </div>

    <label for="default" class="col-lg-2 ">Last Name</label>
    <div class="col-lg-2">
    <input type="text" name="lastName" class="form-control" id="lastName" required="required" autocomplete="off">
    </div>

</div>


<div class="form-group">
<label for="default" class="col-lg-2 ">Room</label>
<div class="col-lg-2">
<input type="text" name="room" class="form-control" id="room" required="required" autocomplete="off">
</div>

<label for="default" class="col-lg-2 ">Section</label>
<div class="col-lg-2">
<input type="text" name="section" class="form-control" id="section" required="required" autocomplete="off">
</div>

<label for="default" class="col-lg-2 ">Subject</label>
<div class="col-lg-2">
<input type="text" name="subject" class="form-control" id="subject" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-lg-2 ">Date of Use</label>
<div class="col-lg-2">
<input type="date"  name="dateOfUse" class="form-control"  required="required" id="dateOfUse">
</div>

<label for="default" class="col-lg-2 ">Time</label>
<div class="col-lg-2">
<input type="time" name="time" class="form-control" id="time" required="required" id="time">
</div>

<label for="default" class="col-lg-2 ">Day(s)</label>
<div class="col-lg-2">
<input type="text" name="days" class="form-control" id="days" required="required" autocomplete="off">
</div>

</div>

<div class="form-group">
<label for="default" class="col-lg-2 ">Name of Instructor</label>
<div class="col-lg-3">
<input type="text" name="instructorName" class="form-control" id="instructorName" required="required" autocomplete="off">
</div>


                                                    <div class="form-group">
                                                        <label for="type" class="col-lg-2 ">Material Type</label>
                                                        <div class="col-lg-3">
                                                            <select name="type" class="form-control" id="type" required="required">
                                                                <option value="">Select Type</option>
                                                                <?php                                                         
                                                                $sql = "SELECT * from inventory_type";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                if($query->rowCount() > 0)
                                                                {
                                                                foreach($results as $result)
                                                                {   ?>
                                                                <option value="<?php echo htmlentities($result->type); ?>">
                                                                            <?php echo htmlentities($result->type);?>
                                                                <?php }} ?>
                                                                </option>                                                        
                                                            </select>
                                                        </div>
                                                    </div>

                           

                <h4 align="center">Material Requisition Form</h4>  
                <div class="form-group">  
                     <!-- <form name="add_name" id="add_name">                      
                     </form>-->
                     <div class="container-fluid" id="dynamic_field">  
                        <div class="col-lg-8">
                        <!-- <input type="text" name="name[]" placeholder="Enter Material" class="form-control " /> -->

                       
                                                        <select name="name[]" class="form-control" id="name" required="required">
                                                            <option value="">Select Material</option>
                                                            <?php                                                                  
                                                            $type = $_POST['type'];               
                                                                                              
                                                            // $sql = "SELECT * from inventory WHERE type=:type ";
                                                            $sql = "SELECT * from inventory";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results1=$query->fetchAll(PDO::FETCH_OBJ);
                                                            if($query->rowCount() > 0)
                                                            {
                                                            foreach($results1 as $result1)
                                                            {   ?>
                                                            <option value="<?php echo htmlentities($result1->matName); ?>"
                                                                title="Stock: <?php echo $result1->qty;?>">
                                                                <?php echo htmlentities($result1->matName);?>                                                                                                                                                                                                                                         
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                       

                        </div>
                        <div class="col-lg-2">
                        <input type="number" name="quantity[]" placeholder="Enter Quantity" class="form-control " />
                        </div>
                        <div class="col-lg-2">
                        <button type="button" name="add" id="add" class="btn btn-success" style="width: 100%;">Add More</button>
                        </div>
                    </div>
                </div>   
                
              
                                                    <div class="form-group" >
                                                        <div style="padding-top: 20px; padding-left:30px;">
                                                            <button type="submit" name="request" class="btn  btn-primary" style="width: 20%;"> Submit Request </button>                                                           
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });

            $(document).ready(function(){  
            var i=1;  
            $('#add').click(function(){  
                i++;                
                // $('#dynamic_field').append('<div id="row'+i+'"> <div class="col-lg-8" id="name'+i+'"><input type="text" name="name[]" placeholder="Enter Material" class="form-control " /></div><div class="col-lg-2" id="qty'+i+'"><input type="number" name="quantity[]" placeholder="Enter Quantity" class="form-control " /></div><div class="col-lg-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');

                $('#dynamic_field').append('<div id="row'+i+'"><div class="col-lg-8" id="name'+i+'"><select name="name[]" class="form-control" id="name[]" required="required"><option value="">Select Material</option><?php $type = $_POST['type'];$sql = "SELECT * from inventory";$query = $dbh->prepare($sql);$query->execute();$results1=$query->fetchAll(PDO::FETCH_OBJ);if($query->rowCount() > 0) { foreach($results1 as $result1){ ?><option value="<?php echo htmlentities($result1->matName); ?>" title="Stock: <?php echo $result1->qty;?>"><?php echo htmlentities($result1->matName);?></option><?php }} ?></select></div><div class="col-lg-2" id="qty'+i+'"><input type="number" name="quantity[]" placeholder="Enter Quantity" class="form-control " /></div><div class="col-lg-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');
                
                
                // <div class="col-lg-8" id="name'+i+'"><select name="name[]" class="form-control" id="name[]" required="required"><option value="">Select Material</option><?php $type = $_POST['type'];$sql = "SELECT * from inventory";$query = $dbh->prepare($sql);$query->execute();$results1=$query->fetchAll(PDO::FETCH_OBJ);if($query->rowCount() > 0) { foreach($results1 as $result1){ ?><option value="<?php echo htmlentities($result1->matName); ?>" title="Stock: <?php echo $result1->qty;?>"><?php echo htmlentities($result1->matName);?></option><?php }} ?></select></div>
            });  
            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });  

            // $('#submit').click(function(){            
            //     $.ajax({  
            //             url:"name.php",  
            //             method:"POST",  
            //             data:$('#add_request').serialize(),  
            //             success:function(data)  
            //             {  
            //                 alert(data);  
            //                 $('#add_request')[0].reset();  
            //             }  
            //     });  
            // });

            }); 
        </script>
    </body>
</html>