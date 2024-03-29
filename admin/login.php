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

    <!-- Header -->
    <div class="header py-5 py-lg-4" style="background: linear-gradient(to bottom,rgba(23, 173, 106, 0.8),rgba(23, 173, 160, 0.8)),url(../assets/assets/img/brand/bg.webp);">
      <div class="container">
        <div class="text-center">
          <a class="" href="<?php echo base_url ?>">
            <img src="../assets/assets/img/brand/rhu.png" height="100" width="100" />
          </a>
          <a class="" href="../admin/login.php">
            <img src="../assets/assets/img/brand/doh.png" height="100" width="100" />
          </a>
        </div>
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">

              <h1 class="text-white" style="text-shadow: 2px 2px 5px black;">RURAL HEALTH UNIT II</h1>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- Page content -->
    <div class="container mt--6 pb-4">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="card bg-secondary shadow border-0">
            <div class="bg-transparent pb-1">
            </div>
            <div class="card-body px-lg-5 py-lg-4">
              <div class="text-center text-dark mb-4">
                <h1 class="text-dark">Welcome Back!</h1>
                <p class="sub-text">Login with your details to continue</p>

                <!--    <?php
                        if (isset($error)) {
                          foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                          };
                        };
                        ?> -->

              </div>

              <form id="login-frm" action="" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-user p-1"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" autofocus name="username" placeholder="Username" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-lock p-1"></span>
                    </div>
                  </div>
                  <input type="password" class="active form-control" id="input-area" name="password" placeholder="Password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="icon-area">
                        <i id="icon" class="fa fa-eye-slash" style="cursor: pointer;"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="ml-1">
                  <a href="../admin/forgot-pw.php">Forgot password?</a>
                </div>

                <div class="row">
                  <div class="col-4 ">
                  </div>
                  <div class="text-center col-4">
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Log in</button>
                  </div><br>
                  <!-- /.col -->
                </div>
                <div class="row mb-2">
                  <div class="col-12 text-center"><br>Don't have an account?
                    <a href="../patient/register.php">Create an account</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->

    <script>
      $(document).ready(function() {
        end_loader();
      })
    </script>

    <script>
      var x = document.getElementById('input-area');
      var y = document.getElementById('icon');

      y.onclick = function(){
        if(x.className == 'active form-control'){
          x.setAttribute('type', 'text');
          icon.className = 'fa fa-eye';
          x.className = 'form-control';
        }else{
          x.setAttribute('type', 'password');
          icon.className = 'fa fa-eye-slash';
          x.className = 'active form-control';
        }
      }

    </script>

    <!-- <script type="text/javascript">
    toastr.error("Account Does not exist");
  </script> -->

</body>

</html>