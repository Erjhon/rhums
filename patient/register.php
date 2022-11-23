<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>
<?php
include 'config.php';

if(isset($_POST['submit'])){

  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'uploaded_img/'.$image;

  $select = mysqli_query($conn, "SELECT * FROM `patient` WHERE username = '$username' AND password = '$pass'") or die('query failed');

  if(mysqli_num_rows($select) > 0){
// $message[] = 'User already exist'; 
  }else{
    if($pass != $cpass){
      $error[] = ' Confirm Password does not matched.';
// $message[] = 'Confirm password not matched!';
    }elseif($image_size > 2000000){
      $error[] = 'Image size is too large!';
    }else{
      $insert = mysqli_query($conn, "INSERT INTO `patient`(firstname,lastname, username,contact,gender,dob,address, password, image) VALUES('$firstname','$lastname', '$username','$contact','$gender','$dob','$address', '$pass', '$image')") or die('query failed');

      if($insert){
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = " <script>
        Swal.fire({
          icon: 'success',
          title: 'User registered successfully',
          toast: true,
          position:'top-end',
          showConfirmButton: false,
          timer: 1000
          }).then(function() {
            window.location = '../admin/login.php';
            </script>"; 
          }else{
            $error[] = " <script>
            Swal.fire({
              icon: 'error',
              title: 'Registration Failed',
              toast: true,
              position:'top-end',
              showConfirmButton: false,
              timer: 5000
              })
              </script>";
            }
          }
        }

      }

      ?>


      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
        <style>
          .required::after{
            content: " *";
            color: red;
            font-size: 13px;
          }
        </style>
      </head>

      <body class="bg-neutral">
        <div class="main-content">
          <div class="header py-8 py-lg-4" style="background: linear-gradient(to bottom,rgba(23, 173, 106, 0.8),rgba(23, 173, 160, 0.8)),url(../assets/assets/img/brand/bg.webp);">

            <div class="container">
              <div class="text-center">
                <a class="" href="#">
                  <img src="../assets/assets/img/brand/rhu.png"  height="100" width="100"/>
                </a> 
                <a class="" href="../admin/login.php">
                  <img src="../assets/assets/img/brand/doh.png"  height="100" width="100"/>
                </a>
              </div>
              <div class="header-body text-center mb-5">
                <div class="row justify-content-center">
                  <div class="col-lg-8 col-md-1"><br><br>
                    <!-- <h1 class="text-white">RURAL HEALTH UNIT II</h1> -->
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
          <div class="container mt--7 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
              <div class="col-lg-9 col-md-7">
                <div class="card bg-secondary shadow border-0">
                  <div class="bg-transparent pb-1">

                  </div>
                  <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center text-muted mb-3">
                      <h1 class="text-dark">Create Account</h1>
                    </div>

                    <?php
                    if(isset($message)){
                      foreach($message as $message){
                        echo "<script>
                        Swal.fire({
                          icon: 'success',
                          title: 'User registered successfully',
                          toast: true,
                          position:'top-end',
                          showConfirmButton: false,
                          timer: 1000
                          }).then(function() {
                            window.location = '../admin/login.php';
                            });
                            </script>.$message.";
                          }
                        }
                        ?>

                        <?php
                        if(isset($error)){
                          foreach($error as $error){
                            echo '<div class=" text-center alert alert-danger text-white err_msg"><i class="fa fa-exclamation-triangle"> </i>'.$error.'</div>';
                          };
                        };
                        ?>

<!-- <div class="form-container">
<form action="" method="post" enctype="multipart/form-data">
<h3>register now</h3>
<?php
if(isset($message)){
foreach($message as $message){
echo '<div class="message">'.$message.'</div>';
}
}
?>
<input type="text" name="name" placeholder="enter username" class="box" required>
<input type="username" name="username" placeholder="enter username" class="box" required>
<input type="password" name="password" placeholder="enter password" class="box" required>
<input type="password" name="cpassword" placeholder="confirm password" class="box" required>
<input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
<input type="submit" name="submit" value="register now" class="btn">
<p>already have an account? <a href="login.php">login now</a></p>
</form>
</div> -->

<form role="form" action="" method="post" enctype="multipart/form-data"  onsubmit="return validation()">

  <form action="" id="appointment_form" class="py-6">
    <div class="row" id="appointment">
      <div class="col-6" id="frm-field">
        <div class="form-group mb--1">
          <h5 class="text-dark required">First Name</h5>
<!-- div class="input-group input-group-alternative mb--4">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-firstname-83"></i></span>
</div> -->
<input class="form-control" placeholder="First Name" name="firstname" id="firstname" type="firstname">
<!-- </div> -->
<p class="text-danger" id="fn" style="font-size: 13px; margin-top: 4px"></p>
</div>
</div>

<div class="form-group col-6 mb--1">
  <h5 class="text-dark required">Last Name</h5>
<!-- <div class="input-group input-group-alternative mb--4">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lastname-83"></i></span>
</div> -->
<input class="form-control" placeholder="Last Name" name="lastname" id="lastname" type="lastname">
<!-- </div> -->
<p class="text-danger" id="ln" style="font-size: 13px; margin-top: 4px"></p>
</div>

<div class="form-group col-5 mb--1">
  <h5 class="text-dark required">Username</h5>
<!-- <div class="input-group input-group-alternative mb--4">
<div class="input-group-append">
<span class="input-group-text"><i class="ni ni-username-83"></i></span>
</div>
</div> -->
<!-- <span class="input-icon"> -->
  <input type="username" class="form-control" name="username" id="username" onBlur="userAvailability()"  placeholder="Username">
  <!--  <i class="fa fa-user"></i> </span> -->
  <span id="user-availability-status1" style="font-size:12px;"></span>
  <p class="text-danger" id="un" style="font-size: 13px; margin-top: 4px"></p>
  <!-- </span> -->
</div>

<div class="form-group col-4 mb--1">
  <h5 class="text-dark required">Contact Number</h5>
<!-- <div class="input-group input-group-alternative mb--4">
<div class="input-group-prepend">
<span class="input-group-text text-muted px-3">09<i class="ni ni-lastname-83"></i></span>
</div> -->
<input type="tel" class="form-control" id="contact" placeholder="Contact Number" name="contact" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
<!-- </div> -->
<p class="text-danger" id="cn" style="font-size: 13px; margin-top: 4px"></p>
</div>

<div class="form-group col-3 mb--1">
  <h5 for="gender" class="text-dark required">Gender</h5>
  <select type="text" class="form-control form-select-sm-6" name="gender" id="gender">
    <option >Male</option>
    <option >Female</option>
  </select>
  <p class="text-danger" id="g" style="font-size: 13px; margin-top: 4px"></p>
</div>

<div class="form-group col-6 mb--1">
  <h5 for="dob" class="control-label required">Date of Birth</h5>
<!-- <div class="input-group input-group-alternative mb--4">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lastname-83"></i></span>
</div> -->
<input type="date" class="form-control" id="dob" name="dob">
<!-- </div> -->
<p class="text-danger" id="db" style="font-size: 13px; margin-top: 4px"></p>
</div>

<div class="form-group col-6 mb--1">
  <h5 class="text-dark required">Address</h5>
<!-- <div class="input-group input-group-alternative mb--4">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-username-83"></i></span>
</div> -->
<input class="form-control" placeholder="Address" id="address" name="address" type="address">
<!-- </div> -->
<p class="text-danger" id="ad" style="font-size: 13px; margin-top: 4px"></p>
</div>

<div class="form-group col-6 ">
  <h5 class="text-dark required">Password</h5>
  <div class="input-group input-group-alternative mb--1">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
    </div>
    <input class="form-control" placeholder="Password" id ="password" name ="password" type="password">
    <span class="input-group-text">
      <i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle1()"></i>
    </span>
  </div>
  <p class="text-danger" id="pw" style="font-size: 13px; margin-top:7px; margin-bottom: -15px"></p>
</div>

<div class="form-group col-6 ">
  <h5 class="text-dark required">Confirm Password</h5>
  <div class="input-group input-group-alternative mb--1">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
    </div>
    <input class="form-control" placeholder="Confirm Password" id ="cpassword" name ="cpassword" type="password">
    <span class="input-group-text">
      <i class="fa fa-eye rounded" aria-hidden="true" id="eye2" onclick="toggle2()"></i>
    </span>
  </div>
  <p class="text-danger" id="cpw" style="font-size: 13px; margin-top: 7px; margin-bottom: -15px"></p>
</div>

<div class="col-12 mb-2">
  <h5 class="text-dark">Add Profile Image</h5>
  <input  type="file" name="image" class="form-control box" accept="image/jpg, image/jpeg, image/png">
</div>
</div>

<div class="row my-2">
  <div class="col-12">
    <div class="custom-control custom-control-alternative custom-checkbox text-center">
      <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
      <label class="custom-control-label" for="customCheckRegister">
        <span class="text-dark">I agree with the <a href="#exampleModal"  data-toggle="modal" data-target="#exampleModal">Privacy Policy</a></span>
      </label>
    </div>
  </div>
</div>
<div class="text-center">
  <button type="submit" id="submit" name="submit" class="btn btn-primary mt-1">Create account</button>
</div><br>
<div class="col-12 text-center mt--3">
  Already have an account? <a href="../admin/login.php">Log in</a>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Privacy Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Privacy Policy for Rural Health Unit II</h1>

        <p>At Medical Appointment and Record Management System RURAL HEALTH UNIT II, accessible from rhums, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Medical Appointment and Record Management System RURAL HEALTH UNIT II and how we use it.</p>

        <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

        <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Medical Appointment and Record Management System RURAL HEALTH UNIT II. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicygenerator.info/">Free Privacy Policy Generator</a>.</p>

        <h2>Consent</h2>

        <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

        <h2>Information we collect</h2>

        <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
        <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
        <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

        <h2>How we use your information</h2>

        <p>We use the information we collect in various ways, including to:</p>

        <ul>
          <li>Provide, operate, and maintain our website</li>
          <li>Improve, personalize, and expand our website</li>
          <li>Understand and analyze how you use our website</li>
          <li>Develop new products, services, features, and functionality</li>
          <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
          <li>Send you emails</li>
          <li>Find and prevent fraud</li>
        </ul>

        <h2>Log Files</h2>

        <p>Medical Appointment and Record Management System RURAL HEALTH UNIT II follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>




        <h2>Advertising Partners Privacy Policies</h2>

        <P>You may consult this list to find the Privacy Policy for each of the advertising partners of Medical Appointment and Record Management System RURAL HEALTH UNIT II.</p>

          <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Medical Appointment and Record Management System RURAL HEALTH UNIT II, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

          <p>Note that Medical Appointment and Record Management System RURAL HEALTH UNIT II has no access to or control over these cookies that are used by third-party advertisers.</p>

          <h2>Third Party Privacy Policies</h2>

          <p>Medical Appointment and Record Management System RURAL HEALTH UNIT II's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

          <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>

          <h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>

          <p>Under the CCPA, among other rights, California consumers have the right to:</p>
          <p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
          <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
          <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
          <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

          <h2>GDPR Data Protection Rights</h2>

          <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
          <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
          <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
          <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
          <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
          <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
          <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
          <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

          <h2>Children's Information</h2>

          <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

          <p>Medical Appointment and Record Management System RURAL HEALTH UNIT II does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary"  >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Checks Form validation -->
<script type="text/javascript">

  function validation(){

    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var username = document.getElementById('username').value;
    var contact = document.getElementById('contact').value;
    var gender = document.getElementById('gender').value;
    var dob = document.getElementById('dob').value;
    var address = document.getElementById('address').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('password').value;


    if(firstname == ""){
      document.getElementById('fn').innerHTML ="<b>** Please fill the firstname field.";
      return false;
    }

    if(lastname == ""){
      document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field.";
      return false;
    }

    if(username == ""){
      document.getElementById('un').innerHTML ="<b> ** Please fill the username field.";
      return false;
    }
    if((username.length <= 4) || (username.length > 20)) {
      document.getElementById('un').innerHTML ="<b> ** Username length must be between 5 and 20.";
      return false; 
    }
    if(!isNaN(username)){
      document.getElementById('un').innerHTML ="<b> ** A combination of letters and numbers are only allowed.";
      return false;
    }

    if(contact == ""){
      document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field.";
      return false;
    }
    if(isNaN(contact)){
      document.getElementById('cn').innerHTML ="<b> ** User must write digits only not characters.";
      return false;
    }
    if(contact.length!=11){
      document.getElementById('cn').innerHTML ="<b> ** Contact Number must be 11 digits only.";
      return false;
    }

    if(gender == ""){
      document.getElementById('g').innerHTML ="<b> ** Please fill the gender field.";
      return false;
    }

    if(dob == ""){
      document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field.";
      return false;
    }

    if(address == ""){
      document.getElementById('ad').innerHTML ="<b> ** Please fill the address field.";
      return false;
    }
    if(!isNaN(address)){
      document.getElementById('ad').innerHTML ="<b> ** Only characters are allowed.";
      return false;
    }
    if(password == ""){
      document.getElementById('pw').innerHTML ="<b> ** Please fill the password field.";
      return false;
    }
    if((password.length <= 5) || (password.length > 20)) {
      document.getElementById('pw').innerHTML ="<b> ** Password length must be between 5 and 20.";
      return false; 
    }

    if(password!=cpassword){
      document.getElementById('cpw').innerHTML ="<b> ** Password does not match the confirm password.";
      return false;
    }

    if(cpassword == ""){
      document.getElementById('cpw').innerHTML ="<b> ** Please fill the confirm password field.";
      return false;
    }
  }

</script>

<!--   Core   -->
<script src="../assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="../assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<!--   Argon JS   -->
<script src="../assets/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
  var state = false;
  function toggle1(){
    if (state){
      document.getElementById("password").setAttribute("type", "password");
      state = false;
    } else{
      document.getElementById("password").setAttribute("type", "text");
      state = true;
    }
  }
</script>
<script>
  var state = false;
  function toggle2(){
    if (state){
      document.getElementById("cpassword").setAttribute("type", "password");
      state = false;
    } else{
      document.getElementById("cpassword").setAttribute("type", "text");
      state = true;
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

<!-- //check birthdays start -->
<script>
  const picker = document.getElementById('dob');
  let date = new Date();

  picker.addEventListener('input', function(e){
    let day = new Date(this.value).getUTCDate();
    let mm = new Date(this.value).getUTCMonth()+1;
    let yy = new Date(this.value).getUTCFullYear();
    let yyyy = date.getFullYear();
    let mmmm = date.getMonth()+1;
    let dddd = date.getDate();

    let age = yyyy - yy;
    let m = mmmm - mm;


//check if year is >= current year
    if(yy >= yyyy){
      e.preventDefault();
      this.value = '';
      Swal.fire({
        width: 500,
        position: 'center',
        icon: 'warning',
        title: 'Invalid Birthdate',
        showConfirmButton: false,
        timer: 2500
      })
    }
//Check valid age
    else if (m < 0 || (m === 0 && dddd < day)) {
      age--;
    }
    else if (age < 5){
      e.preventDefault();
      this.value = '';
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Children under the age of five are not permitted to create an account.',
        showConfirmButton: false,
        timer: 2500
      })

    }
    else {
//   alert("Valid");
    }
  })
</script>



</body>

</html>