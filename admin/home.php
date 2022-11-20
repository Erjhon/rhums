<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<!-- <h2 class="text-black">Welcome to <?php echo $_settings->info('name') ?></h1> -->
<?php
$sched_arr = array();

?>
<!-- Header -->
<div class="header pb-8 pt-5 pt-md-3">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-3 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Total Registered Patients</h5>

                  <?php
                  if ($_SESSION['userdata']['role'] == 'staff') {
                    if (!isset($_GET['r'])) {

                  ?>
                      <script>
                        location.href = '<?= base_url . "admin/staff.php?r=true" ?>'
                      </script>
                  <?php
                    }
                  }
                  $patient_query = "SELECT * FROM patient";
                  $patient_query_run = mysqli_query($conn, $patient_query);

                  if ($total = mysqli_num_rows($patient_query_run)) {
                  }

                  ?>

                  <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
                </div>
                <div class="">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body ">
              <div class="row">
                <div class="col">

                  <h5 class="card-title text-uppercase text-dark mb-0">Today's Total Appointments</h5>
                  <?php

                  $appointment = "SELECT * FROM appointments WHERE DATE(date_sched) = DATE(NOW()) -- date parts are equal (HH:MM:SS are dropped) 
ORDER BY date_sched ASC";
                  $appointment_run = mysqli_query($conn, $appointment);

                  if ($total = mysqli_num_rows($appointment_run)) {
                  }

                  ?>
                  <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
                </div>
                <div class=" ">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-envelope"></i>
                  </div>
                </div>
              </div>

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

                  $patient_history = "SELECT * FROM patient_history";
                  $patient_history_run = mysqli_query($conn, $patient_history);

                  if ($total = mysqli_num_rows($patient_history_run)) {
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

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12 mb-8 mb-xl-0">
      <div class="card bg-gradient shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <!-- <h6 class="text-uppercase text-dark ls-1 mb-1">Patient Schedule</h6> -->
              <h2 class="text-dark mb-0">Patient Schedule</h2>
              <div class="card-body">
                <div id="calendar"></div>
              </div>
            </div>

          </div>
        </div>
        <div class="table-responsive mt-1">
        </div>
      </div>
    </div>



    <!--   <div class="col-xl-3">
<div class="card shadow">
<div class="card-header bg-transparent">
<div class="row align-items-center">
<div class="col">
<h6 class="text-uppercase text-muted ls-1 mb-1">Number of Patients per Barangay</h6>
<h2 class="mb-0">Barangay</h2>
</div>
</div>
</div>
<div class="card-body"> -->
    <!-- Chart-- -->
    <!--      <div class="chart">
<canvas id="chart-orders" class="chart-canvas"></canvas>
</div>
</div>
</div>
</div>
</div>  -->
    <!-- <div class="row mt-5">
<div class="col-xl-8 mb-5 mb-xl-0">
<div class="card shadow">
<div class="card-header border-0">
<div class="row align-items-center">
<div class="col">
<h3 class="mb-0">Page visits</h3>
</div>
<div class="col text-right">
<a href="#!" class="btn btn-sm btn-primary">See all</a>
</div>
</div>
</div>
<div class="table-responsive"> -->
    <!-- Projects table -->
    <!--     <table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>
<th scope="col">Page name</th>
<th scope="col">Visitors</th>
<th scope="col">Unique users</th>
<th scope="col">Bounce rate</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">
/argon/
</th>
<td>
4,569
</td>
<td>
340
</td>
<td>
<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
</td>
</tr>
<tr>
<th scope="row">
/argon/index.html
</th>
<td>
3,985
</td>
<td>
319
</td>
<td>
<i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
</td>
</tr>
<tr>
<th scope="row">
/argon/charts.html
</th>
<td>
3,513
</td>
<td>
294
</td>
<td>
<i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
</td>
</tr>
<tr>
<th scope="row">
/argon/tables.html
</th>
<td>
2,050
</td>
<td>
147
</td>
<td>
<i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
</td>
</tr>
<tr>
<th scope="row">
/argon/profile.html
</th>
<td>
1,795
</td>
<td>
190
</td>
<td>
<i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-xl-4">
<div class="card shadow">
<div class="card-header border-0">
<div class="row align-items-center">
<div class="col">
<h3 class="mb-0">Social traffic</h3>
</div>
<div class="col text-right">
<a href="#!" class="btn btn-sm btn-primary">See all</a>
</div>
</div>
</div>
<div class="table-responsive"> -->
    <!-- Projects table -->
    <!--   <table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>
<th scope="col">Referral</th>
<th scope="col">Visitors</th>
<th scope="col"></th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">
Facebook
</th>
<td>
1,480
</td>
<td>
<div class="d-flex align-items-center">
<span class="mr-2">60%</span>
<div>
<div class="progress">
<div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
</div>
</div>
</div>
</td>
</tr>
<tr>
<th scope="row">
Facebook
</th>
<td>
5,480
</td>
<td>
<div class="d-flex align-items-center">
<span class="mr-2">70%</span>
<div>
<div class="progress">
<div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
</div>
</div>
</div>
</td>
</tr>
<tr>
<th scope="row">
Google
</th>
<td>
4,807
</td>
<td>
<div class="d-flex align-items-center">
<span class="mr-2">80%</span>
<div>
<div class="progress">
<div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
</div>
</div>
</div>
</td>
</tr>
<tr>
<th scope="row">
Instagram
</th>
<td>
3,678
</td>
<td>
<div class="d-flex align-items-center">
<span class="mr-2">75%</span>
<div>
<div class="progress">
<div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
</div>
</div>
</div>
</td>
</tr>
<tr>
<th scope="row">
twitter
</th>
<td>
2,645
</td>
<td>
<div class="d-flex align-items-center">
<span class="mr-2">30%</span>
<div>
<div class="progress">
<div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
</div>
</div>
</div>
</td>
</tr>
</tbody>
</table> -->
  </div>
</div>
</div>
</div>


<style>
  .fc-event:hover,
  .fc-event-selected {
    color: black !important;
  }

  a.fc-list-day-text {
    color: black !important;
  }

  .fc-event:hover,
  .fc-event-selected {
    color: black !important;
    background: var(--light);
    cursor: pointer;
  }
</style>
<?php
$sched_query = $conn->query("SELECT a.*,p.name FROM `appointments` a inner join `patient_list` p on a.patient_id = p.id");
$sched_arr = json_encode($sched_query->fetch_all(MYSQLI_ASSOC));
?>
<script>
  $(function() {
    $('.select2').select2()
    var Calendar = FullCalendar.Calendar;
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()
    var scheds = $.parseJSON('<?php echo ($sched_arr) ?>');

    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      initialView: "dayGridMonth",
      headerToolbar: {
        right: "dayGridWeek,dayGridMonth,listDay prev,next"
      },
      buttonText: {
        dayGridWeek: "Week",
        dayGridMonth: "Month",
        listDay: "Day",
        listWeek: "Week",
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: function(event, successCallback) {
        var days = moment(event.end).diff(moment(event.start), 'days')
        var events = []
        Object.keys(scheds).map(k => {
          var bg = 'var(--primary)';
          if (scheds[k].status == 0)
            bg = 'var(--primary)';
          if (scheds[k].status == 1)
            bg = 'var(--success)';
          console.log(bg)
          events.push({
            id: scheds[k].id,
            title: scheds[k].name,
            start: moment(scheds[k].date_sched).format('YYYY-MM-DD[T]HH:mm'),
            backgroundColor: bg,
            borderColor: bg,
          });
        })
        console.log(events)
        successCallback(events)

      },
      eventClick: (info) => {
        uni_modal("Appointment Details", "appointments/view_details.php?id=" + info.event.id)
      },
      editable: false,
      selectable: true,
      selectAllow: function(select) {
        console.log(moment(select.start).format('dddd'))
        if (moment().subtract(1, 'day').diff(select.start) < 0 && (moment(select.start).format('dddd') != 'Saturday' && moment(select.start).format('dddd') != 'Sunday'))
          return true;
        else
          return false;
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()
    $('#location').change(function() {
      location.href = "./?lid=" + $(this).val();
    })
  })
</script>

<!--   Core   -->
<script src="../assets/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="../assets/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<script src="../assets/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="../assets/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
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