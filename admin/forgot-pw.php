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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.js" integrity="sha512-NMtENEqUQ8zHZWjwLg6/1FmcTWwRS2T5f487CCbQB3pQwouZfbrQfylryimT3XvQnpE7ctEKoZgQOAkWkCW/vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

              <form id="login-frm" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-envelope p-1"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" autofocus name="username" id="number" placeholder="Enter Mobile Number" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-envelope p-1"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" autofocus name="username" id="password" placeholder="Enter New Password" required disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-envelope p-1"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" autofocus name="username" id="OTP" placeholder="Enter OTP" required disabled>
                </div>
                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="mt-4 mb-3 text-end">
                    <input type="submit" name="verify" class="btn btn-primary verify" value="Verify number">
                    <input type="button" name="update" class="btn btn-primary d-none" id="update" value="Update"> 
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


    <script>
      $(document).ready(function() {
        $('.verify').click(function (e) { 
          e.preventDefault();

          const base_url = "<?= base_url?>" //base url?

          let number = $('#number').val()
          const verify = 'verify'
          
          $.ajax({
            type: "POST",
            url: 'ForgotPassModel.php', //should send data here
            data: {verify, number},
            dataType: "json",
            success: (response) => {
              console.log(response);

              if(response.code == 200) {
                //disabled number input field
                $('#number').attr('readonly', true)

                //then enable the password and otp field
                $('#password').removeAttr('disabled')
                $('#OTP').removeAttr('disabled')

                //hide the verify button
                $(this).addClass('d-none')

                //show update button
                $('#update').removeClass('d-none')
                
                alert('OTP send to your number')

                return
              }

              console.log(response.code)
              //else no data found
              alert('no data found')
            }
          });
        });

        $('#update').click(function (e) { 
          e.preventDefault();
          let number = $('#number').val()
          let password = $('#password').val()
          let otp = $('#OTP').val()
          const verify = 'update'

          $.ajax({
            type: "POST",
            url: "ForgotPassModel.php",
            data: {
              number: number,
              password: password,
              otp: otp,
              action: verify
            },
            dataType: "dataType",
            success: function (response) {
              if (response.code == 500){
                alert('Number is null')
              }
              else if(response.code == 300){
                alert(response.message)
              }
              else if (response.code == 200){
                window.location.href = 'http://localhost/rhums/admin/login.php'
              }
              else{
                alert('something is wrong')
              }
            }
          });
        });
      })
    </script>




</body>

</html>