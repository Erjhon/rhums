<?php require_once('../config.php');

if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../assets/assets/img'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `patients` WHERE username = '$username' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exist'; 
   }else{
      if($password != $cpassword){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `patients`(firstname,lastname, username, password,user_type,image) VALUES('$firstname','$lastname','$username', '$password','$user_type','$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
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
        Medical Scheduling and Record Management for RHU II
      </title>
      <!-- Favicon -->
      <link href="assets/assets/img/brand/doh.png" rel="icon" type="image/png">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      <!-- Icons -->
      <link href="assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
      <link href="assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
      <!-- CSS Files -->
      <link href="../assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    </head>

    <body class="bg-neutral">
      <div class="main-content">
     <div class="header py-8 py-lg-4" style="background: linear-gradient(
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
          <!-- Table -->
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <div class="card bg-secondary shadow border-0">
                <div class="bg-transparent pb-1">

            <!--       <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
                  <div class="text-center">
                    <a href="#" class="btn btn-neutral btn-icon mr-4">
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
                  <div class="text-center text-muted mb-4">

                      <h1 class="text-dark">Create Account</h1>
                    <!-- <small>Or sign up with credentials</small> -->
                  </div>
                  <form role="form" action="" method="POST">
               
<?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class=" text-center alert alert-danger text-white err_msg"><i class="fa fa-exclamation-triangle"></i>'.$message.'</div>';
         }
      }
      ?>


                                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div class=" text-center alert alert-danger text-white err_msg"><i class="fa fa-exclamation-triangle"></i>'.$error.'</div>';
         };
      };
      ?>
                    <div class="form-group">
                         <h4 class="text-dark">First Name</h4>
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-firstname-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="First Name" name="firstname" type="firstname" required>
                      </div>
                    </div>
                    <div class="form-group">
                         <h4 class="text-dark">Last Name</h4>
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lastname-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Last Name" name="lastname" type="lastname" required>
                      </div>
                    </div>
                    <div class="form-group">
                         <h4 class="text-dark">Username</h4>
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-username-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Username" name="username" type="username" required>
                      </div>
                    </div>
                    <div class="form-group">
                         <h4 class="text-dark">Password</h4>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" name ="password" type="password" required>
                      </div>
                    </div>
                     <div class="form-group">
                         <h4 class="text-dark">Confirm Password</h4>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Confirm Password" name ="cpassword" type="password" required>
                      </div>
                    </div>

                    <!-- <input hidden type="file" name="image" class="form-control box" accept="image/jpg, image/jpeg, image/png"> -->

                 <!-- <div class="text-center"> -->
                      <select hidden class="input-group input-group-alternative  text-muted" name="user_type" required>
                          <option class="text-muted " value="user">Patient</option>                      
                     </select>
                <!-- </div> -->
                     

    <!-- Password Strength -->
                  <!--   <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> -->

                    <div class="row my-4">
                      <div class="col-12">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                          <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                          <label class="custom-control-label" for="customCheckRegister">
                            <span class="text-dark">I agree with the <a href="#exampleModal"  data-toggle="modal" data-target="#exampleModal">Privacy Policy</a></span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary mt-4">Create account</button>
                    </div>
                    <br>
                           <div class="col-12 text-center">
          Already have an account? <a href="../client/login.php">Log in</a>
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
        <h1>Privacy Policy for Rural Health UNit II</h1>

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
      <!--   Core   -->
      <script src="../assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
      <script src="../assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!--   Optional JS   -->
      <!--   Argon JS   -->
      <script src="../assets/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
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