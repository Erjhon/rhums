<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<!-- <h2 class="text-black">Welcome to <?php echo $_settings->info('name') ?></h1> -->
  <?php
  $sched_arr = array();

  ?>

  <html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
/* Effect 1: Brackets */
.cl-effect-1 a::before,
.cl-effect-1 a::after {
  display: inline-block;
  opacity: 0;
  -webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
  -moz-transition: -moz-transform 0.3s, opacity 0.2s;
  transition: transform 0.3s, opacity 0.2s;
}

.cl-effect-1 a::before {
  margin-right: 10px;
  content: '[';
    -webkit-transform: translateX(20px);
    -moz-transform: translateX(20px);
    transform: translateX(20px);
  }

  .cl-effect-1 a::after {
    margin-left: 10px;
    content: ']';
    -webkit-transform: translateX(-20px);
    -moz-transform: translateX(-20px);
    transform: translateX(-20px);
  }

  .cl-effect-1 a:hover::before,
  .cl-effect-1 a:hover::after,
  .cl-effect-1 a:focus::before,
  .cl-effect-1 a:focus::after {
    opacity: 1;
    -webkit-transform: translateX(0px);
    -moz-transform: translateX(0px);
    transform: translateX(0px);}
  </style>

</head>
<!-- Header -->
<div class="header pb-8 pt-md-0" data-aos="zoom-in-up">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Registered Patients</h5>
                  <p class="links cl-effect-1">
                    <a href="?page=user/patient">
                      <?php
                      if ($_SESSION['userdata']['role'] == 'Staff') {
                        if (!isset($_GET['r'])) {

                          ?>

                          <?php
                        }
                      }
                      $patient_query = "SELECT * FROM patient";
                      $patient_query_run = mysqli_query($conn, $patient_query);

                      if ($total = mysqli_num_rows($patient_query_run)) {
                      }
                      ?>
                      <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
                    </a>
                  </p>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
<!--  <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
  <span class="text-nowrap">Since last week</span> -->
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
  <div class="card card-stats mb-4 mb-xl-0">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: 8.3pt;">Today's Total Appointments</h5>
          <p class="links cl-effect-1">
            <a href="?page=appointments">
              <?php

$appointment = "SELECT * FROM appointments WHERE DATE(date_sched) = DATE(NOW()) -- date parts are equal (HH:MM:SS are dropped) 
ORDER BY date_sched ASC";
$appointment_run = mysqli_query($conn, $appointment);

if ($total = mysqli_num_rows($appointment_run)) {
}

?>
<span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
</a>
</p>
</div>
<div class="col-auto">
  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
    <i class="fas fa-chart-pie"></i>
  </div>
</div>
</div>
<p class="mt-3 mb-0 text-muted text-sm">
<!--  <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
  <span class="text-nowrap">Since last week</span> -->
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
  <div class="card card-stats mb-4 mb-xl-0">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Check-Up Records</h5>
          <p class="links cl-effect-1">
            <a href="?page=list-check-up">
              <?php

              $patient_history = "SELECT * FROM checkup";
              $patient_history_run = mysqli_query($conn, $patient_history);

              if ($total = mysqli_num_rows($patient_history_run)) {
              }

              ?>
              <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
            </a>
          </p>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
            <i class="fas fa-stethoscope"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-muted text-sm">
<!-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
  <span class="text-nowrap">Since yesterday</span> -->
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
  <div class="card card-stats mb-4 mb-xl-0">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Animal Bite Records</h5>
          <p class="links cl-effect-1">
            <a href="?page=list-animalbite">
              <?php

              $animalbite_history = "SELECT * FROM animalbite";
              $animalbite_history_run = mysqli_query($conn, $animalbite_history);

              if ($total = mysqli_num_rows($animalbite_history_run)) {
              }

              ?>
              <span class="h1 font-weight-bold mb-0"><?php echo $total; ?></span>
            </a>
          </p>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-info text-white rounded-circle shadow">
            <i class="fas fa-file-medical-alt"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-muted text-sm">
