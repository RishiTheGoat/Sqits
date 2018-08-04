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


if(isset($_POST['submit'])){
    
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    
    if(strcmp($pass,$cpass)==0){
    $hash = md5($pass);
    $update = "UPDATE admin SET password = '$hash' WHERE id = '$admin'";
    mysqli_query($conn,$update);
    $message = true;
    }else{
        $error =true;
    }
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
                <a class="close" data-dismiss="alert" href="#">×</a>Password Updated Successfully!
            </div>
            
            <?php }if($error){ ?>
              	<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>Password matched failed!
            </div>
              
              <?php } ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password"  >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm passowrd</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password" name="cpassword" >
                </div>
                
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update Password</button>
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
   
    <strong>Copyright &copy; 2016 .</strong> All rights
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
