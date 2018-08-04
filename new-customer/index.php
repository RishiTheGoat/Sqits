<?php

require_once '../php/config.php';
session_start();
$message = false;
if(isset($_SESSION['admin']))
{
    $admin = $_SESSION['admin'];


// $select = "SELECT * FROM user WHERE user_id = '$admin'";
// $selectres = mysqli_query($conn, $select);
// $row = mysqli_fetch_array($selectres);

// $photos = array();
if(isset($_POST['submit'])){

        
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
  
    $insert = "INSERT INTO `customer`(`company_name`, `email`, `city`, `address`, `zipcode`)
     VALUES ('$company_name','$email','$city','$address','$zipcode')";
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
        Add New Customer
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
                  <label for="CompanyName">Company Name</label>
                  <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name..." name="company_name"  required>
                </div>
                

                <div class="form-group">
                  <label for="Email">Email</label>
                  <input  class="form-control" type="email" id="email" placeholder="Enter Email..." name="email" required>
                </div>

                <div class="form-group">
                  <label for="Address">Address</label>
                  <input type="text" class="form-control" id="adddress" placeholder="Enter Address..." name="address" required>
                </div>

                <div class="form-group">
                  <label for="City">City</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter City..." name="city" required>
                </div>

                <div class="form-group">
                  <label for="Zip Code">Zip Code</label>
                  <input type="text" class="form-control" id="zipcode" placeholder="Enter Zip Code..." name="zipcode" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Add Customer</button>
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