<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<body>

    <?php if ($_settings->chk_flashdata('success')) : ?>
        <script>
            alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
        </script>

        <style>
            #uni_modal .modal-content>.modal-footer {
                display: none;
            }

            #uni_modal .modal-body {
                padding-top: 0 !important;
            }
        </style>
    <?php endif; ?>
    <!-- 

<?php
$sql = "select * from appointments";
$rs = mysqli_query($conn, $sql);
//get row
$fetchRow = mysqli_fetch_assoc($rs);
?> 
 -->
    <?php

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $contactNo = $_POST['contactNo'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $medHistory = $_POST['medHistory'];
        $user_id = $_SESSION['userdata']['id'];
        $insert = mysqli_query($conn, "INSERT INTO `patient_list`(id, name, user_id) VALUES('$id', '$fullname', '$user_id')") or die('query failed');

        $sql = "INSERT INTO patient_history (id,fullname,contactNo,gender,dob,age,address,medHistory,user_id)
     VALUES ('$id','$fullname','$contactNo','$gender', '$dob', '$age', '$address', '$medHistory', '$user_id')";
        if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Form submitted successfully")</script>';
            echo "<script>window.location.href ='?page=consultation'</script>";
        }
        // mysqli_close($conn);
    }
    $getLastRow = mysqli_query($conn, "SELECT `id` FROM `patient_list` ORDER BY id DESC LIMIT 1");
    $lastRow = mysqli_fetch_assoc($getLastRow);
    $lastRowId = intval($lastRow['id']) + 1;
    ?>



    <div class="card card-outline card-primary">
        <div class="card-header">
            <h2 class="card-title">Patient Information</h2>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action method="POST">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Patient No.</label>
                                        <input class="form-control" name="id" placeholder="Patient No." value="<?= $lastRowId ?>" readonly>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Name of Child</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Name of Child" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mother's Name</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Mother's Name" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option class="placeholder" style="display: none" >Select Gender</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" onchange="submitBday()" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <textarea class="form-control" name="address" placeholder="Enter Place of Birth" required></textarea>
                                    </div>
                                </div>
                               <!--  <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Medical History</label>
                                        <textarea class="form-control" name="medHistory" placeholder="Enter Patient Medical History(if any)"></textarea>
                                    </div>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <h2 class="card-title">Immunization</h2>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action method="POST">
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Age</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Age 0-11 Months & Children 12 Months old(1/4)</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Age 0-11 Months & Children 12 Months old(2/4)</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Age 0-11 Months & Children 12 Months old(3/4)</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Age 0-11 Months & Children 12 Months old(4/4)</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Immunization</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>DPT-HIB-HepB</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>OPV</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>PCV</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>IPV</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Vaccine</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Months</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>1 1/2 Months</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>2 1/2 Months</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>3 1/2 Months</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>4-5 Months</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Length at Birth</label>
                                        <input type="number" class="form-control" name="contactNo" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Weight at Birth</label>
                                        <input type="number" class="form-control" name="contactNo" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Birth Status</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>L - low < 2500 gms</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N - normal > 2500 gms</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Dose</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>1st Dose</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>2nd Dose</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>3rd Dose</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Assigned Staff</label>
                                        <textarea class="form-control" name="address" placeholder="Enter Staff Name" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="address" placeholder="Enter remarks" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit">Add Patient Record</button>
                            </div>


        </div>
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

</body>

</html>