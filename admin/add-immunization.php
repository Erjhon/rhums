<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<head>
    <style>
        .multiselect {
            width: 400px;
        }

        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }


    </style>
</head>
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
        <h2 class="card-title">Immunization and Nutrition Services for Infants Age 0-11 Months Old and Children Age 12 Months Old</h2>
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
                                    <label for="dob" class="control-label">Date of Registration</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dob" class="control-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" onchange="submitBday()" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Family Serial Number</label>
                                    <input class="form-control" name="fullname" placeholder="Enter Family Serial Number" required>
                                </div>
                                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Name of Child</label>
                                    <input class="form-control" name="fullname" placeholder="First Name, Middle Initial, Last Name" required>
                                </div>
                                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gender" class="control-label">Sex</label>
                                    <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                        <option class="placeholder" style="display: none" >Select Sex</option>
                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Complete Name of Mother</label>
                                    <input class="form-control" name="fullname" placeholder="Last Name, First Name, Middle Initial" required>
                                </div>
                                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Complete Address</label>
                                    <input class="form-control" name="address" placeholder="Enter Complete Address" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender" class="control-label">Child Protected at Birth (CPAB)</label>
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select class="form-control form-select-sm-6">
                                            <option class="placeholder" style="display: none">Select an option</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" name="check" id="one" onclick="onlyOne(this)"/> TT2/Td2</label>
                                            <label for="two">
                                                <input type="checkbox" name="check" id="two" onclick="onlyOne(this)"/> TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                    <script>
                                        $(document).ready(function(){
                                            $("select").change(function(){
                                                $(this).find("option:selected").each(function(){
                                                    var optionValue = $(this).attr("value");
                                                    if(optionValue){
                                                        $(".data").not("." + optionValue).hide();
                                                        $("." + optionValue).show();
                                                    } else{
                                                        $(".data").hide();
                                                    }
                                                });
                                            }).change();
                                        });
                                    </script>   

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="gender" class="control-label">Age</label>
                                            <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                <option class="placeholder" style="display: none"> Select Age</option>
                                                <option value="newborn"> Newborn (0-28 days old)</option>
                                                <option value="1-3M"> 1-3 Months old</option>
                                                <option value="6-11M"> 6-11 Months old</option>
                                                <option value="12M"> 12 Months old</option>   
                                            </select>
                                        </div>
                                    </div>

                                    <span class="newborn data">
                                        <div class="row pl-3 pr-3">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Length at Birth <small>(cm)</small></label>
                                                    <input type="number" class="form-control" name="contactNo" required>
                                                </div>
                                                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Weight at Birth <small>(kg)</small></label>
                                                    <input type="number" class="form-control" name="contactNo" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Status <small>(Birth Weight)</small></label>
                                                    <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                        <option class="placeholder" style="display: none" >Select Status</option>
                                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>L - low < 2500gms</option>
                                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N - normal > 2500gms</option>
                                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>U - unknown</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="dob" class="control-label">Initiated breast feeding immediately after birth lasting for 90 minutes </label>
                                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <label for="gender"><b>Immunization</b></label>

                                                <div class="row mt--2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">        
                                                            <label for="gender" class="control-label">BCG</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gender" class="control-label">Hepa B-BD</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    <span class="1-3M data">
                                        <div class="col-sm-12">
                                            <label for="gender"><b>Nutritional Status Assessment</b></label>

                                            <div class="row mt--2">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Age <small>(in months)</small></label>
                                                        <input type="number" class="form-control" name="contactNo" required>
                                                    </div>
                                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Length <small>(cm)</small></label>
                                                        <input type="number" class="form-control" name="contactNo" required>
                                                    </div>
                                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">        
                                                        <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Weight <small>(kg)</small></label>
                                                        <input type="number" class="form-control" name="contactNo" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">        
                                                        <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="gender" class="control-label">Status </label>
                                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                            <option class="placeholder" style="display: none" >Select Status</option>
                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="gender">Low birth weight given </label>
                                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                            <option class="placeholder" style="display: none" >Select month/s</option>
                                                            <option value="1month">1 month</option>
                                                            <option value="2months">2 months</option>
                                                            <option value="3months">3 months</option>
                                                        </select>
                                                    </div>
                                                </div>  


                                                <span class="1month data">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gender" class="control-label">Date</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                        </div>
                                                    </div>
                                                </span>

                                                <span class="2months data">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gender" class="control-label">Date</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                        </div>
                                                    </div>
                                                </span>

                                                <span class="3months data">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gender" class="control-label">Date</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                        </div>
                                                    </div>
                                                </span>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="gender">Immunization </label>
                                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                            <option class="placeholder" style="display: none" >Select Immunization</option>
                                                            <option value="1month">DPT-HIB-HepB</option>
                                                            <option value="2months">OPV</option>
                                                            <option value="3months">PCV</option>
                                                            <option value="3months">IPV</option>
                                                        </select>
                                                    </div>
                                                </div>   

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="gender">Dose </label>
                                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                            <option class="placeholder" style="display: none" >Select Dose</option>
                                                            <option>1st Dose</option>
                                                            <option>2nd Dose</option>
                                                            <option>3rd Dose</option>
                                                        </select>
                                                    </div>
                                                </div> 

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="gender" class="control-label">Date of Immunization</label>
                                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                    </div>
                                                </div> 

                                                <div hidden class="col-6">
                                                    <div class="form-group">
                                                        <label for="gender" class="control-label">Exclusive Breastfeeding</label>
                                                        <div class="selectBox" onclick="showCheckboxes()">
                                                            <select class="form-control form-select-sm-6">
                                                                <option class="placeholder" style="display: none">Select an option</option>
                                                            </select>
                                                            <div class="overSelect"></div>
                                                        </div>
                                                        <div id="checkboxes">
                                                            <label for="one">
                                                                <input type="checkbox" name="check" id="one" onclick="onlyOne(this)"/> 1 1/2 months</label>
                                                                <label for="two">
                                                                    <input type="checkbox" name="check" id="two" onclick="onlyOne(this)"/> 2 1/2 months</label>
                                                                    <label for="two">
                                                                        <input type="checkbox" name="check" id="two" onclick="onlyOne(this)"/> 3 1/2 months</label>
                                                                        <label for="two">
                                                                            <input type="checkbox" name="check" id="two" onclick="onlyOne(this)"/> 4-5 months</label>
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div>

                                                    </span>

                                                    <span class="6-11M data">
                                                        <div class="col-sm-12">
                                                            <label for="gender"><b>Nutritional Status Assessment</b></label>

                                                            <div class="row mt--2">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Age <small>(in months)</small></label>
                                                                        <input type="number" class="form-control" name="contactNo" required>
                                                                    </div>
                                                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Length <small>(cm)</small></label>
                                                                        <input type="number" class="form-control" name="contactNo" required>
                                                                    </div>
                                                                    <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">        
                                                                        <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Weight <small>(kg)</small></label>
                                                                        <input type="number" class="form-control" name="contactNo" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">        
                                                                        <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="gender" class="control-label">Status </label>
                                                                        <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                                            <option class="placeholder" style="display: none" >Select Status</option>
                                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </span>

                                                            <span class="12M data">
                                                                <div class="col-sm-12">
                                                                    <label for="gender"><b>Nutritional Status Assessment</b></label>

                                                                    <div class="row mt--2">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label>Age <small>(in months)</small></label>
                                                                                <input type="number" class="form-control" name="contactNo" required>
                                                                            </div>
                                                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label>Length <small>(cm)</small></label>
                                                                                <input type="number" class="form-control" name="contactNo" required>
                                                                            </div>
                                                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">        
                                                                                <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                                                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label>Weight <small>(kg)</small></label>
                                                                                <input type="number" class="form-control" name="contactNo" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">        
                                                                                <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                                                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label for="gender" class="control-label">Status </label>
                                                                                <select type="text" class="form-control form-select-sm-6" name="gender" required>
                                                                                    <option class="placeholder" style="display: none" >Select Status</option>
                                                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </span>




                                                                    <!-- </div> -->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



<!-- <div class="card-body">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<form action method="POST">
<div class="row">





</div>
</form>
</div>
</div>
</div>

</div> -->


</div>
<div class="col-sm-12">
    <div class="form-group ml--3 mr--3">
        <label>Remarks</label>
        <textarea class="form-control" name="address" placeholder="Enter remarks" required></textarea>
    </div>
</div>

<div class="mt-2 text-center">
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

<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('check')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>


</body>

</html>