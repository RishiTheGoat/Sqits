<?php
$eventRequest = "SELECT * From `booking` where `status` = '0'";
if($resRequest = mysqli_query($conn,$eventRequest)){
$req = mysqli_num_rows($resRequest);
}else{
    $requests=0;
}

?>
    <section class="sidebar">
     
         <div class="user-panel" style="height:50px;">
      
        <div class="pull-left info">
          <p ><?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
         <br/>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="../dashboard/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>
          
         <li class="treeview">
          <a href="../profile/">
            <i class="fa fa-male"></i>
            <span>My Profile</span>
         </a>
         
        </li>
          
           <li class="treeview">
          <a href="../new-customer/">
            <i class="fa fa-male"></i>
            <span>Add Customer</span>
         </a>
         
        </li>
          
          
          <li class="treeview">
          <a href="../create-new-form/">
            <i class="fa fa-share"></i>
            <span>Create New Form</span>
         </a>
         
        </li>

         <li class="treeview">
          <a href="../all-forms/">
            <i class="fa fa-share"></i>
            <span>All Forms</span>
         </a>
         
        </li>
        

        <li class="treeview">
          <a href="../accepted-forms/">
            <i class="fa fa-share"></i>
            <span>Accepted Forms</span>
         </a>
         
        </li>

          <li class="treeview">
          <a href="../add-new-admin/">
            <i class="fa fa-share"></i>
            <span>Add New Admin</span>
         </a>
         
        </li>

         <li class="treeview">
          <a href="../all-admins/">
            <i class="fa fa-share"></i>
            <span>All Admins</span>
         </a>
         
        </li>
           
        <li class="treeview">
          <a href="../change-password/">
            <i class="fa fa-share"></i>
            <span>Change Password</span>
         </a>
         
        </li>
          
           <li class="treeview">
          <a href="../logout/">
            <i class="fa fa-circle-o text-red"></i>
            <span>Logout</span>
         </a>
         
        </li>
          
      </ul>
    </section>