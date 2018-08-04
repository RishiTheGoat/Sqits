<?php

require_once '../php/config.php';
session_start();
$message = false;
if(isset($_SESSION['admin']))
{
    $admin = $_SESSION['admin'];


$select = "SELECT * FROM admin";
$selectres = mysqli_query($conn, $select);
//$row = mysqli_fetch_array($selectres);

// $photos = array();
if(isset($_POST['submit'])){

        
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
  
    $insert = "INSERT INTO `admin`(`name`, `email`, `password`)
     VALUES ('$name','$email','$password')";
    mysqli_query($conn,$insert); 
    
    $message = true;
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
        Add New Admin
        <!-- <small>Preview</small> -->
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
                <a class="close" data-dismiss="alert" href="#">×</a>Record Inserted Successfully!
            </div>
            
            <?php } ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..." required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email..." required>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password..." required>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Add Admin</button>
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

<script type="text/javascript">
  function countImages(){
    var images = $("input[name='photos[]']")
              .map(function(){return $(this).val();}).get();

    //var images = document.getElementById('photos').value;
    alert(images.size());
    //document.getElementById('images').innerHTML = images;
  }


</script>
</body>
</html>
<?php
}else{
    header("location:../");
}
?>
