<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Forgot Password | RHU II
  </title>
  <!-- Favicon -->
  <link href="../assets/assets/img/brand/doh.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
  <!-- Icons -->
  <link href="../assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>


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
            </div>
            <div class="card-body px-lg-5 py-lg-4">
              <div class="text-center text-dark mb-4">
                <h1 class="text-dark">Recover Password</h1>
                <p class="sub-text text-left mt-4">Enter your Mobile nuber associated with your account.</p>

              </div>

              <form id="login-frm" action="" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-envelope p-1"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" autofocus name="username" placeholder="Enter Mobile Number" required>
                </div>

                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="mt-4 mb-3 text-end">
                    <input type="submit" name="send-link" class="btn btn-primary">
                    <a href="../admin/login.php" class="btn btn-danger">Back</a>
                  </div>
                  <br>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


   <!--  <script>
      $(document).ready(function() {
        end_loader();
      })
    </script> -->




</body>

</html>