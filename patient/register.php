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
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
  <!-- Icons -->
  <link href="../assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />

  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
  <style>
    .required::after{
      content: " *";
      color: red;
      font-size: 13px;
    }
    p {
      text-align: justify;
    }
  </style>

  <?php
  include 'config.php';

  if(isset($_POST['submit'])){

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middleInitial = mysqli_real_escape_string($conn, $_POST['middleInitial']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
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


//   $select = mysqli_query($conn, "SELECT * FROM `patient` WHERE username = '$username' AND password = '$pass'") or die('query failed');

//   if(mysqli_num_rows($select) > 0){
// // $message[] = 'User already exist'; 
//   }else{
//     if($pass != $cpass){
//       $error[] = " <script>
//             Swal.fire({
//               icon: 'error',
//               title: 'Confirmed password not matched',
//               toast: true,
//               position:'top-end',
//               showConfirmButton: false,
//               timer: 5000

//               })
//               </script>";
// // $message[] = 'Confirm password not matched!';
    if($image_size > 2000000){
      $error[] = 'Image size is too large!';
    }else{
      $insert = mysqli_query($conn, "INSERT INTO `patient`(firstname,middleInitial,lastname, username,email,contact,gender,dob,address, password, image) VALUES('$firstname', '$middleInitial', '$lastname', '$username', '$email', '$contact','$gender','$dob','$address', '$pass', '$image')") or die('query failed');

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
        ?>


        <body class="bg-neutral">
          <div class="main-content">
            <div class="header py-sm-4 py-lg-4" style="background: linear-gradient(to bottom,rgba(23, 173, 106, 0.8),rgba(23, 173, 160, 0.8)),url(../assets/assets/img/brand/bg.webp);">

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
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- Page content -->
            <div class="container mt--6 pb-5">
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
                              </script>";
                            }
                          }
                          ?>

                          <?php
                          if(isset($error)){
                            foreach($error as $error){
                              echo '<div > </i>'.$error.'</div>';
                            };
                          };
                          ?>

                          <form role="form" action="" method="post" enctype="multipart/form-data"  onsubmit="return validation()" >

                            <form action="" id="appointment_form" class="py-6">
                              <div class="row" id="appointment">
                                <div class="col-sm-4" id="frm-field">
                                  <div class="form-group mb--1">
                                    <h5 class="text-dark required">First Name</h5>
                                    <input class="form-control" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>" name="firstname" id="firstname" type="firstname" onkeyup="return validate('firstname')">
                                    <p  class="text-danger" id="fn" style="font-size:12px;"></p>
                                  </div>
                                </div>

                                <div class="form-group col-sm-4 mb--1">
                                  <h5 class="text-dark required">Middle Initial</h5>
                                  <input class="form-control" placeholder="Middle Initial" value="<?php echo isset($_POST['middleInitial']) ? $_POST['middleInitial'] : ''; ?>" name="middleInitial" id="middleInitial" type="middleInitial" onkeyup="return validate('middleInitial')" maxlength="2">
                                  <p  class="text-danger" id="mI" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-4 mb--1">
                                  <h5 class="text-dark required">Last Name</h5>
                                  <input class="form-control" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>" name="lastname" id="lastname" type="lastname"onkeyup="return validate('lastname')">
                                  <p  class="text-danger" id="ln" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-4 mb--1">
                                  <h5 class="text-dark required">Username</h5>
                                  <input type="username" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" name="username" id="username"  onkeyup="userAvailability()|| validate('username')" placeholder="Username">
                                  <span id="user-availability-status1" style="font-size:12px;"></span>
                                  <p  class="text-danger" id="un" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-4 mb--1">
                                  <h5 class="text-dark required">Email Address</h5>
                                  <input type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email" id="email"  onkeyup="userAvailability2()|| validate('email')" placeholder="Email Address" onkeyup="return validate('email')">
                                  <span id="user-availability-status2" style="font-size:12px;"></span>
                                  <p  class="text-danger" id="em" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-4 mb--1">
                                  <h5 class="text-dark required">Contact Number</h5>
                                  <input type="tel" class="form-control" id="contact" placeholder="Contact Number" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : ''; ?>" name="contact" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeyup="return validate('contact')">
                                  <p  class="text-danger" id="cn" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-3 mb--1">
                                  <h5 for="gender" class="text-dark required">Gender</h5>
                                  <select type="text" class="form-control form-select-sm-6" value="<?php echo isset($_POST['gender']) ? $_POST['gender'] : ''; ?>" name="gender" id="gender" onchange ="return validate('gender')" >
                                    <option class="placeholder" value="" style="display: none">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                  <p  class="text-danger" id="g" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-3 mb--1">
                                  <h5 for="dob" class="control-label required">Date of Birth</h5>
                                  <input type="date" class="form-control" id="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''; ?>" name="dob" onkeyup="return validate('dob')">
                                  <p  class="text-danger" id="db" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-6 mb--1">
                                  <h5 class="text-dark required">Address</h5>
                                  <!-- <input class="form-control" placeholder="Address" id="address" name="address" type="address"> -->
                                  <select class="form-control" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" name="address" rows="2" onchange ="return validate('address')" >
                                    <option class="placeholder" style="display: none" value="">Select Address</option>
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
                                  <p  class="text-danger" id="ad" style="font-size:12px;"></p>
                                </div>

                                <div class="form-group col-sm-6 ">
                                  <h5 class="text-dark required">Password</h5>
                                  <div class="input-group input-group-alternative mb--1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" id ="password" name ="password" type="password" onkeyup="return validate('password')||check('');">
                                    <span class="input-group-text">
                                      <i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle1()"></i>
                                    </span>
                                  </div>
                                  <p  class="text-danger" id="pw" style="font-size:12px;"></p>
                                </div>
                                <div class="form-group col-sm-6 ">
                                  <h5 class="text-dark required">Confirm Password</h5>
                                  <div class="input-group input-group-alternative mb--1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Confirm Password" id ="cpassword" name ="cpassword" type="password" onkeyup="return validate('cpassword')||check('');">
                                    <span class="input-group-text">
                                      <i class="fa fa-eye rounded" aria-hidden="true" id="eye2" onclick="toggle2()"></i>
                                    </span>
                                  </div>
                                  <p  class="text-danger" id="cpw" style="font-size:12px;"></p>
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
                                      <!-- <span class="text-dark">I agree with the <a href="privacy.php" target="_blank">Privacy Policy</a></span> -->
                                      <span class="text-dark">I agree with the <a href="privacy.php"  data-toggle="modal" data-target="#exampleModal">Privacy Policy</a></span>

                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary mt-1" >Create account</button>
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
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Privacy Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h1>Privacy Policy for Rural Health Unit II</h1>
<!-- 
<p>At  Medical Appointment and Record Management System, accessible from http://ruralhealthunit2stodomingo.epizy.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by  Medical Appointment and Record Management System and how we use it.</p>

<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in  Medical Appointment and Record Management System. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicygenerator.info/">Free Privacy Policy Generator</a>.</p>
-->

                                <p>At Rural Health Unit II, one of our main priorities is the privacy of our visitors. This privacy policy document contains types of information that is collected and recorded by Rural Health Unit II and how we use it.</p>

                                <h2>Consent</h2>

                                <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

                                <h2>Information we collect</h2>

                                <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                                <p>When you register for an account, we may ask for your contact information, including items such as name, username, address, email address, and contact number, gender, date of birth, address, password and picture.</p>
                                <p>Medical History will also be collected.</p>
                                <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>

                                <h2>How we use your information</h2>

                                <p>We use the information we collect in various ways, including to:</p>

                                <ul>
                                  <li>Provide, operate, and maintain our website.</li>
                                  <li>Communicate with you to provide you with updates and other information relating to the website.</li>
                                  <li>Send you emails.</li>
                                </ul>

                                <h2>Data Protection Rights</h2>

                                <p>Rural Health Unit II would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
                                <p>The right to access – You have the right to request copies of your personal data.<br>
                                  The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<br>
                                  The right to erasure – You have the right to request that we erase your personal data, under certain conditions.<br>
                                  The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.<br>
                                The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>

                                <h2>Children's Information</h2>

                                <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                                <p>Rural Health Unit II does not knowingly collect any Personal Identifiable Information from children under the age of 5. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

                                <p>If you have any concerns, you may contact Rural Health Unit II at <a href="mailto:nabua.rhu2@gmail.com">nabua.rhu2@gmail.com.</p>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>


<!-- Checks Form validation -->
<script type="text/javascript">

  var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('cpassword').value) {
      document.getElementById('cpw').innerHTML = '<p  class="text-success">Password matched</p>';
  } else {
    document.getElementById('cpw').innerHTML = '<p  class="text-danger">Password not matched</p>';
  }
}

