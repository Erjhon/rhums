<?php

require_once('../../config.php');

function geturl()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.   
    $url .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL   
    $url .= $_SERVER['REQUEST_URI'];
    // $url.= $_SERVER['PHP_SELF'];    

    return $url;
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * from `appointments` where id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
    $qry2 = $conn->query("SELECT * FROM `patient_meta` where patient_id = '{$patient_id}' ");
    foreach ($qry2->fetch_all(MYSQLI_ASSOC) as $row) {
        $patient[$row['meta_field']] = $row['meta_value'];
    }
}

//get user information from registered user/ or current logged in user

//check if session is empty
if (!empty($_SESSION['user_id'])) {

    $current_user_id = $_SESSION['user_id'];
    $get_user_info = $conn->query("SELECT * FROM `patient` WHERE `id` = {$current_user_id}");
    $row = $get_user_info->fetch_assoc();


    $user_id = $row['id'];
    $name =  $row['firstname']; 
    $mname = "{$row['middleInitial']}";
    $lname = $row['lastname'];
    $contact = "{$row['contact']}";
    $gender = "{$row['gender']}";
    $dob = "{$row['dob']}";
    $address = "{$row['address']}";
    $reason = "";


    
} else {
    $name = "";
    $mname = "";
    $lname = "";
    $contact = "";
    $gender = "";
    $dob = "";
    $address = "";
    $reason = "";
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="admin/appointments/jquery.datetimepicker.min.css">
</head>
<body>
<style>
    #uni_modal .modal-content>.modal-footer {
        display: none;
    }

    #uni_modal .modal-body {
        padding-top: 0 !important;
    }
    .required::after{
      content: " *";
      color: red;
      font-size: 13px;
    }
</style>
<div class="container-fluid">
    <form action="" id="appointment_form" class="py-2">
        <div class="row" id="appointment">
        
            <div class="col-6" id="frm-field">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <input type="hidden" name="patient_id" value="<?php echo isset($patient_id) ? $patient_id : '' ?>">
                     <label for="name" class="control-label">Fullname</label>
                <div class="input-group">
  <!-- <div class="input-group-prepend">
    <span class="input-group-text">First and last name</span>
  </div> -->
  <input input type="text" class="form-control col-3" name="name" value="<?= $name ?><?php echo isset($patient['name']) ? $patient['name'] : '' ?>" required readonly>
  <input type="text" class="form-control col-1" name="mname" value="<?= $mname ?><?php echo isset($patient['mname']) ? $patient['mname'] : '' ?>" required readonly>
   <input type="text" class="form-control" name="lname" value="<?= $lname ?><?php echo isset($patient['lname']) ? $patient['lname'] : '' ?>" required readonly>
