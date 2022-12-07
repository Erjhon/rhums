<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<!-- <h2 class="text-black">Welcome to <?php echo $_settings->info('name') ?></h1> -->
<?php
$sched_arr = array();

?>

<html>
<head>
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
      transform: translateX(0px);
    }
  </style>
</head>

<!-- Header -->
<div class="header pb-8 pt-5 pt-md-3 ">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <a href=""></a>
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-3 mb-xl-0">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Total Registered Patients</h5>
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
            <div class="card-body pb-0">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Today's Total Appointments</h5>
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
                    <i class="ni ni-calendar-grid-58"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Check-Up</h5>
                  <h5 class="card-title text-uppercase text-dark mb-0">Records</h5>
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
                  <i class="fas fa-file-medical-alt"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6 mt-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Animal Bite Records</h5>
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
                  <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                    <i class="fas fa-stethoscope"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6 mt-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0">Immunization For Child Records</h5>
                  <p class="links cl-effect-1">
                    <a href="?page=list-immunization">
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
                  <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                    <i class="fas fa-syringe"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6 mt-3">
          <div class="card card-stats mb-3 mb-xl-0">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-dark mb-0"> Immunization For Senior Citizens Records</h5>
                  <p class="links cl-effect-1">
                    <a href="?page=list-immunizationSC">
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
                  <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                    <i class="fas fa-crutch"></i>
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
</html>