<?php
include("../database.php");
if(isset($_REQUEST['submit'])){
	/*echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";*/
	
	extract($_REQUEST);
	
	if($obj->Update("tbl_teacher","name='$name',father ='$father', email='$email',mobile='$mobile',address='$address' ,designation='$designation'", "teacher_id=$teacher_id")){
	//if($obj->Update("students","name='$name',email='$email',mobile='$mobile',address='$address'","student_id=$student_id"))	
		header("location:view_teacher.php");
		
	}
	else{
		$msg="<span class='text-warning'>Update </span>";	
	}
	
}
if(isset($_REQUEST['edit_id'])){
	$teacher_id=$_REQUEST['edit_id'];
	extract($obj->getById("tbl_teacher","*","teacher_id=$teacher_id"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>add student</title>
     <?php
        include("html_link.php");
    ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          

             <?php
                include("title.php");
                include("head_menu.php");
            ?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                       
                       <?php
                            include("manu.php");
                       ?>
                       
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Teacher Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="edit_teacher.php" method="post">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                             <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>" />
                                            <input class="form-control" name="name" value="<?php echo $name; ?>" required="required">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Father's Name</label>
                                            <input class="form-control" name="father" value="<?php echo $father; ?>" required="required">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required="required">
                                           
                                        </div>
                                      
                                       <button type="reset" class="btn btn-default">Reset Button</button>
                                   
                                </div>
                                 <div class="col-lg-6">
                                    
                                        
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="mobile" value="<?php echo $mobile; ?>" required="required">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="<?php echo $address; ?>" required="required">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="designation" value="<?php echo $designation; ?>" required="required">
                                           
                                        </div>
                                     <button type="submit" name="submit" class="btn btn-default">Update Button</button>
                                       
                                </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
