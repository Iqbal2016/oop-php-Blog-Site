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
                    <h1 class="page-header">Teacher Tables</h1>
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
                                            <th>Address</th>
                                            <th>Radio Button </th>
                                            <th>Check Box</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                         <?php
                                            $all_add=$obj->getAll("tbl_add","*");
                                            $sl_no=1;
                                            foreach($all_add as $add){
                                                    extract($add);

                                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sl_no++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $optionsRadios; ?></td>
                                            <td><?php echo $checkOption; ?></td>
                                            <td><?php echo $Country; ?></td>
                                            <td>
                                                <a class="btn btn-success glyphicon glyphicon-edit" href="edit_teacher.php?edit_id=<?php echo $teacher_id; ?>"></a>
                                                <a class="btn btn-danger glyphicon glyphicon-remove" href="view_teacher.php?del_id=<?php echo $teacher_id; ?>"></a>
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
                <!-------------------------------------------------------->
                
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                      <h4 class="modal-title" id="myModalLabel">Change your age</h4>
                                    </div>

                                    <div class="modal-body">

                                        <form action="update.php" method="post"class="form-inline">
                                            <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $name; ?>" disabled>
                                            <br/><br/>
                                            <input type="text" class="form-control" placeholder="<?php echo $address; ?>" value="<?php echo $address; ?>">
                                            <br/><br/>
                                            <button type="submit" class="processing btn">Update</button>
                                        </form>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>


                        <div class="bs-example" style="padding-bottom: 24px;">
                            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">Update your age</a>
                        </div>
                
                <!------------------------------------------------------------------>
                
                
                
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