function validation(){

  var firstname = document.getElementById('firstname').value;
  var middleInitial = document.getElementById('middleInitial').value;
  var lastname = document.getElementById('lastname').value;
  var username = document.getElementById('username').value;
  var email = document.getElementById('email').value;
  var contact = document.getElementById('contact').value;
  var gender = document.getElementById('gender').value;
  var dob = document.getElementById('dob').value;
  var address = document.getElementById('address').value;
  var password = document.getElementById('password').value;
  var cpassword = document.getElementById('cpassword').value;


  if(firstname == ""){
    document.getElementById('fn').innerHTML ="<b>** Please fill the firstname field.";
  }
  if(middleInitial == ""){
    document.getElementById('mI').innerHTML ="<b> ** Please fill the middle initial field."; 
  }
  if(lastname == ""){
    document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field.";
  }

  if((username.length <= 4) || (username.length > 20)) {
    document.getElementById('un').innerHTML ="<b> ** Username length must be between 5 and 20.";
  }
  if(!isNaN(username)){
    document.getElementById('un').innerHTML ="<b> ** A combination of letters and numbers are only allowed.";
  }
  if(username == ""){
    document.getElementById('un').innerHTML ="<b> ** Please fill the username field.";
  }
  if (email.indexOf('@') <= 0) {
    document.getElementById("em").innerHTML = " ** Email id not valid, @ position is wrong"; 
  }
  if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) {
    document.getElementById("em").innerHTML = " ** Email id not valid, . position is wrong"; 
  }
  if (email == "") {
    document.getElementById("em").innerHTML = " ** Please fill email address field";
  }
  if(isNaN(contact)){
    document.getElementById('cn').innerHTML ="<b> ** User must write digits only not characters.";
  }
  if(contact.length!=11){
    document.getElementById('cn').innerHTML ="<b> ** Mobile Number must be 11 digits only.";
  }
  if(contact == ""){
    document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field.";
  }

  if(gender == ""){
    document.getElementById('g').innerHTML ="<b> ** Please select in gender field.";
  }
  if(dob == ""){
    document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field.";
  }
  if(address == ""){
    document.getElementById('ad').innerHTML ="<b> ** Please select in the address field."; 
  }
  else if(!isNaN(address)){
    document.getElementById('ad').innerHTML ="<b> ** Only characters are allowed.";

  }
  if(password == "") {  
    document.getElementById("pw").innerHTML = "**Fill the password field!";  

  }  if(cpassword == "") {  
    document.getElementById("cpw").innerHTML = '**Fill the confirm password field!';  
    return false;  
  }  

