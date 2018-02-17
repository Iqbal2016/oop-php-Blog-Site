<?php
include("../database.php");
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	
	if($obj->Update("menus","name='$name',content ='$content', status='$status'","menu_id=$menu_id")){
            header("location:view_menus.php");
		
	}
	else{
		$msg="<span class='text-warning'>Update </span>";	
	}
	
}
if(isset($_REQUEST['edit_id'])){
	$menu_id=$_REQUEST['edit_id'];
	extract($obj->getById("menus","*","menu_id=$menu_id"));
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

    <title>Update menus</title>
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
                                <form role="form" action="edit_menus.php" method="post">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                                           <input class="form-control" name="name" value="<?php echo $name; ?>">
                                           
                                        </div>      
                                </div>
                                 <div class="col-lg-6">   
                                       <div class="form-group">
                                            <label>Publication Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="1" checked>Published
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="2">Un Published
                                                </label>
                                            </div>
                                           
                                        </div>
                                
                                </div>
                                    <div class="col-lg-12">
                                         <div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control ckeditor" name="content" rows="4"><?php echo $content; ?></textarea>
                                        </div>
                                        
                                    </div>
                                 </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
                                        </div>
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
