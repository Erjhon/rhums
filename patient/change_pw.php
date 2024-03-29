<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>
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
      $message[] = " <script>
      Swal.fire({
        icon: 'error',
        title: 'Old password not matched',
        toast: true,
        position:'top-end',
        showConfirmButton: false,
        timer: 5000
        })
        </script>";
      }elseif($new_pass != $confirm_pass){
        $message[] = " <script>
        Swal.fire({
          icon: 'error',
          title: 'Confirmed password not matched',
          toast: true,
          position:'top-end',
          showConfirmButton: false,
          timer: 5000
          })
          </script>";
        }else{
          mysqli_query($conn, "UPDATE patient SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
          $message[] = " <script>
          Swal.fire({
            icon: 'success',
            title: 'Password updated successfully',
            toast: true,
            position:'top-end',
            showConfirmButton: false,
            timer: 5000
            })
            </script>";
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
<?php 
 if(isset($message)){
            foreach($message as $message){
               echo '<div class="">'.$message.'</div>';
            }
         } ?>

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
    <!-- User -->
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
       <!--  <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li> -->
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="media align-items-center">
       <!-- Profile picture image -->
<span class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  $pathx = "uploaded_img/";
                  $file = $fetch["image"];
                  ?>
                  <?php switch(true)
                  {
                    case ($fetch['image'] == (!empty($fetch['gender'])) ):
                    echo '<img src="'.$pathx.$file.'">';
                   break;
                    case ($fetch['gender'] == 'Male'):
                    echo '<img src="images/male.png"/>';
                    break;
                    case ($fetch['gender'] == 'Female'):
                    echo '<img src="images/female.png"/>';
                    break;
                  } 
      ?>
                </span>
    </div>
</a>
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h5 class="text-overflow m-0"><?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></h5>
  </div>
  <div class="dropdown-divider"></div>
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
<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
      <div class="row">
        <div class="col-6 collapse-brand">
          <a href="./index.php">
              <img src="../assets/assets/img/brand/rhu.png"  height="60" width="40"/>
        </a>
    </div>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">CHANGE PASSWORD</a>
 
<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
  <li class="nav-item dropdown">
    <a class="nav-lin658k pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
          <!-- Profile picture image -->
<span class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  $pathx = "uploaded_img/";
                  $file = $fetch["image"];
                  ?>
                  <?php switch(true)
                  {
                    case ($fetch['image'] == (!empty($fetch['gender'])) ):
                    echo '<img src="'.$pathx.$file.'">';
                   break;
                    case ($fetch['gender'] == 'Male'):
                    echo '<img src="images/male.png"/>';
                    break;
                    case ($fetch['gender'] == 'Female'):
                    echo '<img src="images/female.png"/>';
                    break;
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
          <div class="container header pb-12 d-flex align-items-center" style="min-height: 610px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">

            <!-- Mask -->
            <span class="mask"style="background: linear-gradient(
            to bottom,rgba(0, 112, 185, 1),rgba(0, 137, 162, 0.8)"></span>


            <div class=" col-xl-8 col-ml-5">
              <!-- Change password card-->
              <div class="card mt-5">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  ?>

                  <form action="" method="post">
                   
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                      <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                      <label class="small mb-1 required" for="inputUsername">Old Password</label>               
                       <div class="input-group input-group-alternative mb--1">
                        <input class="form-control" type="password" id="update_pass" name="update_pass" placeholder="Enter old password" required>
                         <span class="input-group-text">
                          <i class="fa fa-eye" id="hide" onclick="myFunction()"></i>
                            <i class="fa fa-eye-slash" id="show" onclick="myFunction()"></i>
                        </span>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="small mb-1 required" for="inputUsername">New Password</label>
                      <div class="input-group input-group-alternative mb--1">
                        <input class="form-control" id="password" type="password" name="new_pass" placeholder="Enter new password" onkeyup="validatePassword()" required>
                        <span class="input-group-text">
                          <i class="fa fa-eye" id="hide1" onclick="myFunction1()"></i>
                            <i class="fa fa-eye-slash" id="show1" onclick="myFunction1()"></i>
                        </span>
                      </div>
                      <span id="validatePassword1" style="font-size:12px;"></span>
                    </div>

                    <div class="mb-3">
                      <label class="small mb-1 required" for="inputUsername">Confirm Password</label>
                      <div class="input-group input-group-alternative mb--1">
                        <input class="form-control" id="cpassword" type="password" name="confirm_pass" placeholder="Confirm new password" required>
                        <span class="input-group-text">
                          <i class="fa fa-eye" id="hide2" onclick="myFunction2()"></i>
                            <i class="fa fa-eye-slash" id="show2" onclick="myFunction2()"></i>
                        </span>
                      </div>
                    </div>
                    <!-- Save changes button-->
                    <input type="submit" id="submit" class="btn btn-primary" value="Update" name="change_pw">
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
<style>
  .avatar--default {
    position: relative;
    overflow: hidden;
    width: 50px;
    height: 50px;
    margin: auto;

  }
  .avatar--default::before {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    width: 70%;
    height: 44%;
    margin: 0 0 0 -35%;
    border-radius: 100% 100% 0 0;
  }
  .avatar--default::after {
    content: "";
    position: absolute;
    left: 50%;
    top: 19%;
    width: 40%;
    height: 40%;
    margin: 0 0 0 -20%;
    border-radius: 50%;
  }
  .required::after{
      content: " *";
      color: red;
      font-size: 13px;
    }
  #hide{
      display: none;
      cursor: pointer;
  }
  #show{
      cursor: pointer;
  }
  #hide1{
      display: none;
      cursor: pointer;
  }
  #show1{
      cursor: pointer;
  }
  #hide2{
      display: none;
      cursor: pointer;
  }
  #show2{
      cursor: pointer;
  }
