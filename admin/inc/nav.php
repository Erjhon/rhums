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
      <a class="navbar-img text-center" href="../admin/index.php">
        <img src="../assets/assets/img/brand/rhu.png"  height="100" width="100"/>
      </a>
      <!-- User -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
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

  
<!-- Navigation with color -->
 <ul class="navbar-nav">
          <nav class="mt-4">
           <ul class="nav nav-pills flex-column nav-flat">
              <a href="./" class="nav-link nav-home">
                <i class="nav-icon fas fa-tachometer-alt text-success"></i>
                
                 <span class="text-dark">Dashboard</span>                 
              </a>
            </li>
            
             <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=schedule_settings" class="nav-link nav-schedule_settings">
                <i class="nav-icon fas fa-calendar-day text-orange"></i>
            
                  <span class="text-dark">Schedule Settings</span>
               
              </a>
            </li>

            <li class="dropdown">
              <a href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
                <i class="nav-icon ni ni-ruler-pencil"></i>
                  <span class="text-dark">Appointment List</span>
              </a>
            </li>

           

             <li class="dropdown">
            <a  href="<?php echo base_url ?>admin/?page=consultation" class="nav-link nav-consultation">
              <i class="ni ni-collection text-teal"></i>
              <span class="text-dark"> Records</span>
            </a>
          </li>

             <li class="dropdown">
              <a href="<?php echo base_url?>admin/?page=user/patient" class="nav-link nav-user_patient">
                <i class="nav-icon fas fa-user text-purple"></i>
              
                  <span class="text-dark">Patient List</span>
              
              </a>
            </li>
         
      </div>
    </div>
  </nav>
  <div class="main-content">

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