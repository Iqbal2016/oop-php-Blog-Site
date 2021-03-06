<?php
    include("../database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                    <h1 class="page-header">Student Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                      
                        <?php
                            if(isset($_REQUEST['del_id'])){

                                    $del_id=$_REQUEST['del_id'];
                        ?>
                        
                        
                        <span class="text-info">Do you want to Delete?</span><a href="view_student.php?c_del_id=<?php echo $del_id; ?>" class="btn btn-danger">Yes</a>&nbsp;<a href="view_student.php" class="btn btn-success">No</a>

                                <?php


                            }

                            if(isset($_REQUEST['c_del_id'])){
                                    $c_del_id=$_REQUEST['c_del_id'];
                                    if($obj->Delete("students","student_id=$c_del_id")){

                                            echo "<span class='text-success'>Delete Success</span>";

                                    }
                                    else{
                                            echo "<span class='text-warning'>Delete Fail!</span>";
                                    }
                            }
                            ?>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        
                                        <tr>
                                            <th>Sl no.</th>
                                            <th>Name</th>
                                            <th>Father</th>
                                            <th>Mother</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                         <?php
                                            $all_students=$obj->getAll("students","*");
                                            $sl_no=1;
                                            foreach($all_students as $student){
                                                    extract($student);

                                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sl_no++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $father; ?></td>
                                            <td><?php echo $mother; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $mobile; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td>
                                                <a class="btn btn-success glyphicon glyphicon-edit" href="edit_student.php?edit_id=<?php echo $student_id; ?>"></a>
                                                <a class="btn btn-danger glyphicon glyphicon-remove" href="view_student.php?del_id=<?php echo $student_id; ?>"></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
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

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>

