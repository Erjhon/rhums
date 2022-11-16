<?php

include '../config.php';
//session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:login.php');
}


if (isset($_GET['id'])) {  
  $id = $_GET['id'];  
  $query = "DELETE FROM `appointments` WHERE id = '$id'";  
  $run = mysqli_query($conn,$query);  
  if ($run) {  
    header('location:view.php');  
  }else{  
    echo "Error: ".mysqli_error($conn);  
  }  
} 


$query = "select * from appointments";  
$run = mysqli_query($conn,$query); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    RURAL HEALTH UNIT II
  </title>

  <!-- Favicon -->
  <link href="../assets/assets/img/brand/doh.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />

  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-img text-center" href="../index.php">
        <img src="../assets/assets/img/brand/rhu.png" height="100" width="100" />
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
      <span class="avatar avatar-sm rounded-circle">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
          $fetch = mysqli_fetch_assoc($select);
        }
        if ($fetch['image'] == '') {
          echo '<img src="../patient/images/default-avatar.png">';
        } else {
          echo '<img src="../patient/uploaded_img/' . $fetch['image'] . '">';
        }
        ?>

      </span>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h5 class="text-overflow m-0"><?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?>!</h5>
    </div>
    <div class="dropdown-divider"></div>
    <a href="patient/update_profile.php" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>My profile</span>
    </a>
    <a href="pages/logout.php" class="dropdown-item">
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
          <img src="../assets/assets/img/brand/rhu.png" height="60" width="40" />
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
      <a class="nav-link bg-blue " href="view.php">
        <i class="ni ni-ruler-pencil text-white"></i> View Appointment
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
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">APPOINTMENT</a>

      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-lin658k pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <?php
                $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                  $fetch = mysqli_fetch_assoc($select);
                }
                if ($fetch['image'] == '') {
                  echo '<img src="../patient/images/default-avatar.png">';
                } else {
                  echo '<img src="../patient/uploaded_img/' . $fetch['image'] . '">';
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
          <a type="button" class="btn btn-primary" href="logout.php?logout=<?php echo $user_id; ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Navbar -->
  <!-- Header -->
  <div class="header pb-10 pt-10 pt-lg-4 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask" style="background: linear-gradient(
      to bottom,rgba(0, 112, 185, 1),rgba(0, 137, 162, 0.8))"></span>
      <!-- Header container -->
      <div class="container px-10 px-lg-5 my-7">
        <div class="card card-outline">
          <div class="card-header">
            <h2 class="card-title">View Appointments</h2>
          </div>

          <div class="card-body">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-stripped" id="indi-list">

                      <tr class="text-center">
                        <th>PATIENT ID</th>
                        <th>REASON FOR APPOINTMENT</th>
                        <th>SCHEDULE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        <!-- <th>ACTION</th> -->
                      </tr>

                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM appointments WHERE `p_id` = {$user_id}");
                      ?>        
                        <?php if (mysqli_num_rows($result) > 0) { ?>
                            <?php $i = 0; 
                              while ($row = mysqli_fetch_array($result)) { ?>

                              <tr class="text-center">
                                <td><b>PA-<?php echo $row["patient_id"]; ?></td>
                                  <td><?php echo $row["reason"]; ?></td>
                                  <td><?php echo date('F d, Y H:i A', strtotime($row["date_sched"])); ?></td>
                                  <td class="text-center">
                                    <?php
                                    switch ($row['status']) {
                                      case (0):
                                      echo '<span class="badge badge-primary">Done</span>';
                                      break;
                                      case (1):
                                      echo '<span class="badge badge-success">Confirmed</span>';
                                      break;
                                      case (2):
                                      echo '<span class="badge badge-danger">Cancelled</span>';
                                      break;
                                      default:
                                      echo '<span class="badge badge-secondary">NA</span>';
                                    }
                                    ?>
                                  </td>
                                  <td align="center">
                                    <button class="btn btn-flat btn-danger btn-sm"><a class="text-white" href="javascript:void(0)" href="view.php?id= <?php echo $row['id'] ?>" id='btn' onClick="return confirm('Are you sure you want to cancel this appointment?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                    </button>
                                  </td>
<!--   <td align="center">
<button id="delete" class="btn btn-flat btn-danger btn-sm"><a class="text-white" href="#cancel" data-toggle="modal" data-target="#cancel" id='btn_delete' >Cancel appointment</a>
</button>
</td> -->
</tr>
<?php
$i++;
}
?>
<?php
} else {
  echo '<div class=" text-center alert-primary text-white"><i class="fa fa-exclamation-triangle"> </i> No Results Found</div>';
}
?>


<div class="sidebar-overlay" data-reff=""></div>
</tbody>
</table>
</div>

<!--   Core   -->
<script src="../assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="../assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<script src="../assets/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!--   Argon JS   -->
<script src="../assets/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

</body>
</html>