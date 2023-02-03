<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <?php require_once('../config.php'); ?>
    <?php require_once('inc/header.php') ?>
</head>
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
<body>

    <?php if ($_settings->chk_flashdata('success')) : ?>
        <script>
            alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
        </script>
    <?php endif; ?>

    <?php
 error_reporting(0);
    ini_set('display_errors', 0);
    if (isset($_POST['submit'])) {
        $pid = mysqli_real_escape_string($conn, $_POST['pid']);
        $pfname = mysqli_real_escape_string($conn, $_POST['pfname']);
        $mname = mysqli_real_escape_string($conn, $_POST['mname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $pcontact = mysqli_real_escape_string($conn, $_POST['pcontact']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $placebirth = mysqli_real_escape_string($conn, $_POST['placebirth']);
        $guardian = mysqli_real_escape_string($conn, $_POST['guardian']);
        $paddress = mysqli_real_escape_string($conn, $_POST['paddress']);
        $visit = mysqli_real_escape_string($conn, $_POST['visit']);
        $bloodpress = mysqli_real_escape_string($conn, $_POST['bloodpress']);
        $bloodsugar = mysqli_real_escape_string($conn, $_POST['bloodsugar']);
        $bodytemp =mysqli_real_escape_string($conn, $_POST['bodytemp']);
        $weight = mysqli_real_escape_string($conn, $_POST['weight']);
        $height = mysqli_real_escape_string($conn, $_POST['height']);
        $bmi = mysqli_real_escape_string($conn, $_POST['bmi']);
        $complaints = mysqli_real_escape_string($conn, $_POST['complaints']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $assigned = mysqli_real_escape_string($conn, $_POST['assigned']);
        $user_id = mysqli_real_escape_string($conn, $_SESSION['userdata']['id']);
        $insert = mysqli_query($conn, "INSERT INTO `patient_list`(id, name,mname,lname, user_id) VALUES('$pid', '$pfname','$mname','$lname', '$user_id')") or die('query failed');

        $sql = "INSERT INTO `checkup` (pid,pfname,mname,lname,pcontact,gender,dob,age,placebirth,guardian,paddress)
        VALUES ('$pid','$pfname','$mname','$lname','$pcontact','$gender','$dob','$age','$placebirth','$guardian','$paddress')";
        $query=mysqli_query($conn,$sql);

        $sql = "INSERT INTO `patient_history` (patientId,visit,bloodpress,bloodsugar,bodytemp,weight,height,bmi,complaints,remark,assigned)
        VALUES ('$pid','$visit','$bloodpress','$bloodsugar','$bodytemp','$weight','$height','$bmi','$complaints','$remark','$assigned')";
        if (mysqli_query($conn, $sql)) {

            $message[] = ""; 
        }else{
            $error[] = ""; 
        }
// mysqli_close($conn);
    }
    $getLastRow = mysqli_query($conn, "SELECT `id` FROM `patient_list` ORDER BY id DESC LIMIT 1");
    $lastRow = mysqli_fetch_assoc($getLastRow);
    $lastRowId = intval($lastRow['id']) + 1;


    ?>



    <!-- display success -->
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Record added successfully',
                toast: true,
                position:'top-end',
                showConfirmButton: false,
                timer: 1000
                }).then(function() {
                    window.location.href ='?page=list-check-up';
                    });
                    </script>";
                }
            }
            ?>

            <!-- //display error -->
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        toast: true,
                        position:'top-end',
                        showConfirmButton: false,
                        timer: 1000
                        })
                        </script>";
                    };
                };

                ?>

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Patient Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Patient No.</label>
                                                    <input class="form-control" name="pid" placeholder="Patient No." value="<?= $lastRowId ?>" readonly>
                                                </div>
                                            </div>
                                             <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="required">First Name</label>
                                                    <input class="form-control" name="pfname" maxlength="10" placeholder="First Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="required">Middle Initial</label>
                                                    <input class="form-control" name="mname" maxlength="2" placeholder="Middle Initial" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Last Name</label>
                                                    <input class="form-control" name="lname" maxlength="10" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="pcontact" class="required">Patient Mobile Number</label>
                                                    <input type="tel" class="form-control" id="pcontact" placeholder="Contact Number" name="pcontact" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                    <p class="text-danger" id="cn" style="font-size: 13px; margin-top: 4px"></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label required">Sex</label>
                                                    <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                        <option class="placeholder" style="display: none" value="" >Select Sex</option>
                                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="dob" class="control-label required">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob" name="dob" onchange="submitBday()" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label>Patient Age</label>
                                                    <input class="form-control" id="resultBday" name="age" type="text" placeholder="Age" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Place of Birth <small>(for child)</small></label>
                                                    <input class="form-control" name="placebirth" placeholder="Enter Place of Birth">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Guardian/Mother <small>(for child)</small></label>
                                                    <input class="form-control" name="guardian" placeholder="Enter Guardian/Mother">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="required">Patient Address</label>
                                                    <!-- <input class="form-control" name="paddress" placeholder="Enter Patient Address" required> -->
                                                    <select class="form-control" name="paddress" placeholder="Enter Patient Address" required>
                                                        <option class="placeholder" style="display: none" value="">Select Patient Address</option>
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
                                            </div>                           
                                        </div>                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header mt--4">
                            <h2 class="card-title">Check-up</h2>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="" class="control-label required">Date of Visit</label>
                                                    <input type="date" class="form-control" name="visit" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="required">Blood Pressure</label>
                                                    <input class="form-control" name="bloodpress" placeholder="Sample: 120/80" required>
                                                </div>                                 
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="required">Blood Sugar</label>
                                                    <input class="form-control" name="bloodsugar" placeholder="Sample: 70" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="required">Body Temperature</label>
                                                    <input class="form-control" name="bodytemp" placeholder="Sample: 36.5" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Height</label>
                                                    <input type="number" class="form-control" id="height" name="height" placeholder="Enter height in centimeters" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Weight</label>
                                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight in kilograms" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="bmi">BMI</label>
                                                    <textarea class="form-control" rows="1" id="bmi" name="bmi" readonly></textarea>
                                                    <!-- <span class="form-control" id="bmi" name="bmi" ></span> -->
                                                    <!-- <span id="category">Normal weight</span> -->
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="required">Patient Complaints</label>
                                                    <textarea class="form-control" name="complaints" placeholder="Enter Patient Complaints" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <label class="required">Remarks</label>
                                                    <textarea class="form-control" name="remark" placeholder="Enter Remarks" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Assigned Staff</label>
                                                    <textarea class="form-control" name="assigned" value="" readonly><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <button class="btn btn-primary submit-btn" name="submit">Add Patient Record</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="sidebar-overlay" data-reff=""></div>

                                <!-- //check birthdays start -->
                                <script type='text/javascript'>
                                    function submitBday() {
                                        var Q4A = "";
                                        var Bdate = document.getElementById('dob').value;
                                        var Bday = +new Date(Bdate);
                                        Q4A += ~~((Date.now() - Bday) / (31557600000));
                                        var theBday = document.getElementById('resultBday');
                                        theBday.value = Q4A;
                                    }
                                </script>

                                <!-- COMPUTE BMI -->
                                <script>
                                    $(document).ready(function(){
                                        let keyupTimer;
                                        $('#height').keyup(function(){
                                            var weight = $("#weight").val();
                                            var height = $(this).val();
                                            clearTimeout(keyupTimer);
                                            keyupTimer = setTimeout(function () {
                                                var bmi = (weight / Math.pow( (height/100), 2 )).toFixed(1);
                                                $("#bmi").text(bmi);
                                            }, 400);
                                        });

                                        let keyupTimer2;
                                        $('#weight').keyup(function(){
                                            var weight = $(this).val();
                                            var height = $("#height").val();
                                            clearTimeout(keyupTimer2);
                                            keyupTimer2 = setTimeout(function () {
                                                var bmi = (weight / Math.pow( (height/100), 2 )).toFixed(1);
                                                $("#bmi").text(bmi);
                                            }, 400);
                                        });

// if(result < 18.5){
//     category = "Underweight";
//     result.style.color = "#ffc44d";
// }
// else if( result >= 18.5 && result <= 24.9 ){
//     category = "Normal Weight";
//     result.style.color = "#0be881";
// }
// else if( result >= 25 && result <= 29.9 ){
//     category = "Overweight";
//     result.style.color = "#ff884d";
// }
// else{
//     category = "Obese";
//     result.style.color = "#ff5e57";
// }
// document.getElementById("category").textContent = category;
                                    });
                                </script>

                            </body>

                            </html>