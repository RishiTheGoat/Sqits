<?php

require_once '../php/config.php';
$email_sent = 0;
if(isset($_GET['email_sent'])){
  $email_sent = $_GET['email_sent'];
}
session_start();
if(isset($_SESSION['admin'])){
    $no=1;
    
    $message = false;
    $del_msg = false;
   $select = "SELECT * FROM form";
   $res = mysqli_query($conn,$select);
    $count = mysqli_num_rows($res);
    if(isset($_GET['del'])){
      $del = $_GET['del'];

      $query = "DELETE FROM form WHERE id='$del'";
      mysqli_query($conn,$query);
      
      $del_msg = true;
      $select = "SELECT * FROM form";
      $res = mysqli_query($conn,$select);
    }

    if(isset($_GET['form_id']) && isset($_GET['company_name']) && $_GET['send']){
    $form_id = $_GET['form_id'];
    $company_name = $_GET['company_name'];
    $select = "SELECT * FROM customer WHERE company_name='$company_name'";
    $res = mysqli_query($conn,$select);
    while($row = mysqli_fetch_array($res)){
      $company_id = $row['id'];
      $company_email = $row['email'];
    }
    $url = "http://karansorey.toorsol.com/customer-form/?form_id=".$form_id."&company_id=".$company_id."&company_name=".$company_name."&company_email=".$company_email;
    $to = $company_email;
    $subject = "Open inside link to sign form!";
      $message = "
      <html>
      <head>
      <title>Form to Be Signed!</title>
      </head>
      <body>
      <p>Please click below URL to open the form and sign it!</p>
      <a href='".$url."'>Click link to sign form</a>
      </body>
      </html>
      ";
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <webmaster@example.com>' . "\r\n";
      $headers .= 'Cc: myboss@example.com' . "\r\n";

      mail($to,$subject,$message,$headers);
      header("location: ../all-forms/index.php?email_sent=1");
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
        All Forms    
        <!-- <small>All Companies</small> -->
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
                <a class="close" data-dismiss="alert" href="#">×</a>Form Deleted Successfully!
            </div>

            <?php }
            if($email_sent){ ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Email sent to customer!
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
                  <th>Type</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Description</th>
                   <th>Accepted Date</th>
                   <th>Accepted Time</th>
                   <th>Accepted By</th>
                   <th>Accepted Signature</th>
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
               <?php while($row = mysqli_fetch_array($res)) {
                    $id = $row['id']; ?>

                    <tr>
                  
                        
                  <td><?php echo $no++;  ?></td>
                  <td><?php echo $row['company_name'];  ?></td>
                    <td><?php echo $row['major_bug'];  ?></td>
                    <td><?php echo $row['date'];  ?></td>
                    <td><?php echo $row['time'];  ?></td>
                  <td><?php echo $row['description'];  ?></td>
                  <td><?php echo ($row['accept'] == 0 ? "N/A" : $row['accept_date']);  ?></td>
                  <td><?php echo ($row['accept'] == 0 ? "N/A" : $row['accept_time']);  ?></td>
                  <td><?php echo ($row['accept'] == 0 ? "N/A" : $row['accepted_by']);  ?></td>
                  <td><?php echo ($row['accepted_by_sig'] == null ? '<img src="../sig-img/temp.png" width=80 height=40>' : '<img src="../customer-form/'.$row['accepted_by_sig'].'"width=80 height=40>');  ?></td>
                    <td><?php echo "<a class='btn btn-primary' href='index.php?del=".$id."'>Delete</a>";  ?>
                      <br>
                      <br>
                      <a class="btn btn-primary" href="../edit-form/?id=<?php echo $row['id']; ?>">Edit</a>
                      <br>
                      <br>
                      <?php echo "<a class='btn btn-primary' href='index.php?send=1&form_id=".$id."&company_name=".$row['company_name']."'>Send Email</a>";  ?> 
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
