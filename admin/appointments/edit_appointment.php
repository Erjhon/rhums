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
    $full_name = "";
    $contact = "";
    $gender = "";
    $dob = "";
    $address = "";
    $reason = "";
} else {
    $full_name = "";
    $contact = "";
    $gender = "";
    $dob = "";
    $address = "";
    $reason = "";
}

?>
<style>
    #uni_modal .modal-content>.modal-footer {
        display: none;
    }

    #uni_modal .modal-body {
        padding-top: 0 !important;
    }
</style>
<div class="container-fluid">
    <form action="" id="appointment_form" class="py-2">
        <div class="row" id="appointment">
            <div class="col-6" id="frm-field">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <input type="hidden" name="patient_id" value="<?php echo isset($patient_id) ? $patient_id : '' ?>">
                <div class="form-group">
                    <label for="name" class="control-label">Firstname</label>
                    <input type="text" class="form-control" name="name" placeholder="Firstname" value="<?= $full_name ?><?php echo isset($patient['name']) ? $patient['name'] : '' ?>" required>
                </div>
                   <div class="form-group">
                    <label for="name" class="control-label">Lastname</label>
                    <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?= $full_name ?><?php echo isset($patient['lname']) ? $patient['lname'] : '' ?>" required>
                </div>

                <div hidden class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($patient['email']) ? $patient['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="contact" class="control-label">Contact Number</label>
                    <input type="text" class="form-control" id="scontact" name="contact" value="<?= $contact ?><?php echo isset($patient['contact']) ? $patient['contact'] : '' ?>" required maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"required>
                </div>
                <div class="form-group">
                    <label for="gender" class="control-label">Gender</label>
                    <select type="text" class="form-control form-select-sm-6" name="gender" required>
                        <option class="placeholder" style="display: none" selected disabled value="">Select gender</option>
                        <option <?= $gender ?><?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                        <option <?= $gender ?><?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?= $dob ?><?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                </div>
            </div>
            <div class="col-6">
                 <div class="form-group">
                    <label for="name" class="control-label">Middle Initial</label>
                    <input type="text" class="form-control" name="mname" placeholder="Middle Initial" value="<?= $full_name ?><?php echo isset($patient['mname']) ? $patient['mname'] : '' ?>" required>
                </div>
              
                <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <!-- <textarea class="form-control" name="address" rows="2" required><?= $address ?><?php echo isset($patient['address']) ? $patient['address'] : '' ?></textarea> -->
                    <select class="form-control"  name="address" rows="2" required>
                        <option class="placeholder" style="display: none"selected disabled value="">Select Patient Address</option>
                        <option class="placeholder" style="display: none" ><?= $address ?><?php echo isset($patient['address']) ? $patient['address'] : '' ?></option>
                        <option>Angustia, Nabua</option>
                        <option>Antipolo Old, Nabua</option>
                        <option>Antipolo Young, Nabua</option>
                        <option>Aro-aldao, Nabua</option>
                        <option>Bustrac, Nabua</option>
                        <option>Dolorosa, Nabua</option>
                        <option>Duran, Nabua</option>
                        <option>Inapatan, Nabua</option>
                        <option>La Opinion, Nabua</option>
                        <option>La Purisima, Nabua</option>
                        <option>Lourdes Old, Nabua</option>
                        <option>Lourdes Young, Nabua</option>
                        <option>Malawag, Nabua</option>
                        <option>Paloyon Oriental, Nabua</option>
                        <option>Paloyon Proper, Nabua</option>
                        <option>Salvacion Que Gatos, Nabua</option>
                        <option>San Antonio, Nabua</option>
                        <option>San Antonio Ogbon, Nabua</option>
                        <option>San Esteban, Nabua</option>
                        <option>San Francisco, Nabua</option>
                        <option>San Isidro, Nabua</option>
                        <option>San Isidro Inapatan, Nabua</option>
                        <option>San Jose, Nabua</option>
                        <option>San Juan, Nabua</option>
                        <option>San Luis, Nabua</option>
                        <option>San Miguel, Nabua</option>
                        <option>San Nicolas, Nabua</option>
                        <option>San Roque, Nabua</option>
                        <option>San Roque Madawon, Nabua</option>
                        <option>San Roque Sagumay, Nabua</option>
                        <option>San Vicente Gorong-Gorong, Nabua</option>
                        <option>San Vicente Ogbon, Nabua</option>
                        <option>Santa Barbara, Nabua</option>
                        <option>Santa Cruz, Nabua</option>
                        <option>Santa Elena Baras, Nabua</option>
                        <option>Santa Lucia Baras, Nabua</option>
                        <option>Santiago Old, Nabua</option>
                        <option>Santiago Young, </option>
                        <option>Santo Domingo, Nabua</option>
                        <option>Tandaay, Nabua</option>
                        <option>Topas Proper, Nabua</option>
                        <option>Topas Sogod, Nabua</option>
                    </select>
                </div>
                <?php if ($_settings->userdata('id') > 0) : ?>

                    <div class="form-group">
                        <label for="reason" class="control-label">Reason for Appointment</label>
                        <!-- <textarea class="form-control" name="reason" rows="1" required><?php echo isset($reason) ? $reason : "" ?></textarea> -->
                        <select name="reason" id="reason" class="form-control form-select-sm-6"required>
                            <option class="placeholder" style="display: none" selected disabled value="">Select reason</option>
                            <option value="Check-up"<?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Check-up" ? "selected": "" ?>>Check-up</option>
                            <option value="Animal Bite" <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Animal Bite" ? "selected": "" ?>>Animal Bite </option>
                            
                        </select>
                    </div>

                <?php else : ?>
                    <div class="form-group">
                        <label for="reason" class="control-label">Reason for Appointment</label>
                        <!-- <textarea class="form-control" name="reason" rows="1" required></textarea> -->
                        <select name="reason" id="reason" class="form-control form-select-sm-6"required>
                            <option class="placeholder" style="display: none" >Select reason</option>
                            <option <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Check-up" ? "selected": "" ?>>Check-up</option>
                            <option <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Animal Bite" ? "selected": "" ?>>Animal Bite </option>
                            <option <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Immunization" ? "selected": "" ?>>Immunization for Child</option>
                            <option <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Immunization" ? "selected": "" ?>>Immunization for Senior Citizen</option>
                            <!-- <option <?= $reason ?><?php echo isset($patient['reason']) && $patient['reason'] == "Pre-Natal" ? "selected": "" ?>>Prenatal</option> -->
                        </select>

                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="date_sched" class="control-label">Preferred Date and Time</label>
                    <input type="datetime-local" class="form-control" id="appointment-date" name="date_sched" value="<?php echo isset($date_sched) ? date("Y-m-d\TH:i", strtotime($date_sched)) : "" ?>" required>
                </div>

                <?php if ($_settings->userdata('id') > 0) : ?>
                    <div hidden class="form-group">
                        <label for="status" class="control-label">Status</label>
                        <select name="status" id="status" class="custom custom-select"required>
                            <option value="1" <?php echo isset($status) && $status == "1" ? "selected" : "" ?>>Confirmed</option>
                            <option value="0" <?php echo isset($status) && $status == "0" ? "selected" : "" ?>>Pending</option>
                            <option value="2" <?php echo isset($status) && $status == "2" ? "selected" : "" ?>>Cancelled</option>
                        </select>
                    </div>
                     <input hidden type="text" class="form-control" id="created" name="created" value="<?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?>">
                <?php else : ?>
                    <input type="hidden" name="status" value="1">
                <?php endif; ?>
            </div>
            <div class="form-group text-center w-100 form-group">
                <button class="btn-primary btn">Submit Appointment</button>
                <button class="btn-light btn ml-2" type="submit" data-dismiss="modal">Cancel</button>
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
                //  console.log(err)
                //  alert_toast("An error occured",'error');
                //  end_loader();
                // },
                success: function(resp) {
                    if (resp.status == 'success') {
                        // document.getElementById("hiddencontact").value = document.getElementById("scontact").value;
                        // console.log(document.getElementById("hiddencontact").value)
                        // document.getElementById("hiddenform").submit();

                        alert(resp.msg);
                        console.log(resp.sms_respond)
                        location.reload()
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