<!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
  <span class="text-nowrap">Since last month</span> -->
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Calendar -->
<div class="container-fluid mt--7"   data-aos="fade-up"
    data-aos-offset="100"
    data-aos-delay="50"
    data-aos-duration="1000">
  <div class="row">
    <div class="col-xl-8 mb-5 mb-xl-0">
      <div class="card bg-gradient-white shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">

            <div class="card-body pb-8 table-responsive">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <div id="calendar" class="chart-canvas mt--4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- graph -->
    <div class="col-xl-4" data-aos="zoom-out-left">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h4 class="text-uppercase text-muted ls-1 mb-1">Total</h4>
              <h2 class="mb-0">Checkup and Animal Bite Records</h2>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive">
          <!-- Chart -->
          <div class="chart " >
            <canvas id="animalChart" class="chart-canvas" width="40" height="60" ></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
// Connect to the database and retrieve the data
$bite_data = array();
$checkup_data = array();
$months = array();

$query = "SELECT MONTHNAME(date_sched) as month, SUM(CASE WHEN reason = 'Animal Bite' THEN 1 ELSE 0 END) as bites, SUM(CASE WHEN reason = 'Check-up' THEN 1 ELSE 0 END) as checkups FROM appointments GROUP BY MONTH(date_sched)";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $bite_data[$row['month']] = $row['bites'];
  $checkup_data[$row['month']] = $row['checkups'];
}

// Get all the months even if there are no appointments
$all_months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
foreach ($all_months as $month) {
  if (!array_key_exists($month, $bite_data)) {
    $bite_data[$month] = null;
  }
  if (!array_key_exists($month, $checkup_data)) {
    $checkup_data[$month] = null;
  }
  $months[] = $month;
  $total_data[$month] = $bite_data[$month] + $checkup_data[$month];
}

foreach ($months as $month) {
  if ($total_data[$month] === 0) {
    $bite_data[$month] = null;
    $checkup_data[$month] = null;
  } else {
    $bite_data[$month] = round(($bite_data[$month] / $total_data[$month]) * 100, 2);
    $checkup_data[$month] = round(($checkup_data[$month] / $total_data[$month]) * 100, 2);
  }
}

// encode the data in json format for use in javascript
$bite_data = json_encode(array_values($bite_data));
$checkup_data = json_encode(array_values($checkup_data));
$months = json_encode(array_values($months));
?>

<script>
  var ctx = document.getElementById('animalChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: <?php echo $months; ?>,
      datasets: [{
        label: 'Animal Bites',
        data: <?php echo $bite_data; ?>,
        backgroundColor: 'rgba(231, 76, 60, 0.8)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      },
      {
        label: 'Check-ups',
        data: <?php echo $checkup_data; ?>,
        backgroundColor: 'rgba(52, 152, 219, 0.8)',
        borderColor: 'rgba(26, 188, 156 , 1)',
        borderWidth: 1
      }]
    },
    options: {
  scales: {
    xAxes: [{
      stacked: true
    }]
  },
  tooltips: {
    callbacks: {
      label: function(tooltipItem, data) {
        var dataset = data.datasets[tooltipItem.datasetIndex];
        var dataValue = dataset.data[tooltipItem.index];
        return dataset.label + ': ' + dataValue + '%';
      }
    }
  }
}
  });
</script>
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init( {duration: 1000,});

  </script>
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
$sched_query = $conn->query("SELECT a.*,CONCAT(p.name,' ',p.mname,'. ',p.lname) as fullname FROM `appointments` a inner join `patient_list` p on a.patient_id = p.id");
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
          var bg = 'var(--warning)';
          if (scheds[k].status == 0)
            bg = 'var(--info)';
          if (scheds[k].status == 1)
            bg = 'var(--success)';
          console.log(bg)
          events.push({
            id: scheds[k].id,
            title: scheds[k].fullname,
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
</html>