</div><br>
               <!--  <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $name ?><?php echo isset($patient['name']) ? $patient['name'] : '' ?> <?php echo isset($patient['mname']) ? $patient['mname'] : '' ?> <?php echo isset($patient['lname']) ? $patient['lname'] : '' ?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Middle Initial</label>
                    <input type="text" class="form-control" name="name" value="<?= $mname ?>.<?php echo isset($patient['name']) ? $patient['name'] : '' ?> <?php echo isset($patient['mname']) ? $patient['mname'] : '' ?> <?php echo isset($patient['lname']) ? $patient['lname'] : '' ?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Lastname</label>
                    <input type="text" class="form-control" name="name" value="<?= $lname ?><?php echo isset($patient['name']) ? $patient['name'] : '' ?> <?php echo isset($patient['mname']) ? $patient['mname'] : '' ?> <?php echo isset($patient['lname']) ? $patient['lname'] : '' ?>" required readonly>
                </div> -->
                <div hidden class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($patient['email']) ? $patient['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="contact" class="control-label">Contact Number</label>
                    <input type="text" class="form-control" id="scontact" name="contact" value="<?= $contact ?><?php echo isset($patient['contact']) ? $patient['contact'] : '' ?>" required maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" readonly>
                </div>
                <div hidden class="form-group">
                    <label for="gender" class="control-label">Gender</label>
                    <input type="text" class="form-control" name="gender" value="<?= $gender ?><?php echo isset($patient['gender']) ? $patient['gender'] : '' ?>" required readonly>
                </div>
                <div hidden class="form-group">
                    <label for="dob" class="control-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?= $dob ?><?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required readonly>
                </div>
            </div>
            <div class="col-6">

                <div hidden class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $address ?><?php echo isset($patient['address']) ? $patient['address'] : '' ?>" required readonly>
                </div>
                <?php if ($_settings->userdata('id') > 0) : ?>

                    <div class="form-group">
                        <label for="reason" class="control-label">Reason for Appointment</label>
                        <select name="reason" id="reason" class="form-control form-select-sm-6">
                            <option value="Check-up"<?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Check-up" ? "selected": "" ?>>Check-up</option>
                            <option value="Animal Bite" <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Animal Bite" ? "selected": "" ?>>Animal Bite </option>
                            <option value="Immunization for Child"<?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "ImmunizationC" ? "selected": "" ?>>Immunization for Child</option>
                            <option value="Immunization for Senior Citizen"<?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "ImmunizationSC" ? "selected": "" ?>>Immunization for Senior Citizen</option>
                            <!-- <option value="Pre-Natal" <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Pre-Natal" ? "selected": "" ?>>Prenatal</option> -->
                        </select>
                    </div>

                <?php else : ?>
                    <div class="form-group">
                        <label for="reason" class="control-label required">Reason for Appointment</label>
                        <select name="reason" id="reason" class="form-control form-select" required>
                            <option class="placeholder" style="display: none"  selected disabled value="" >Select reason</option>
                            <option   <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Check-up" ? "selected": "" ?>>Check-up</option>
                            <option   <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Animal Bite" ? "selected": "" ?>>Animal Bite </option>
                            
                        </select>

                    <input hidden type="text" class="form-control" id="created" name="created" value="Patient">
                    </div>
                <?php endif; ?>
                 <script src="admin/appointments/jquery.datetimepicker.full.min.js" ></script>
<script>
    $("#appointment-date").datetimepicker({
        formatTime: 'h:ia',
        step:60
    });

    $('#appointment-date').datetimepicker({
    minDate: 0
});
    $('#appointment-date').datetimepicker({
    format:'Y-m-d h:ia',
    allowTimes:['8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 
    minDate:0
});

</script>



                <div class="form-group">
                    <label for="date_sched" class="control-label">Preferred Date and Time</label>
                       <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-day p-1"></span>
                    </div>
                  </div>
                    <input type="" class="form-control" id="appointment-date" name="date_sched" value="<?php echo isset($date_sched) ? date("Y-m-d\TH:i", strtotime($date_sched)) : "" ?>" required readonly autocomplete="off"/> 
                       </div>
                </div>

            </div>
                
                <?php if ($_settings->userdata('id') > 0) : ?>

                    <div hidden class="form-group">
                        <label for="status" class="control-label">Status</label>
                        <select name="status" id="status" class="custom custom-select">
                            <option value="1" <?php echo isset($status) && $status == "1" ? "selected" : "" ?>>Confirmed</option>
                            <option value="0" <?php echo isset($status) && $status == "0" ? "selected" : "" ?>>Pending</option>
                            <option value="2" <?php echo isset($status) && $status == "2" ? "selected" : "" ?>>Cancelled</option>
                        </select>
                    </div>

                <?php else : ?>
                    <div hidden class="col-lg-12 col-sm-6 p-1 text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="create_new" name="authorized" value="">
                        <label class="form-check-label" for="authorized">Appointment for others?</label>
                    </div>
                </div>

                    <input type="hidden" name="status" value="1">
                <?php endif; ?>
            <div class="form-group text-center w-100 form-group mt-3">
                <button class="btn-primary btn">Submit Appointment</button>
                <button class="btn-light modal-submit btn ml-2" type="submit" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(function() {
        $('#appointment_form').submit(function(e) {
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_appointment",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                dataType: 'json',
                // error:err=>{
                // 	console.log(err)
                // 	alert_toast("An error occured",'error');
                // 	end_loader();
                // },
                success: function(resp) {
                    if (resp.status == 'success') {
                        // document.getElementById("hiddencontact").value = document.getElementById("scontact").value;
                        // console.log(document.getElementById("hiddencontact").value)
                        // document.getElementById("hiddenform").submit();

                        // alert(resp.msg);
                        $(".modal-submit").click()
                        Swal.fire(
                          'Good job!',
                          resp.msg,
                          'success'
                        )
                        console.log(resp.sms_respond)
                        // location.reload()
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        var el = $('<div>')
                        el.addClass("alert alert-danger err-msg").text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $("html, body").animate({
                            scrollTop: $('#uni_modal').offset().top
                        }, "fast");
                    } else {
                        alert_toast("An error occured", 'error');
                        console.log(resp)
                    }
                    end_loader();
                    console.log(resp)
                },
                error: function(err) {
                    console.log(err.responseText)
                    alert_toast("An error occured", 'error');
                    end_loader();
                }
            })
        })
        $('#uni_modal').on('hidden.bs.modal', function(e) {
            if ($('#appointment_form').length <= 0)
                location.reload()
        })
    })

    var indiList;
    $(document).ready(function(){
        $('#create_new').click(function(){
            uni_modal("<h2>Medical Appointment Form</h2>Please fill out the form below. An SMS notification will be sent to you.", "admin/appointments/add_appointment_others.php",'mid-large')

        })
        $('#selectAll').change(function(){
            // if($(this).is(":checked") == true){
            //  $('.invCheck').prop("checked",true)
            // }else{
            //  $('.invCheck').prop("checked",false)
            // }
            var _this = $(this)
            count = indiList.api().rows().data().length
            for($i = 0 ; $i < count; $i++){
                var node = indiList.api().row($i).node()
                console.log($(node).find('.invCheck'))
                if(_this.is(":checked") == true){
                    $(node).find('.invCheck').prop("checked",true)
                    $('#selected_opt').show('slow')
                }else{
                    $(node).find('.invCheck').prop("checked",false)
                    $('#selected_opt').hide('slow')
                }
            }
        })
        
    })

</script>

<!---javascript file-->
     <script src="js/bootstrap.bundle.min.js"></script>
     <script type="text/javascript">
          $(document).ready(function(){
              $('#authorized').click(function(){
                var inputValue = $(this).attr("value");
                $(".box" + inputValue).toggle();
              });
          });
     </script>