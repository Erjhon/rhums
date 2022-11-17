 <!-- Header-->
 <header class="bg-dark py-2 center " id="main-header">
     <div class="container px-10 px-lg-6 my-7">
         <div class="text-center text-dark">
             <h3 class="display-1 col-lg-12 text-dark" style="font-family: BlackJack">&nbsp&nbsp&nbsp&nbsp&nbspOnline &nbspMedical &nbspAppointment &nbsp&nbsp&nbsp&nbsp&nbsp</h3>
             <h2 class="fw-normal" style="font-family: Century Gothic">A PASSION FOR PUTTING PATIENTS FIRST</h2><br>
             <p class="lead fw-normal text-white-50 mb-0">
                 <button class="btn btn-primary my-4" type="button" id="create_appointment">Set an Appointment Now</button>
             </p>
         </div>
     </div>
     <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block fixed-bottom">
         <div class="row gx-0">
             <div class="col-md-6 text-lg-start mb-2 mb-lg-0">
                 <div class="d-inline-flex align-items-center">
                     <small class="py-1"><i class="far fa-clock text-primary me-3"></i>Clinic Hours: Mon - Fri : 8:00 AM - 5:00 PM </small>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- Section-->
 <?php
    $sched_arr = array();
    $max = 0;
    ?>
 <section class="py-5">
     <div class="container px-4 px-lg-5 mt-5">



     </div>
 </section>
 <script>
     $(function() {
         $('#create_appointment').click(function() {
             uni_modal("<h2>Medical Appointment Form</h2>Please fill out the form below. An SMS notification will be sent to you.", "admin/appointments/manage_appointment.php", 'mid-large')
         })
     })
 </script>