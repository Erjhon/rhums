<?php

$server ="localhost";
$username ="root";
$password = "";
$dbname = "scheduler_db";

session_start();

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
  if (! empty($_POST['fname']) && ! empty($_POST['mname']) && ! empty($_POST['lname']) && ! empty($_POST['dob']) && ! empty($_POST['gender'])&& ! empty($_POST['age'])&& ! empty($_POST['contact'])&& ! empty($_POST['address'])&& ! empty($_POST['dattime']) && ! empty($_POST['reason'])){

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $dattime = $_POST['dattime'];
    $reason = $_POST['reason'];

    $query = "insert into client(fname,mname,lname,dob,gender,age,contact,address,dattime,reason) values ('$fname','$mname','$lname','$dob','$gender','$age','$contact','$address','$dattime','$reason')";

    $run = mysqli_query($conn,$query) or die(mysqli_connect_error());

    if($run){
      echo '<script>alert("Form submitted successfully")</script>';
    }
    else{
      echo '<script>alert("Form not submitted")</script>';
    }
  }
  else{
    echo '<script>alert("All fields are required")</script>';
  }
}

?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Medical Scheduling and Record Management for RHU II
</title>
<!-- Favicon -->
<link href="assets/img/brand/doh.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="../assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
<link href="../assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
<!-- CSS Files -->
<link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
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
          <img src="assets/img/brand/doh.png"  height="100" width="100"/>
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
            <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
            ">
        </span>
    </div>
</a>
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">Welcome!</h6>
  </div>
  <a href="pages/profile.php" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>My profile</span>
  </a>
  <a href="./examples/profile.php" class="dropdown-item">
      <i class="ni ni-settings-gear-65"></i>
      <span>Settings</span>
  </a>
  <a href="./examples/profile.php" class="dropdown-item">
      <i class="ni ni-calendar-grid-58"></i>
      <span>Activity</span>
  </a>
  <a href="./examples/profile.php" class="dropdown-item">
      <i class="ni ni-support-16"></i>
      <span>Support</span>
  </a>
  <div class="dropdown-divider"></div>
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
            <img src="../assets/img/brand/blue.png" height="100" width="100">
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
<!-- Form -->
<!-- <form class="mt-4 mb-3 d-md-none">
  <div class="input-group input-group-rounded input-group-merge">
    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <span class="fa fa-search"></span>
    </div>
</div>
</div>
</form> -->
<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link  active " href="../index.php">
      <i class="ni ni-single-02 text-green"></i> Schedule Appointment
  </a>
</li>
</ul>

<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="admin/appointments/view_details.php">
      <i class="ni ni-ruler-pencil text-green"></i> View Appointment
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Client Profile</a>
        <!-- Form -->
       <!--  <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
        </div>
    </div>
</form> -->


<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
  <li class="nav-item dropdown">
    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <span class="avatar avatar-sm rounded-circle">
          <img alt="" src="assets/img/theme/team-4-800x800.jpg">
      </span>
      <div class="media-body ml-2 d-none d-lg-block">
          <span class="mb-0 text-sm  font-weight-bold">Client <?php echo $_SESSION['id'] ?></span>
      </div>
  </div>
</a>
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
  <div class=" dropdown-header noti-title">
    <h6 class="text-overflow m-0">Welcome!</h6>
</div>
<a href="../examples/profile.html" class="dropdown-item">
    <i class="ni ni-single-02"></i>
    <span>My profile</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
    <i class="ni ni-settings-gear-65"></i>
    <span>Settings</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
    <i class="ni ni-calendar-grid-58"></i>
    <span>Activity</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
    <i class="ni ni-support-16"></i>
    <span>Support</span>
</a>
<div class="dropdown-divider"></div>
<a href="pages/logout.php" class="dropdown-item">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
</a>
</div>
</li>
</ul>
</div>
</nav>
<!-- End Navbar -->
<!-- Header -->
<div class="header pb-10 pt-10 pt-lg-7 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  
</body>

</html>