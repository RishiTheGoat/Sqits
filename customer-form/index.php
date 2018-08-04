<?php

require_once '../php/config.php';
session_start();
$message = false;
if(isset($_SESSION['admin']))
{
    $admin = $_SESSION['admin'];
}
$form_id = 0;
$select = "SELECT * FROM customer";
$selectres = mysqli_query($conn, $select);
//$row = mysqli_fetch_array($selectres);
if(isset($_GET['form_id']) && isset($_GET['company_id'])){
  $form_id = $_GET['form_id'];
  $select = "SELECT * FROM form WHERE id='$form_id'";
  $form_res = mysqli_query($conn, $select);
  while ($row = mysqli_fetch_array($form_res)) {
    $company_name = $row['company_name'];
    $type = $row['major_bug'];
    $description = $row['description'];
    $is_accepted = $row['accept'];
    $accepted_by = $row['accepted_by'];
    $sig = $row['accepted_by_sig'];
  }
  $company_id = $_GET['company_id'];

}
// $photos = array();
if(isset($_POST['submit']) && !$is_accepted){
    date_default_timezone_set('Europe/Amsterdam');
    $accepted_date = date("Y-m-d");
    $accepted_time = $_POST['time'];
    $accepted_by = $_POST['name'];
    $accepted = $_POST['accept'];
    $update = "UPDATE `form` SET `accept`='$accepted',`accept_date`='$accepted_date',`accept_time`='$accepted_time',`accepted_by`='$accepted_by' WHERE id = '$form_id'";

    mysqli_query($conn,$update);
    $message = true;
      
    $select = "SELECT * FROM form WHERE id='$form_id'";
    $form_res = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($form_res)) {
      $company_name = $row['company_name'];
      $type = $row['major_bug'];
      $description = $row['description'];
      $is_accepted = $row['accept'];
      $accepted_by = $row['accepted_by'];
      $sig = $row['accepted_by_sig'];
      
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


  
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Customer Form
        <small>Please accept and sign this form!</small>
      </h1>
     
    </section>

   
    <section class="content">
      <div class="row">
        <!-- left column -->
          <div class="col-md-2"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
               <?php 
               //if($is_accepted && $sig != null){ 
                if($is_accepted){ 
                ?>
          	<div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Form is accepted, thank you!
            </div>
            
            <?php } ?>
            <div class="box-header with-border">
              <h3 class="box-title"> Form Data</h3>
            </div>


            <div class="box-header with-border">
              <div class="form-group" style="align-content: center;">
                  <label for="name">Company Name:   </label><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$company_name; ?><br>
                </div>

                <div class="form-group" style="align-content: center;">
                  <label for="tyoe">Type:   </label><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$type; ?><br>
                </div>

                <div class="form-group" style="align-content: center;">
                  <label for="description">Description:   </label><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$description; ?><br>
                </div>

                <?php if($is_accepted && $accepted_by != null){ ?>
                <div class="form-group">
                  <input type="checkbox" name="accept" value="1" checked disabled>
                  <label for="accept">Do you accept this form?</label><br>
                </div>

                <div class="form-group">
                  <label for="accepted by">Accepted By ( Name ):   </label> <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$accepted_by; ?><br>
                </div>

                <?php if($is_accepted && $sig != null){ ?>
                <div class="form-group">
                  <img src="<?php echo "$sig"; ?>" width="300" height="100">
                </div>

                <?php } }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
               

            <?php if(!$is_accepted && $accepted_by == null){ ?>   
          
            <form role="form" method="post" enctype="multipart/form-data" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">

                <h3>Please Accept and Submit Form!</h3>
              

                <div class="form-group">
                  <input type="checkbox" name="accept" value="1" required>
                  <label for="accept">Do you accept this form?</label><br>
                </div>

                <div class="form-group">
                  <label for="accepted by">Accepted By ( Name )</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" onclick="getTime()">Accept Form</button>
              </div>

              <input type="hidden" id="time" name="time">
            </form>
            <?php } ?>

            <?php if($is_accepted && $sig != null){?>
            <div class="box-body">
            <div class="box-header with-border">
                <div class="form-group" style="align-content: center;">
                    <iframe style="width: 100%; height: 500px;" src="./my_sign.php?form_id=<?php echo $form_id; ?>"></iframe>
                </div>

              </div>
            </div>
            <?php } ?>
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
  function getTime(){
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    document.getElementById("time").value = hours + ":" + minutes;
  }
  
</script>
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
