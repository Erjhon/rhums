<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    </head><?php
include '../config.php';
// session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_fname = mysqli_real_escape_string($conn, $_POST['update_fname']);
   $update_middle = mysqli_real_escape_string($conn, $_POST['update_middle']);
   $update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_dob = mysqli_real_escape_string($conn, $_POST['update_dob']);
   $update_gender = mysqli_real_escape_string($conn, $_POST['update_gender']);
   $update_contact = mysqli_real_escape_string($conn, $_POST['update_contact']);
   $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE patient SET firstname = '$update_fname', middleInitial = '$update_middle', lastname = '$update_lname', address = '$update_address', username = '$update_username', email = '$update_email', gender = '$update_gender', contact = '$update_contact', dob = '$update_dob' WHERE id = '$user_id'") or die('query failed');
   $message[] = " <script>
            Swal.fire({
                 icon: 'success',
                title: 'User successfully updated',
              toast: true,
              position:'top-end',
              showConfirmButton: false,
              timer: 5000
            })
        </script>";


   // $old_pass = $_POST['old_pass'];
   // $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   // $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   // $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   
   //    }elseif($new_pass != $confirm_pass){
   //       $message[] = '<div class="alert alert-danger text-white err_msg"> <i class="fa fa-exclamation-triangle"></i>Confirmed password not matched</div>';
   //    }else{
   //       mysqli_query($conn, "UPDATE patient SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
   //       $message[] = '<div class="alert alert-success text-white err_msg"> <i class="fa fa-check"></i> Password updated successfully </div>';
   //    }
   // }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 5000000){
         $message[] = " <script>
            Swal.fire({
                 icon: 'error',
                title: 'Image is to large',
              toast: true,
              position:'top-end',
              showConfirmButton: false,
              timer: 5000
            })
        </script>";
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE patient SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = " <script>
            Swal.fire({
                 icon: 'success',
                title: 'Image successfully updated',
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
    <ul class="nav align-items-center d-md-none">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Profile</a>
 
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
<div class="header pb-10 pt-10 pt-lg-5 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">

     <!-- Mask -->
  <span class="mask"style="background: linear-gradient(
    to bottom,rgba(0, 112, 185, 1),rgba(0, 137, 162, 0.8)"></span>

 

    <div class="container-l px-5 mt-1">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">

            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
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
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="">'.$message.'</div>';
            }
         }
      ?>
                </span>
                    <!-- Profile picture help block-->

   <form action="" method="post" enctype="multipart/form-data">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
            </div>
        </div>

        <div class="col-xl-8">

            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <div class="row gx-3 mb-3">
                        <!-- Form Group (username)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input type="username" class="form-control" name="update_username" id="username" value="<?php echo $fetch['username']; ?>" onkeyup="return userAvailability()">
                             <span id="user-availability-status1" style="font-size:12px;"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="inputEmail">Email Address</label>
                            <input class="form-control" id="email" type="email" name="update_email" value="<?php echo $fetch['email']; ?>" onkeyup="return userAvailability2()">
                             <span id="user-availability-status2" style="font-size:12px;"></span>
                        </div>
                        </div>

                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-4">
                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control" id="inputFirstName" type="text" name="update_fname" value="<?php echo $fetch['firstname']; ?>">
                            </div>
                            <!-- Form Group (middle initial)-->
                            <div class="col-md-4">
                                <label class="small mb-1" for="inputMiddleInitial">Middle Initial</label>
                                <input class="form-control" id="inputMiddleInitial" type="text" name="update_middle" value="<?php echo $fetch['middleInitial']; ?>.">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-4">
                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" id="inputLastName" type="text" name="update_lname" value="<?php echo $fetch['lastname']; ?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-4">
                                <label class="small mb-1" for="inputOrgName">Sex</label>
                                <select type="text" class="form-control form-select" name="update_gender" value="<?php echo $fetch['gender']; ?>" >
                <option hidden><?php echo $fetch['gender']; ?></option>
                <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
            </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-8">
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <!-- <input class="form-control" id="inputLocation" type="text" name="update_address" value="<?php echo $fetch['address']; ?>"> -->
                                <select class="form-control" name="update_address"  required>
                                    <option class="placeholder" style="display: none" ><?php echo $fetch['address'] ?></option>
                                    <option>Angustia, Nabua</option>
                                    <option>Antipolo Old, Nabua</option>
                                    <option>Antipolo Young, Nabua</option>
                                    <option>Aro-aldao, Nabua</option>
                                    <option>Bustrac, Nabua</option>
                                    <option>Dolorosa, Nabua</option>
                                    <option>Duran, Nabua</option>
                                    <option>Inapatan, Nabua</option>
                                    <option>La Opinion, Nabua</option>
                                    <option>La Purisima, Nabua</option>
                                    <option>Lourdes Old, Nabua</option>
                                    <option>Lourdes Young, Nabua</option>
                                    <option>Malawag, Nabua</option>
                                    <option>Paloyon Oriental, Nabua</option>
                                    <option>Paloyon Proper, Nabua</option>
                                    <option>Salvacion Que Gatos, Nabua</option>
                                    <option>San Antonio, Nabua</option>
                                    <option>San Antonio Ogbon, Nabua</option>
                                    <option>San Esteban, Nabua</option>
                                    <option>San Francisco, Nabua</option>
                                    <option>San Isidro, Nabua</option>
                                    <option>San Isidro Inapatan, Nabua</option>
                                    <option>San Jose, Nabua</option>
                                    <option>San Juan, Nabua</option>
                                    <option>San Luis, Nabua</option>
                                    <option>San Miguel, Nabua</option>
                                    <option>San Nicolas, Nabua</option>
                                    <option>San Roque, Nabua</option>
                                    <option>San Roque Madawon, Nabua</option>
                                    <option>San Roque Sagumay, Nabua</option>
                                    <option>San Vicente Gorong-Gorong, Nabua</option>
                                    <option>San Vicente Ogbon, Nabua</option>
                                    <option>Santa Barbara, Nabua</option>
                                    <option>Santa Cruz, Nabua</option>
                                    <option>Santa Elena Baras, Nabua</option>
                                    <option>Santa Lucia Baras, Nabua</option>
                                    <option>Santiago Old, Nabua</option>
                                    <option>Santiago Young, </option>
                                    <option>Santo Domingo, Nabua</option>
                                    <option>Tandaay, Nabua</option>
                                    <option>Topas Proper, Nabua</option>
                                    <option>Topas Sogod, Nabua</option>
                                </select>
                            </div>
                        </div>
                      
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Mobile Number</label>
                                <input class="form-control" id="inputPhone" type="tel" name="update_contact" maxlength="11" value="<?php echo $fetch['contact']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>

                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="date" name="update_dob" value="<?php echo $fetch['dob']; ?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                         <input type="submit" id="submit" class="btn btn-primary" value="Update" name="update_profile">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



            <!-- <input type="text" name="update_gender" value="<?php echo $fetch['gender']; ?>" class="box"> -->
         <!-- <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div> -->
 <!--   <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>

<div onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

</div>  -->    
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


<script>
  function userAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data:'username='+$("#username").val(),
      type: "POST",
      success:function(data){
        $("#user-availability-status1").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }
</script> 

<script>
  function userAvailability2() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data:'email='+$("#email").val(),
      type: "POST",
      success:function(data){
        $("#user-availability-status2").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }
</script> 




</html>
