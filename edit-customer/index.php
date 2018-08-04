<?php

require_once '../php/config.php';
session_start();
$message=false;
$error = false;
if(isset($_SESSION['admin']))
{
    $admin = $_SESSION['admin'];


// $select = "SELECT * FROM admin WHERE id = '$admin'";
// $selectres = mysqli_query($conn, $select);
// $row = mysqli_fetch_array($selectres);

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $select = "SELECT * FROM customer where id='$id'";
  $res = mysqli_query($conn,$select);
  $count = mysqli_num_rows($res);
  while($row = mysqli_fetch_row($res)) {
    $company_name = $row[1];
    $email = $row[2];
    $city = $row[3];
    $address = $row[4];
    $zipcode = $row[5];
  }
}
if(isset($_POST['submit'])){
    
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];

    $update = "UPDATE customer SET company_name = '$company_name', email = '$email',
    city = '$city',
    address = '$address', zipcode = '$zipcode' WHERE id = '$id'";

    mysqli_query($conn,$update);
    $select = "SELECT * FROM customer where id='$id'";
    $res = mysqli_query($conn,$select);
    $message = true;
    }else{
        $error =true;
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
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- Notifications: style can be found in dropdown.less -->
        
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"> <?php echo $_SESSION['name']; ?></span>
            </a>
          
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <?php require_once '../include/sidebar.php';  ?>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Change Password
        <small>Preview</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
          <div class="col-md-2"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
               <?php if($message){ ?>
          	<div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Customer Updated Successfully!
            </div>
            
            <?php }?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control" id="company_name" placeholder="Enter New Company Name..." name="company_name" value="<?php echo $company_name; ?>" >
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter New Email..." name="email" value="<?php echo $email; ?>" >
                </div>

                <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter New City" name="city" value="<?php echo $city; ?>" >
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="Enter New Address..." name="address" value="<?php echo $address; ?>" >
                </div>

                <div class="form-group">
                  <label for="zipcode">ZipCode</label>
                  <input type="text" class="form-control" id="zipcode" placeholder="Enter New ZipCode" name="zipcode" value="<?php echo $zipcode; ?>" >
                </div>

                
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update Customer</button>
              </div>
            </form>
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

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php
}else{
    header("location:../");
}
?>