<?php

include '../config.php';
// session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['change_pw'])){

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = '<div class="alert alert-danger text-white err_msg"> <i class="fa fa-exclamation-triangle"></i>Old password not matched</div>';
      }elseif($new_pass != $confirm_pass){
         $message[] = '<div class="alert alert-danger text-white err_msg"> <i class="fa fa-exclamation-triangle"></i>Confirmed password not matched</div>';
      }else{
         mysqli_query($conn, "UPDATE patient SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = '<div class="alert alert-success text-white err_msg"> <i class="fa fa-check"></i> Password updated successfully </div>';
      }
   }
}

?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
      <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    RURAL HEALTH UNIT II
</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Favicon -->
<link href="../assets/assets/img/brand/doh.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="../assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
<link href="../assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
<!-- CSS Files -->
<link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<style>
#selectAll{
   top:0
}
</style>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-img text-center">
          <img src="../assets/assets/img/brand/rhu.png"  height="100" width="100"/>
        </a>
<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
      <div class="row">
    <div class="col-6 collapse-close">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
        <span></span>
        <span></span>
    </button>
</div>
</div>
</div>

<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="../dashboard.php">
      <i class="ni ni-single-02 text-green"></i> Schedule Appointment
  </a>
</li>
</ul>

<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="view.php">
      <i class="ni ni-ruler-pencil text-blue"></i> View Appointment
  </a>
</li>
</ul>

</div>
</div>
</nav>
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Change Password</a>
 
<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
  <li class="nav-item dropdown">
    <a class="nav-lin658k pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <span class="avatar avatar-sm rounded-circle">
              <?php
         $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../patient/images/default-avatar.png">';
         }else{
            echo '<img src="../patient/uploaded_img/'.$fetch['image'].'">';
         }
      ?>

      </span>
      <div class="media-body ml-2 d-none d-lg-block">
          <span class="mb-0 text-sm text-white  font-weight-bold"> <?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></span>
      </div>
  </div>
</a>
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
  <div class=" dropdown-header noti-title">
    <h6 class="text-overflow m-0">Welcome!</h6>
</div>
<a href="../patient/update_profile.php" class="dropdown-item">
    <i class="ni ni-single-02"></i>
    <span>My profile</span>
</a>
<a href="../patient/change_pw.php" class="dropdown-item">
    <i class="ni ni-lock-circle-open"></i>
    <span>Change Password</span>
</a>

<div class="dropdown-divider"></div>
 <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="dropdown-item">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
</a>
</div>
</li>
</ul>
</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ready to Leave?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a type="button" class="btn btn-primary" href="logout.php?logout=<?php echo $user_id;?>" >Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- End Navbar -->
<!-- Header -->
<div class="header pb-10 pt-10 pt-lg-5 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">

     <!-- Mask -->
  <span class="mask"style="background: linear-gradient(
    to bottom,rgba(0, 112, 185, 1),rgba(0, 137, 162, 0.8)"></span>

  <!-- Header container -->
    <div class="container px-10 px-lg-6 my-2">
        <div class="card card-outline">
            <div class="card-header">
                <h2 class="card-title">Change Password</h2>
           </div>

    <div class="update-profile ">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post">
      <?php
         // if($fetch['image'] == ''){
         //    echo '<div ><img src="images/default-avatar.png"></div>';
         // }else{
         //    echo '<div><img src="uploaded_img/'.$fetch['image'].'"></div>';
         // }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="">'.$message.'</div>';
            }
         }
      ?> 
      <div class="flex mt-4">
         <div class="inputBox w-100" style="margin-bottom: 10px">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Current Password:</span>
            <input type="password" name="update_pass" placeholder="Enter current password" class="box">
            <span>New Password:</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm Password:</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
      <div class="form-group text-center w-100 form-group" style="margin-top: 35px">
        <input type="submit" class="btn btn-primary" value="Update" name="change_pw">
      </div>
         </div>
      </div>
      
   </form>
</div>
</div>
</div>
</div>
</div>
 <!--   <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>

<div onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

</div>  -->            

</body>


<!--   Core   -->
<script src="../assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="../assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<script src="../assets/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!--   Argon JS   -->
<script src="../assets/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
    });
</script>
</html>