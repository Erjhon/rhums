
 <!-- <div class="container-fluid mt--7"> -->

  <div class="header-body pb-0 pt-0 pt-md-1">
      <div class="row container-fluid">
        <div class="row header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-1">
              <div class="card hover card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <h5  class="card-title text-uppercase text-dark mb-0">Total Registered Patients</h5>

<?php

$patient_query ="SELECT * FROM patients";
$patient_query_run = mysqli_query($conn,$patient_query);

if($total = mysqli_num_rows($patient_query_run)){

}

?>

                      <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-dark text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>

              <div class="col-xl-4 col-lg-6">
                <div class="card hover card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">

                        <h5 class="card-title text-uppercase text-dark mb-0">Today Total Appointments</h5>
                      <?php

$appointment ="SELECT * FROM appointments";
$appointment_run = mysqli_query($conn,$appointment);

if($total = mysqli_num_rows($appointment_run)){

}

?>
                      <span class="h1 font-weight-bold mb-0"><?php echo $total;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-dark text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-dark mb-0">Patient Record History</h5>
                        <?php

$patient_history ="SELECT * FROM patient_history";
$patient_history_run = mysqli_query($conn,$patient_history);

if($total = mysqli_num_rows($patient_history_run)){

}

?>
                      <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-dark text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>

       <!--      <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-dark mb-0">Staff</h5>
                                              <?php

$staff ="SELECT * FROM users where role = '1'";
$staff_run = mysqli_query($conn,$staff);

if($total = mysqli_num_rows($patient_history_run)){

}

?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-dark text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div> -->
        
<!-- 
    
            <div class="card-body">
              <!-- Chart
              <div class="chart">
                <!-- Chart wrapper -->
            <!--     <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total Patient From</h2>
                </div>
              </div>
            </div>
            <div class="card-body"> -->
              <!-- Chart -->
        <!--       <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div> 
      -->
    <div class="col mt-5">
        <div class="col-sm-12 mb-5 mb-xl-12">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Patient Schedule</h3>
              </div>
          </div>
      </div>
      </div>
      <div class="table-responsive mt-1">
          <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
</div>





       </div>
        </div>
      </div>
    </div>