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

   <?php

if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $pfname = $_POST['pfname'];
    $pcontact = $_POST['pcontact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $paddress = $_POST['paddress'];
    $visit = $_POST['visit'];
    $incident = $_POST['incident'];
    $source = $_POST['source'];
    $part = $_POST['part'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $owner = $_POST['owner'];
    $ownercon = $_POST['ownercon'];
    $location = $_POST['location'];
    $remark = $_POST['remark'];
    $assigned = $_POST['assigned'];
    $user_id = $_SESSION['userdata']['id'];
    $insert = mysqli_query($conn, "INSERT INTO `patient_list`(id, name, user_id) VALUES('$pid', '$pfname', '$user_id')") or die('query failed');

    $sql = "INSERT INTO animalbite (pid,pfname,pcontact,gender,dob,age,paddress,visit,incident,source,part,category,type,owner,ownercon,location,remark,assigned)
    VALUES ('$pid','$pfname','$pcontact','$gender','$dob','$age','$paddress','$visit','$incident','$source','$part','$category','$type','$owner','$ownercon','$location','$remark','$assigned')";
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
                window.location.href ='?page=list-animalbite';
                });
                </script>.$message.";
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
                </script>.$error.";
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Patient No.</label>
                                        <input class="form-control" name="pid" placeholder="Patient No." value="<?= $lastRowId ?>" readonly>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Patient Fullname</label>
                                        <input class="form-control" name="pfname" placeholder="Enter Patient Fullname" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Patient Contact Number</label>
                                        <!-- <input class="form-control" name="pcontact" placeholder="Enter Patient Contact Number" required maxlength="11"> -->
                                     <input type="tel" class="form-control" id="pcontact" placeholder="Contact Number" name="pcontact" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        <p class="text-danger" id="cn" style="font-size: 13px; margin-top: 4px"></p>
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

                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Patient Age</label>
                                        <input class="form-control" id="resultBday" name="age" type="text" placeholder="Age" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Patient Address</label>
                                         <select class="form-control" name="paddress" placeholder="Enter Patient Address" required>
                                                    <option class="placeholder" style="display: none" >Select Patient Address</option>
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
            <h2 class="card-title">Animal Bite</h2>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="visit" class="control-label">Date of Visit</label>
                                        <input type="date" class="form-control" name="visit" >
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="incident" class="control-label">Date of Incident</label>
                                        <input type="date" class="form-control" id="incident" name="incident" value="<?php echo isset($patient['incident']) ? $patient['incident'] : '' ?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="source" class="control-label">Source</label>
                                        <select type="text" class="form-control form-select-sm-6" name="source" required>
                                            <option class="placeholder" style="display: none" >Select Source</option>
                                            <option <?php echo isset($patient['source']) && $patient['source'] == "Dog" ? "selected" : "" ?>>Dog</option>
                                            <option <?php echo isset($patient['source']) && $patient['source'] == "Cat" ? "selected" : "" ?>>Cat</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Part of Body Bitten</label>
                                        <input class="form-control" name="part" placeholder="Sample: Left Leg" required maxlength="11">
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="category" class="control-label">Category</label>
                                        <select type="text" class="form-control form-select-sm-6" name="category" required>
                                            <option class="placeholder" style="display: none" >Select Category</option>
                                            <option <?php echo isset($patient['category']) && $patient['category'] == "I" ? "selected" : "" ?>>I</option>
                                            <option <?php echo isset($patient['category']) && $patient['category'] == "II" ? "selected" : "" ?>>II</option>
                                            <option <?php echo isset($patient['category']) && $patient['category'] == "III" ? "selected" : "" ?>>III</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="type" class="control-label">Type</label>
                                        <select type="text" class="form-control form-select-sm-6" name="type" required>
                                            <option class="placeholder" style="display: none" >Select Type</option>
                                            <option <?php echo isset($patient['type']) && $patient['type'] == "Bite" ? "selected" : "" ?>>Bite</option>
                                            <option <?php echo isset($patient['type']) && $patient['type'] == "Scratch" ? "selected" : "" ?>>Scratch</option>
                                        </select>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <small>(Pet Owner)</small></label>
                                        <input class="form-control" name="owner" placeholder="Enter Name" required maxlength="11">
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Contact Number <small>(Pet Owner)</small></label>
                                     <input type="tel" class="form-control" id="ownercon" placeholder="Contact Number" name="ownercon" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <p class="text-danger" id="cn" style="font-size: 13px; margin-top: 4px"></p>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Location of biting incident</label>
                                        <textarea class="form-control" name="location" placeholder="Enter Location of biting incident" required></textarea>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                </div>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remark" placeholder="Enter Remarks" ></textarea>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Assigned Staff</label>
                                        <textarea class="form-control" name="assigned" readonly><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></textarea>
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

</body>

</html>