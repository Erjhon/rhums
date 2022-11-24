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
            <h2 class="card-title">Visual Acuity Screening and PPV Immunization for Senior Citizens</h2>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action method="POST">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Patient No.</label>
                                        <input class="form-control" name="id" placeholder="Patient No." value="<?= $lastRowId ?>" readonly>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Date of Assessment</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Family Serial Number</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Family Serial Number" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>OSCA ID No.</label>
                                        <input class="form-control" name="fullname" placeholder="Enter OSCA ID No." required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="fullname" placeholder="Family Name, First Name, Middle Initial" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Complete Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter Complete Address" required></textarea>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Sex</label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option class="placeholder" style="display: none" >Select Sex</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Age" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Eye Complaints <small>(blurred, floaters, blind spots, redness, photopsia, glare) </small></label>
                                        <label><small>/ - with atleast one <br> X - none of the above</small></label>
                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                            <option >/</option>
                                            <option >X</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-7">
                                    <label>Visual Acuity <small>(Input results as fraction) </small></label>    
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>20/40</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Age in years" required>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>> 20/40</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Age in years" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>


                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">PPV Immunization <small>(Date given)</small></label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
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