//minimum password length validation  
  if(password.length < 5) {  
    document.getElementById("pw").innerHTML = "**Password length must be atleast 5 characters and up";  
    return false;  
  }  

//maximum length of password validation  
  if(password.length > 15) {  
    document.getElementById("pw").innerHTML = "**Password length must not exceed 15 characters";  
    return false;  
  } else {  
    alert("Password is correct");  
  }


//  if(password == ""){
//   document.getElementById('pw').innerHTML ="<b> ** Please fill the password field.";
// }

//  if((password.length != 5) || (password.length > 20)) {
//   document.getElementById('pw').innerHTML ="<b> ** Password length must be between 5 and 20.";

// }

// if(cpassword == ""){
//   document.getElementById('cpw').innerHTML ="<b> ** Please fill the confirm password field.";

// }
// if(password!=cpassword){
//   document.getElementById('cpw').innerHTML ="";
// }

}

function validate(id){
  var input_id = document.getElementById(''+id).value;

  if(id == 'firstname' ){
    if(input_id == ""){
      document.getElementById('fn').innerHTML ="<b>** Please fill the firstname field."; 
    }else {
      document.getElementById('fn').innerHTML = ""; 
    }
  }
  else if(id == 'middleInitial'){
    if(middleInitial == ""){
      document.getElementById('mI').innerHTML ="<b> ** Please fill the middle initial field.";
    }else {
      document.getElementById('mI').innerHTML = "";
    }
  }
  else if(id == 'lastname'){
    if(lastname == ""){
      document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field.";
    }else {
      document.getElementById('ln').innerHTML = "";
    }
  }
  else if(id == 'username'){
    if(username == ""){
      document.getElementById('un').innerHTML ="<b> ** Please fill the username field.";
    }else {
      document.getElementById('un').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'contact'){
    if(contact == ""){
      document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field.";
    }else {
      document.getElementById('cn').innerHTML = "";
    }
  }
  else if(id == 'gender'){
    if(gender == ""){
      document.getElementById('g').innerHTML ="<b> ** Please fill the gender field.";
    }else {
      document.getElementById('g').innerHTML = "";
    }
  }
  else if(id == 'dob'){
    if(dob == ""){
      document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field.";
    }else {
      document.getElementById('db').innerHTML = "";
    }
  }
  else if(id == 'address'){
    if(address == ""){
      document.getElementById('ad').innerHTML ="<b> ** Please fill the address field.";
    }else {
      document.getElementById('ad').innerHTML = "";
    }
  }
  else if(id == 'password'){
    if(password == ""){
      document.getElementById('pw').innerHTML ="<b> ** Please fill the password field.";
    }else {
      document.getElementById('pw').innerHTML = "";
    }
  }
  else if(id == 'cpassword'){
    if(cpassword == ""){
      document.getElementById('cpw').innerHTML ="<b> ** Please fill the confirm password field.";
    }else {
      document.getElementById('cpw').innerHTML = "";
    }
  }return false;
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