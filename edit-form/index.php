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


$select = "SELECT * FROM customer";
$selectres = mysqli_query($conn, $select);

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $select = "SELECT * FROM form where id='$id'";
  $res = mysqli_query($conn,$select);
  $count = mysqli_num_rows($res);
  while($row = mysqli_fetch_row($res)) {
    $company_name = $row[1];
    $mob = $row[2];
    $date = $row[3];
    $time = $row[4];
    $description = $row[5];
  }
}
if(isset($_POST['submit'])){
    
    $company_name = $_POST['company_name'];
    $mob = $_POST['mob'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    $update = "UPDATE form SET company_name = '$company_name', major_bug = '$mob',
    date = '$date',
    time = '$time', description = '$description' WHERE id = '$id'";

    mysqli_query($conn,$update);
    $select = "SELECT * FROM form where id='$id'";
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
       Edit Form
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
                <a class="close" data-dismiss="alert" href="#">×</a>Form Updated Successfully!
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
                  <select class="form-control" id="company_name" name="company_name" required>
                  <option value="">None</option>
                <?php while($row = mysqli_fetch_array($selectres)){ 
                  if($row['company_name'] == $company_name){
                ?>
                  
                  <option value="<?php echo $row['company_name']; ?>" selected><?php echo $row['company_name']; ?></option> 
                <?php } else { ?>
                  <option value="<?php echo $row['company_name']; ?>" ><?php echo $row['company_name']; ?></option> 
                <?php } ?>
                <?php } ?>
                </select>
                </div>

                <div class="form-group">
                  <label for="Major">Major or Bug Fix</label><br>
                  <?php if($mob == "Major"){ ?>
                  <input type="radio" name="mob" value="Major" checked> Major<br>
                  <input type="radio" name="mob" value="Bug Fix"> Bug Fix<br>
                  <?php } else { ?>
                  <input type="radio" name="mob" value="Major" > Major<br>
                  <input type="radio" name="mob" value="Bug Fix" checked> Bug Fix<br>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>" >
                </div>

                <div class="form-group">
                  <label for="time">Time</label>
                  <input type="time" class="form-control" id="time" name="time" value="<?php echo $time; ?>" >
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description"><?php echo $description; ?>
                  </textarea>
                </div>

                
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update Form</button>
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