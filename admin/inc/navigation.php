</style>
<!-- Main Sidebar Container -->
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md  bg-gradient-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""><img src="../assets/assets/img/icons/icon.png" height="30" width="30"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-img text-center" href="./">
        <img src="../assets/assets/img/brand/rhu.png"  height="100" width="100"/>
      </a>
      <!-- User -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./">
                <img src="../assets/assets/img/brand/doh.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
               <span class="navbar-toggler-icon"></span>
               <span></span>
             </button>
           </div>
         </div>
       </div>
       <!-- Form -->
       <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-search"></span>
            </div>
          </div>
        </div>
      </form>

     
        <!-- Navigation -->
        <!-- <nav class="mt-4">
          <ul class="navbar-nav"> -->
         <!--  <li class="nav-item">
            <a class="nav-link nav-home" href="./index.php">
              <i class="ni ni-tv-2 text-success"></i> Dashboard
            </a>
          </li>
            <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=schedule_settings" class="nav-link nav-schedule_settings">
              <i class="ni ni-ruler-pencil text-orange"></i> Schedule Setting
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
              <i class="ni ni-collection text-pink"></i> Appointment List
            </a>
          </li>
           <li class="nav-item">
            <a  href="<?php echo base_url ?>admin/?page=consultation" class="nav-link nav-consultation">
              <i class="ni ni-collection text-teal"></i> Records
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-user_list" href="<?php echo base_url ?>admin/?page=user/list">
              <i class="fas fa-users text-yellow"></i> User List
            </a>
          </li> -->


<!-- Navigation with color -->
 <ul class="navbar-nav">
          <nav class="mt-1">
           <ul class="nav nav-pills flex-column nav-flat">
              <a href="./" class="nav-link nav-home">
                <i class="nav-icon fas fa-tachometer-alt text-success"></i>
                
                 <span class="text-dark text-bold"><b>Dashboard</b></span>                 
              </a>
            </li>
            
             <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=schedule_settings" class="nav-link nav-schedule_settings">
                <i class="nav-icon fas fa-calendar-day text-orange"></i>
            
                  <span class="text-dark"><b>Schedule Settings</b></span>
               
              </a>
            </li>

            <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
                <i class="nav-icon ni ni-ruler-pencil"></i>
                  <span class="text-dark"><b>Appointment List</b></span>
              </a>
            </li>

           

             <li class="dropdown">
            <!-- <a  href="<?php echo base_url ?>admin/?page=consultation" class="nav-link nav-consultation"> -->
              <a  href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link nav-consultation">
              <i class="nav-icon ni ni-folder-17 text-info"></i>
              <span class="text-dark"><b>Records</b></span></a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                 <li><a href="<?php echo base_url ?>admin/?page=list-check-up" class="btn nav-link nav-list-check-up text-info">Check-up</a></li>
                 <li><a href="<?php echo base_url ?>admin/?page=list-animalbite" class="btn nav-link nav-list-animalbite text-info"> Animal Bite</a></li>
                <!--  -->
              </ul>
          </li>

             <?php
                  if ($_SESSION['userdata']['role'] == 'Admin') {
                  ?>   
            <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=user/list"  class="nav-link nav-user_list">
                <i class="nav-icon fas fa-users text-yellow"></i>
                  <span class="text-dark"><b>User List</b></span>
              </a>
            </li>
              <?php }?>
              
             <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=user/patient" class="nav-link nav-user_patient">
                <i class="nav-icon fas fa-user text-purple"></i>
              
                  <span class="text-dark"><b>Patient List</b></span>
              
              </a>
            </li>
          <!--   <li class="nav-item dropdown">
              <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                <i class="nav-icon fas fa-cogs"></i>
               
                  Settings
                
              </a>
            </li> -->
          </ul>
        </nav>
        <!--   <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url ?>admin/?page=system_info"">
              <i class="ni ni-bullet-list-67 text-red"></i> Settings
            </a>
          </li> -->
         <!--  <li class="nav-item">
            <a class="nav-link" href="./pages/login.php">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/register.php">
              <i class="ni ni-circle-08 text-pink"></i> Register
            </a>
          </li> -->
     
        <!-- Divider -->
        <!-- <hr class="my-3"> -->
        <!-- Heading -->
        <!-- <h6 class="navbar-heading text-muted">Documentation</h6> -->
        <!-- Navigation -->
        <!-- <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.php">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.php">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.php">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="./examples/upgrade.php">
              <i class="ni ni-send text-dark"></i> Upgrade to PRO
            </a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <!-- End Navbar -->
    <!-- Header -->



    <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand"> -->
      <!-- Brand Logo -->
       <!--  <a href="<?php echo base_url ?>admin" class="brand-link bg-primary text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image  elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
      </a> -->
      <!-- Sidebar -->
      <!--   <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-co ntent" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="clearfix"></div> -->
                <!-- Sidebar Menu -->
<!--  <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="./index.php">
              <i class="ni ni-tv-2 text-success"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
              <i class="ni ni-collection text-blue"></i> Appointment List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
              <i class="ni ni-ruler-pencil text-orange"></i> Schedule Setting
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pages/userlist.php">
              <i class="ni ni-single-02 text-yellow"></i> User List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
              <i class="ni ni-bullet-list-67 text-red"></i> Settings
            </a>
          </li>



                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                          Appointment List
                        </p>
                      </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=schedule_settings" class="nav-link nav-schedule_settings">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                          Schedule Settings
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li>
                  </ul>
                </nav> -->
                <!-- /.sidebar-menu -->
            <!--   </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div> -->
        <!-- /.sidebar -->
        <!-- </aside> -->

        <script>
          $(document).ready(function(){
            var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
            var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
            page = page.replace(/\//g,'_');

            if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
             if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
              $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
              $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
              $('.nav-link.nav-'+page).parent().addClass('menu-open')
            }

          }

        })
      </script>