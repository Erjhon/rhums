<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<!-- <body class="hold-transition login-page  light-mode"> -->
  <script>
    start_loader()
  </script>


<body class="bg-neutral">
  
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
     
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
              <h1 class="text-white">Medical Appointment and Record Management System RURAL HEALTH UNIT II</h1>
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
    <div class="container mt--5 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="bg-transparent pb-5">
             
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
            <div class="card-body px-lg-5 py-lg-1">
              <div class="text-center text-dark mb-4">
               <!--  <small>Sign in with credentials</small> -->
                <h1 class="text-dark">Login</h1>

              <!--    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?> -->

              </div>
                    <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" autofocus name="username" placeholder="Username" required>
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
                      <button type="submit" name="submit" class="btn btn-primary mt-2">Log in</button>
                    </div>
                    <br>
          <!-- /.col -->
        </div>
       <div class="row mt-3">
           <!--  <div class="col-6">
              <a href="#" class="nav-link"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="../client/register.php" class="nav-link"><small>Create new account</small></a>
            </div> -->
          </div>
      </form>

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
</body>

</html>