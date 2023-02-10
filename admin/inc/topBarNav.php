<style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
</style>
  <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
<!-- Navbar -->
      <nav class="navbar navbar-expand navbar-dark border border-white border-top-0 bg-gradient-success navbar-dark text-sm">
        <!-- Left navbar links -->
     <!--    <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-lg-inline-block">
            <a href="<?php echo base_url ?>" class="nav-link"><?php echo (!isMobileDevice()) ? $_settings->info('name'):$_settings->info('short_name'); ?></a>
          </li>
        </ul> -->
        <style>
h3 {
  text-shadow: 2px 2px 5px black
  ;
}
</style>

          <h3 class="text-white col-10 text-right ml--7">Welcome to <?php echo $_settings->info('name') ?></h3>
        <!-- Right navbar links -->
         <!-- Notification -->
         <span>
          <nav class="nav ml-4">
            <div class="container-fluid">
              <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                  <span class="badge badge-warning count"style="font-size: 9pt;"></span>
                  <!-- <span class="label label-pill text-white count"  ></span> -->
                  <i href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ni ni-bell-55 mr-2 text-white" style="font-size: 1.5em;"></i></i><ul class="dropdown-menu" id="drop"></ul>

                </li>
              </ul>
            </div>
          </nav>
         <!--  <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<i class="ni ni-bell-55"></i>
</a> -->
        </span>
        <ul class="navbar-nav ml-auto">

          <!-- Navbar Search -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->
          <!-- Messages Dropdown Menu -->
      <!--     <li class="nav-item">
            <div class="btn-group nav-link">
                  <button type="button" class="btn btn-flat badge badge-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image"></span>
                    <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="<?php echo base_url.'admin/?page=user' ?>"><span class="fa fa-user"></span> My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url.'/classes/Login.php?f=logout' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
                  </div>
              </div>
          </li>
         -->

  <!-- User -->
        <ul class="col-10 text-right ml--5">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="img-avatar avatar rounded-circle">
                  <?php 
$id=$_SESSION['userdata']['id'];
$qry = $conn->query("SELECT * From staff where id = '$id'");
        while($row = $qry->fetch_assoc()):
          $pathx = "../";
          $file = $row["avatar"];
           switch(true)
              {
                case ($row['avatar'] == (!empty($row['gender'])) ):
                echo '<img src="'.$pathx.$file.'"  class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default>>';
                default:
                case ($row['gender'] == 'Male'):
                echo '<img src="../dist/img/male_staff.png" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar';
                break;
                case ($row['gender'] == 'Female'):
                echo '<img src="../dist/img/staff.png"class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar';
                break;
              } 

            ?>">
                </span>
          <?php  endwhile ?>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url.'admin/?page=user' ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="<?php echo base_url.'admin/?page=user/change_pass' ?>" class="dropdown-item">
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
        <a type="button" class="btn btn-primary" href="<?php echo base_url.'/classes/Login.php?f=logout' ?>" >Logout</a>
      </div>
    </div>
  </div>
</div>



         <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.navbar -->
      <script type = "text/javascript">
$(document).ready(function(){
  
  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"../admin/notif/fetch.php",
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

      