</style>        

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

<!-- show password -->
<script>
  function myFunction() {
    var x = document.getElementById("update_pass");
    if (x.type == "password"){
      x.type = "text";
      document.getElementById('hide').style.display = "inline-block";
      document.getElementById('show').style.display = "none";
    }else{
      x.type = "password";
      document.getElementById('hide').style.display = "none";
      document.getElementById('show').style.display = "inline-block";
    }
  }

  function myFunction1() {
    var y = document.getElementById("password");
    if (y.type == "password"){
      y.type = "text";
      document.getElementById('hide1').style.display = "inline-block";
      document.getElementById('show1').style.display = "none";
    }else{
      y.type = "password";
      document.getElementById('hide1').style.display = "none";
      document.getElementById('show1').style.display = "inline-block";
    }
  }
  function myFunction2() {
    var a = document.getElementById("cpassword");
    if (a.type == "password"){
      a.type = "text";
      document.getElementById('hide2').style.display = "inline-block";
      document.getElementById('show2').style.display = "none";
    }else{
      a.type = "password";
      document.getElementById('hide2').style.display = "none";
      document.getElementById('show2').style.display = "inline-block";
    }
  }

  function validatePassword() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'password='+$("#password").val(),
        type: "POST",
        success:function(data){
            $("#validatePassword1").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
  }
</script>

<script type="text/javascript">
    var SessionTimeOut = 180; //3 minutes
    var sessionSecondsTimer = null;
    var sessionSecondsCounter = 0;
    document.onclick = function () { sessionSecondsCounter = 0; };
    document.onmousemove = function () { sessionSecondsCounter = 0; };
    document.onkeypress = function () { sessionSecondsCounter = 0; };
    sessionSecondsTimer = window.setInterval(CheckSessionTime, 1000);

    function CheckSessionTime() {
        sessionSecondsCounter++;
        var oPanel = document.getElementById("timeOut");
        if (oPanel) {
            oPanel.innerHTML = (SessionTimeOut - sessionSecondsCounter);
        }
        if (sessionSecondsCounter >= SessionTimeOut) {
            window.clearInterval(sessionSecondsTimer);
            alert("Your session has expired. Please login again.");
            window.location = "../admin/login.php";
        }
    }
</script>

</html>