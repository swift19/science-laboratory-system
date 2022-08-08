<?php
require_once 'php/init.php';
request();
stockCount();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SLS Admin | Return Item </title>
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

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Return Item</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>                                        
                                        <li><a href="view-approved.php">View Approved Request</a></li>
                                        <li class="active">Return</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Return Item</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <?php if($msg){?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } 
                                            else if($error){?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                            <?php } ?>
                                            <form class="form-horizontal" method="post">
                                            <?php          
                                                            $referenceNo=intval($_GET['referenceNo']);                                                                                                  
                                                            $sql = "SELECT * FROM student_req_form WHERE referenceNo=$referenceNo";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                            if($query->rowCount() > 0)
                                                            {
                                                            foreach($results as $result)
                                                            {   ?>
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3 ">Reference No.</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->referenceNo)?>" readonly>
                                                        </div>

                                                        <label for="default" class="col-lg-3 ">Student Full name</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->lastName)?>, <?php echo htmlentities($result->firstName)?> <?php echo htmlentities($result->middleName)?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3 ">Room</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->room)?>" readonly>
                                                        </div>

                                                        <label for="default" class="col-lg-3 ">Section</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->section)?>" readonly>
                                                        </div>
                                                    </div>
 
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3">Subject</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->subject)?>" readonly>
                                                        </div>

                                                        <label for="default" class="col-lg-3">Date of Use</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->dateOfUse)?>" readonly>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3">Time</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo date('h:i A',strtotime($result->time)) ?>" readonly>                                                        
                                                        </div>

                                                        <label for="default" class="col-lg-3">Day(s)</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->days)?>" readonly>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3">Instructor Name</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->instructorName)?>" readonly>
                                                        </div>

                                                        <label for="default" class="col-lg-3">Type</label>
                                                        <div class="col-lg-3">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($result->type)?>" readonly>
                                                        </div>
                                                    </div>  
                                                    <?php }} ?>
                                                    <div class="form-group">
                                                        <label for="default" class="col-lg-3 ">Remark(s)</label>
                                                        <div class="col-lg-3">
                                                        <textarea type="text" name="remarks" class="form-control" id="remarks" required="required" autocomplete="off"></textarea>
                                                        </div>
                                                    </div> 
                                                                                                     
                                                    <table class="table table-bordered" id="dynamic_field">                                                     
                                                    <tr>  
                                                        <td><b>Item</b></td> 
                                                        <td><b>Quantity</b></td>                                                                                                                
                                                    </tr>
                                                    <?php          
                                                    $referenceNo=intval($_GET['referenceNo']);                                                                                                  
                                                    $sql = "SELECT * FROM item_request WHERE referenceNo=$referenceNo";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?> 
                                                    <tr>  
                                                        <td><?php echo htmlentities($result->item)?></td>  
                                                        <td><?php echo htmlentities($result->quantity)?></td>                                                        
                                                        
                                                    </tr> 
                                                    <?php }} ?> 
                                                    </table> 

                                                    


                                                    <div class="form-group">        
                                                        <div class="col-lg-6">&nbsp;</div>                                                
                                                        <div class=" col-lg-6" style="text-align: right;">
                                                            <button type="submit" name="return" class="btn btn-danger" style="width: 30%;" >Return Item</button>
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
        </script>
    </body>
</html>

