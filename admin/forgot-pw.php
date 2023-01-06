<?php require_once('../config.php') ?>

<?php
$error = array();

require "mail.php";

  if(!$conn = mysqli_connect("localhost","root","","scheduler_db")){

    die("could not connect");
  }

  $mode = "enter_email";
  if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
  }

  //something is posted
  if(count($_POST) > 0){

    switch ($mode) {
      case 'enter_email':
        // code...
        $email = $_POST['email'];
        //validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $error[] = "Please enter a valid email";
        }elseif(!valid_email($email)){
          $error[] = "That email was not found";
        }else{

          $_SESSION['forgot']['email'] = $email;
          send_email($email);
          header("Location: forgot-pw.php?mode=enter_code");
          die;
        }
        break;

      case 'enter_code':
        // code...
        $code = $_POST['code'];
        $result = is_code_correct($code);

        if($result == "the code is correct"){

          $_SESSION['forgot']['code'] = $code;
          header("Location: forgot-pw.php?mode=enter_password");
          die;
        }else{
          $error[] = $result;
        }
        break;

      case 'enter_password':
        // code...
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password !== $password2){
          $error[] = "Passwords do not match";
        }elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
          header("Location: forgot-pw.php");
          die;
        }else{
          
          save_password($password);
          if(isset($_SESSION['forgot'])){
            unset($_SESSION['forgot']);
          }

          header("Location: login.php");
          die;
        }
        break;
      
      default:
        // code...
        break;
    }
  }

  function send_email($email){
    
    global $conn;

    $expire = time() + (60 * 1);
    $code = rand(10000,99999);
    $email = addslashes($email);

    $query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
    mysqli_query($conn,$query);

    //send email here
    send_mail($email,'Password reset',"To reset your password, you have to enter this verification code: " . $code);
  }
  
  function save_password($password){
    
    global $conn;

    $password = md5($password);
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "update users set password = '$password' where email = '$email' limit 1";
    mysqli_query($conn,$query);

    $query2 = "update patient set password = '$password' where email = '$email' limit 1";
    mysqli_query($conn,$query2);

  }
  
  function valid_email($email){
    global $conn;

    $email = addslashes($email);

    $query = "select * from users where email = email limit 1";    
    $query2 = "select * from patient where email = '$email' limit 1";    
    $result = mysqli_query($conn,$query);
    $result2 = mysqli_query($conn,$query2);
    if($result){
      if(mysqli_num_rows($result) > 0)
      {
        return true;
      }
    }

    return false;

    if($result2){
      if(mysqli_num_rows($result2) > 0)
      {
        return true;
      }
    }

    return false;

  }

  function is_code_correct($code){
    global $conn;

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
    $result = mysqli_query($conn,$query);
    if($result){
      if(mysqli_num_rows($result) > 0)
      {
        $row = mysqli_fetch_assoc($result);
        if($row['expire'] > $expire){

          return "the code is correct";
        }else{
          return "the code is expired";
        }
      }else{
        return "the code is incorrect";
      }
    }

    return "the code is incorrect";
  }

  
?>


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
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');


*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}
  </style>
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

   

    <?php 

      switch ($mode) {
        case 'enter_email':
          // code...
          ?>
            <form method="post" action="forgot-pw.php?mode=enter_email"> 
               <div class="container mt--6 pb-5">
                <div class="row justify-content-center">
                  <div class="col-lg-5 col-md-6">
                    <div class="card bg-secondary shadow border-0">
                      <div class="bg-transparent pb-1">
                      </div>
                      <div class="card-body px-lg-5 py-lg-4">
                        <div class="text-center text-dark mb-4">
                          <h1 class="text-dark">Recover Password</h1>
                          <!-- <h1>Forgot Password</h1> -->
                          <p class="sub-text text-left mt-4">Enter your email associated with your account.</p>
                          <span style="font-size: 12px;color:red;">
                          <?php 
                            foreach ($error as $err) {
                              // code...
                              echo $err . "<br>";
                            }
                          ?>
                          </span>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <span class="fas fa-envelope p-1"></span>
                            </div>
                          </div>
                          <input type="email" class="form-control" autofocus name="email" placeholder="Enter Email">
                        </div>
                          <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="mt-4 mb-3 text-end">
                              <a href="../admin/login.php" class="btn btn-danger">Back</a>
                              <input type="submit" value="Next" class="btn btn-primary">
                            </div>
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                      <?php  

                      break;


                    case 'enter_code':
                      // code...
                      ?>
                        <form method="post" action="forgot-pw.php?mode=enter_code"> 
                          <div class="container mt--6 pb-5">
                            <div class="row justify-content-center">
                              <div class="col-lg-5 col-md-6">
                                <div class="card bg-secondary shadow border-0">
                                  <div class="bg-transparent pb-1">
                                  </div>
                                  <div class="card-body px-lg-5 py-lg-4">
                                    <div class="text-center text-dark mb-4">
                                      <h1 class="text-dark">Recover Password</h1>
                                      <p class="sub-text text-left mt-4">Enter the code sent to your email.</p>
                                      <span style="font-size: 12px;color:red;">
                                      <?php 
                                        foreach ($error as $err) {
                                          // code...
                                          echo $err . "<br>";
                                        }
                                      ?>
                                      </span>
                                    </div>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <span class="fas fa-envelope p-1"></span>
                                        </div>
                                      </div>
                                      <input type="text" class="form-control" name="code" placeholder="12345" required>
                                    </div>
                                      <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="mt-4 mb-3 ml-9 text-end">
                                          <a href="forgot-pw.php" class="btn btn-danger">Start Over</a>
                                          <input type="submit" value="Next" class="btn btn-primary">
                                        </div>
                                      </div>
                                        <div class="ml-1">
                                          <a href="../admin/login.php">Login</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                                  <?php
                                  break;

                                case 'enter_password':
                                  // code...
                                  ?>
                                    <form method="post" action="forgot-pw.php?mode=enter_password"> 
                                      <div class="container mt--6 pb-5">
                                        <div class="row justify-content-center">
                                          <div class="col-lg-5 col-md-6">
                                            <div class="card bg-secondary shadow border-0">
                                              <div class="bg-transparent pb-1">
                                              </div>
                                              <div class="card-body px-lg-5 py-lg-4">
                                                <div class="text-center text-dark mb-4">
                                                  <h1 class="text-dark">Recover Password</h1>
                                                  <p class="sub-text text-left mt-3">Enter your new password.</p>
                                                  <span style="font-size: 12px;color:red;">
                                                  <?php 
                                                    foreach ($error as $err) {
                                                      // code...
                                                      echo $err . "<br>";
                                                    }
                                                  ?>
                                                  </span>
                                                  </div>
                                                  <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                        <span class="fas fa-lock p-1"></span>
                                                      </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="password" placeholder="Password" required>
                                                  </div>

                                                  <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                        <span class="fas fa-lock p-1"></span>
                                                      </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="password2" placeholder="Retype Password" required>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-6">
                                                    </div>
                                                    <div class="mt-4 mb-3 ml-8 text-end">
                                                      <a href="forgot-pw.php" class="btn btn-danger">Start Over</a>
                                                      <input type="submit" value="Submit" class="btn btn-primary">
                                                    </div>
                                                  </div>
                                                    <div class="ml-1">
                                                      <a href="../admin/login.php">Login</a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                              <?php
                                              break;
                                            
                                            default:
                                              // code...
                                              break;
                                          }

                                        ?>



</body>

</html>