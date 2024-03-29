<?php
include 'config.php';
//session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
};

if(isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:login.php');
}

?>

<head>
  <?php require_once('inc/header.php') ?>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <!-- Favicon -->
  <link href="./assets/assets/img/brand/doh.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.cdnfonts.com/css/black-jack" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />

</head>
<style>
  #selectAll{
    top:0
  }
</style>



<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-img text-center">
        <img src="./assets/assets/img/brand/rhu.png" height="100" width="100"/>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar rounded-circle">
                <span class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default"> 

                  <!-- Profile picture image -->
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  $pathx = "./patient/uploaded_img/";
                  $file = $fetch["image"];
                  ?>
                  <?php switch(true)
                  {
                    case ($fetch['image'] == (!empty($fetch['gender'])) ):
                    echo '<img src="'.$pathx.$file.'">';
                    break;
                    case ($fetch['gender'] == 'Male'):
                    echo '<img src="./patient/images/male.png"';
                    break;
                    case ($fetch['gender'] == 'Female'):
                    echo '<img src="./patient/images/female.png"/>';
                    break;
                  } 
                  ?>
                </span>
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h5 class="text-overflow m-0"><?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></h5>
            </div>
            <div class="dropdown-divider"></div>
            <a href="patient/update_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
             <a href="patient/change_pw.php" class="dropdown-item">
              <i class="ni ni-lock-circle-open"></i>
              <span>Change Password</span>
            </a>
            <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="dropdown-item">
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
                <img src="./assets/assets/img/brand/rhu.png" height="60" width="40">
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
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active bg-success " href="dashboard.php">
              <i class="ni ni-single-02 text-mint"></i> Schedule Appointment
            </a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="patient/view.php">
              <i class="ni ni-ruler-pencil text-blue"></i> View Appointment
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Patient Dashboard</a>
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
  <span>
             <!-- Notification -->
        <nav class="navbar navbar-default">
    <div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
         <span class="badge badge-warning count"style="font-size: 9pt;"></span>
        <!-- <span class="label label-pill text-white count"  ></span> -->
      <i href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ni ni-bell-55 mr-2 text-white" style="font-size: 1.5em;"></i></i><ul class="dropdown-menu" id="drop"></ul>
      </li>
    </ul>
    </div>
  </nav>
  </span>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default"> 

                  <!-- Profile picture image -->
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM patient WHERE id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  $pathx = "./patient/uploaded_img/";
                  $file = $fetch["image"];
                  ?>
                  <?php switch(true)
                  {
                    case ($fetch['image'] == (!empty($fetch['gender'])) ):
                    echo '<img src="'.$pathx.$file.'">';
                    break;
                    case ($fetch['gender'] == 'Male'):
                    echo '<img src="./patient/images/male.png"/>';
                    break;
                    case ($fetch['gender'] == 'Female'):
                    echo '<img src="./patient/images/female.png"/>';
                    break;
                  } 

                  ?>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"> <?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="patient/update_profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="patient/change_pw.php" class="dropdown-item">
                <i class="ni ni-lock-circle-open"></i>
                <span>Change Password</span>
              </a>

              <div class="dropdown-divider"></div>
              <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="dropdown-item">
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
    <div class="header pb-10 pt-7 pt-lg-12 d-flex align-items-center" style="min-height: 100%; background-image: url(./assets/assets/img/brand/bg.webp); background-size: cover; background-position: center top;">

      <!-- Mask -->
      <span class="mask" style="background: linear-gradient(
        to bottom,rgba(0, 112, 185, 1),rgba(0, 137, 162, 0.8)"></span>

        <!-- Header container -->
        <div class="modal fade" id="uni_modal" role='dialog'>
          <div class="modal-dialog   rounded-0 modal-md modal-dialog-centered" role="document">
            <div class="modal-content  rounded-0">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Ready to Leave?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a type="button" class="btn btn-primary" href="./patient/logout.php?logout=<?php echo $user_id; ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

        <!--   Core   -->
        <script src="./assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
        <script src="./assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!--   Optional JS   -->
        <!-- <script src="./assets/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
        <!--   Argon JS   -->
        <script src="./assets/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
        <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
        <script>
          window.TrackJS &&
          TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-dashboard-free"
          });
        </script>

        <?php if($_settings->chk_flashdata('success')): ?>
          <script>
            alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
          </script>
        <?php endif;?>

        <?php $page = isset($_GET['p']) ? $_GET['p'] : 'appointment';  ?>
        <?php 
        if(!file_exists($page.".php") && !is_dir($page)){
          include '404.html';
        }else{
          if(is_dir($page))
            include $page.'/index.php';
          else
            include $page.'.php';

        }
        ?>
        <?php require_once('inc/footer.php') ?>

        <script>
          start_loader();
          $(function(){
            end_loader()
          })
        </script>


      </body>

      <!-- Session timeout -->
      <script type="text/javascript">
var SessionTimeOut = 180; //3 minutes
var sessionSecondsTimer = null;
var sessionSecondsCounter = 0;
document.onclick = function () { sessionSecondsCounter = 0; };
document.onmousemove = function () { sessionSecondsCounter = 0; };
document.onkeypress = function () { sessionSecondsCounter = 0; };
sessionSecondsTimer = window.setInterval(CheckSessionTime, 1000);

function CheckSessionTime() {
  sessionSecondsCounter++;
  var oPanel = document.getElementById("timeOut");
  if (oPanel) {
    oPanel.innerHTML = (SessionTimeOut - sessionSecondsCounter);
  }
  if (sessionSecondsCounter >= SessionTimeOut) {
    window.clearInterval(sessionSecondsTimer);
    alert("Your session has expired. Please login again.");
    window.location = "patient/logout.php";
  }
}
</script>

    <script type = "text/javascript">
$(document).ready(function(){
  
  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"admin/notif/fetch_patient.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
      $('#drop').html(data.notification);
      if(data.unseen_notification > 0){
      $('.count').html(data.unseen_notification);
      }
      }
    });
  }
 
  load_unseen_notification();
 
  $('#add_form').on('submit', function(event){
    event.preventDefault();
    if($('#firstname').val() != '' && $('#lastname').val() != ''){
    var form_data = $(this).serialize();
    $.ajax({
      url:"addnew.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
      $('#add_form')[0].reset();
      load_unseen_notification();
      }
    });
    }
    else{
      alert("Enter Data First");
    }
  });
 
  $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
  });
 
  setInterval(function(){ 
    load_unseen_notification();; 
  }, 5000);
 
});
</script>


<style>

.avatar--default {
  position: relative;
  overflow: hidden;
  width: 50px;
  height: 50px;
  margin: auto;

}
.avatar--default::before {
  content: "";
  position: absolute;
  left: 50%;
  bottom: 0;
  width: 70%;
  height: 44%;
  margin: 0 0 0 -35%;
  border-radius: 100% 100% 0 0;
}
.avatar--default::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 19%;
  width: 40%;
  height: 40%;
  margin: 0 0 0 -20%;
  border-radius: 50%;
}

</style>
</html>