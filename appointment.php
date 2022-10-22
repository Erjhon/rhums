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
    $(function(){
        $('#create_appointment').click(function(){
			uni_modal("<h2>Medical Appointment Form</h2>Please fill out the form below and we will get back to you soon. A confirmation text will be sent to you.","admin/appointments/manage_appointment.php",'mid-large')
		})
    })
</script>