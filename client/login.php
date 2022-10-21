<?php

@include '../config.php';

// session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM patients WHERE email = '$email' && password = '$password' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'staff'){

         $_SESSION['id'] = $row['email'];
         header('location:index.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['id'] = $row['email'];
         header('location:../index.php');

      }
     
   }else{

    // Display the alert box 
  
      $error[] = "";


   }

};
?>
<!DOCTYPE html>
<html lang="en">
  <script>
    start_loader()
  </script>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Medical Scheduling and Record Management for RHU II
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
</head>

<body class="bg-neutral">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <!-- <a href="../index.html">
                  <img src="../assets/img/brand/blue.png">
                </a> -->
                
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
         
           <!--  <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/profile.html">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-inner--text">Profile</span>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
     <!-- Header -->
    <div class="header py-8 py-lg-3" style="background: linear-gradient(
    to bottom,rgba(23, 173, 106, 0.8),rgba(23, 173, 160, 0.8)),url(../assets/assets/img/brand/bg.jpg);">
      
      <div class="container">
        <div class="text-center">
          <a class="" href="../client/login.php">
          <img src="../assets/assets/img/brand/rhu.png"  height="100" width="100"/>
        </a> 
        <a class="" href="../admin/login.php">
          <img src="../assets/assets/img/brand/doh.png"  height="100" width="100"/>
        </a>
        </div>
        <!--  <div class="text-white text-center mt-2 mb--3"><small class="display-4">Medical Appointment and Record Management for RHU II
</small></div> -->
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-1">
              <h1 class="text-white">RURAL HEALTH UNIT II</h1>
             <!--  <p class="text-lead text-black">Use these awesome forms to login or create new account in your project for free.</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-neutral" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--6 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="card bg-secondary shadow border-0">
            <div class="bg-transparent pb-1">
              <!-- <div class="text-muted text-center mt-2 mb-3"><small class="display-4">Log In</small></div> -->
              <!-- <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div> -->
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-dark mb-4">
               <!--  <small>Sign in with credentials</small> -->
                <h1 class="text-dark">Patient Login</h1>

                 <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div class="alert alert-danger text-white err_msg"><i class="fa fa-exclamation-triangle"></i> Incorrect username or password'.$error.'</div>';
         };
      };
      ?>
      
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      

              </div>
                        <form id="loginp-frm" role="form" action="" method="post">

        <div class="input-group mb-3">
          <input type="text" class="form-control" autofocus name="email" autofocus placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         <!--  <div class="col-8">
            <a href="<?php echo base_url ?>">Go to Website</a>
          </div> -->
          <!-- /.col -->


          <div class="col-4 ">
            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
          </div> 
          <div class="text-center col-4">
                      <button type="submit" name="submit" class="btn btn-primary mt-2">
                        Log in
                      </button>
                    </div>
                    <br>

          <!-- /.col -->
        </div>
           <div class="row mt-2">
          <!--   <div class="col-6">
              <a href="forgot.php" class="nav-link"><small>Forgot password?</small></a>
            </div> -->

                         <div class="col-12 text-center">
                          <br>
          Don't have an account yet? <a href="register.php"><small>Create an account</small></a>
          </div>
          </div>
      </form>
           <!--    <form action="" method="POST" role="form">
                <div class="form-group mb-3">
                   <h4 class="text-dark">Username</h4>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Username" type="username">
                  </div>
                </div>
                <div class="form-group">
                     <h4 class="text-dark">Password</h4>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-dark">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Foooter -->
  <!--   <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-dark">
              © 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Team Fraxinus</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Team Fraxinuss</a>
              </li>
              <!-- <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script> 

  <!--   Core   -->
  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>