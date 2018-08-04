<?php

require_once '../php/config.php';
session_start();
$message = false;
if(isset($_SESSION['admin']))
{
    $admin = $_SESSION['admin'];



if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
  
    $update = "UPDATE admin SET name = '$name' , email = '$email' WHERE id = '$admin'";
    mysqli_query($conn,$update);
    $message = true;

    $login = "SELECT * FROM `admin` WHERE id = '$admin'";
  
$loginres = mysqli_query($conn, $login);
$row = mysqli_fetch_array($loginres);
    $count= mysqli_num_rows($loginres);
    if($count>0){

$_SESSION['email'] = $row['email'];
$_SESSION['name'] = $row['name'];
$_SESSION['admin'] = $row['id'];

     }else{
        $error= true;
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
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
            

                <p>
                 <?php echo $_SESSION['name']; ?>
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profile/" class="btn btn-default btn-flat">My Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout/" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        
        
        </ul>
      </div>
    </nav>
  </header>
 
 <aside class="main-sidebar">
  
 
   <?php require_once '../include/sidebar.php';  ?>
   
  </aside>

  
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        My Profile
        <small>Preview</small>
      </h1>
     
    </section>

   
    <section class="content">
      <div class="row">
        <!-- left column -->
          <div class="col-md-2"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
               <?php if($message){ ?>
          	<div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Record Updated Successfully!
            </div>
            
            <?php  } ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Name">Admin Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter New Name..." name="name" value="<?php echo $_SESSION['name']; ?>" >
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter New Email..." name="email" value="<?php echo $_SESSION['email']; ?>">
                </div>             
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update Profile</button>
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
