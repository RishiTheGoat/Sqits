<?php

require_once '../php/config.php';

session_start();
if(isset($_SESSION['admin'])){
    $no=1;
    
    $message = false;
    $del_msg = false;
   $select = "SELECT * FROM customer";
   $res = mysqli_query($conn,$select);
    $count = mysqli_num_rows($res);
    if(isset($_GET['del'])){
      $del = $_GET['del'];

      $query = "DELETE FROM customer WHERE id='$del'";
      mysqli_query($conn,$query);
      
      $del_msg = true;
      $select = "SELECT * FROM customer";
      $res = mysqli_query($conn,$select);
    }
 

?>
<!DOCTYPE html>
<html>
<head>
  <?php  require_once '../include/header.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
    
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"> <?php echo $_SESSION['name']; ?></span>
            </a>
           
          </li>
         
        
        </ul>
      </div>
    </nav>
  </header>
 <aside class="main-sidebar">
   <?php require_once '../include/sidebar.php';  ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard    
        <small>All Companies</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <div class="col-md-12">
         
         <div class="box" >
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($del_msg){ ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Customer Deleted Successfully!
            </div>
            
            <?php //header("Refresh:0");
          } ?>
               <!--  <?php if($count<=0){ ?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>No Record Found
            </div>
            
            <?php } ?> -->
                <div></div>
              <table id="tables" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>Company Name</th>
                  <th>Email</th>
                   <th>Address</th>
                   <th>City</th>
                   <th>Zip Code</th>
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
               <?php while($row = mysqli_fetch_array($res)) {
                    $id = $row['id']; ?>

                    <tr>
                  
                        
                  <td><?php echo $no++;  ?></td>
                  <td><?php echo $row['company_name'];  ?></td>
                    <td><?php echo $row['email'];  ?></td>
                    <td><?php echo $row['address'];  ?></td>
                    <td><?php echo $row['city'];  ?></td>
                  <td><?php echo $row['zipcode'];  ?></td>
                    <td><?php echo "<a class='btn btn-primary' href='index.php?del=".$id."'>Delete</a>";  ?></td>

              
                        
                         <td>
                         <div class="btn-group">
    
         <a class="btn btn-primary" href="../edit-customer/?id=<?php echo $row['id']; ?>">Edit</a>                 
                 &nbsp;&nbsp;&nbsp;       
                    </div>
                        </td>
                </tr>
              
                    <?php  } ?> 
             
              
            
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
     
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
    <strong>Copyright &copy; 2018 .</strong> All rights
    reserved.
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
</div>
<!-- ./wrapper -->


<!-- page script -->
<script>
  $(function () {
    $("#tables").DataTable();
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    

</body>
</html>

<?php
}else{
    header("location:../");
}
    
    ?>
