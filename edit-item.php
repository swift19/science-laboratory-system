

<?php
require_once 'php/init.php';
editItem();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SLS Admin | Update Item </title>
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
                                    <h2 class="title">Update Item</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>Inventory</li>
                                        <li><a href="manage-item.php">Manage Item</a></li>
                                        <li class="active">Update Item</li>
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
                                                    <h5>Update Item</h5>
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
                                                $id=intval($_GET['itemId']);
                                                $sql = "SELECT * from inventory where id=:id";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':id',$id,PDO::PARAM_STR);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {   ?>                                               
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Material Name</label>
                                                        <div class="col-lg-6">
                                                        <input type="text" name="matName" 
                                                        value="<?php echo htmlentities($result->matName);?>" class="form-control" id="default"  required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Description</label>
                                                        <div class="col-lg-6">
                                                        <input type="text" name="description" class="form-control" 
                                                        value="<?php echo htmlentities($result->description);?>"  id="default" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="type" class="col-sm-2 control-label">Type</label>
                                                        <div class="col-lg-6">
                                                        <select name="type" class="form-control" id="type" required="required">
                                                            <option value="<?php echo htmlentities($result->type); ?>"><?php echo htmlentities($result->type);?></option>
                                                            <?php                                                         
                                                            $sql = "SELECT * from inventory_type";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results1=$query->fetchAll(PDO::FETCH_OBJ);
                                                            if($query->rowCount() > 0)
                                                            {
                                                            foreach($results1 as $results)
                                                            {   ?>
                                                            <option value="<?php echo htmlentities($results->type); ?>">
                                                                        <?php echo htmlentities($results->type);?>
                                                            <?php }} ?>
                                                            </option>
                                                      
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Qty</label>
                                                        <div class="col-lg-6">
                                                        <input type="number" name="qty" class="form-control" 
                                                        value="<?php echo htmlentities($result->qty);?>"  id="default" required="required">
                                                        </div>
                                                    </div>
                                                    <?php }} ?>

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
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

