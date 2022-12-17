<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <?php require_once('../config.php'); ?>
    <?php require_once('inc/header.php') ?>

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
 error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $dob = $_POST['dob'];
    $fsn = $_POST['fsn'];
    $child = $_POST['child'];
    $sex = $_POST['sex'];
    $mother = $_POST['mother'];
    $address = $_POST['address'];
    $cpab = $_POST['cpab'];
    $age = $_POST['age'];
    $blength = $_POST['blength'];
    $bweight = $_POST['bweight'];
    $status = $_POST['status'];
    $stat = $_POST['stat'];
    $breastfeed = $_POST['breastfeed'];
    $bcg = $_POST['bcg'];
    $hepa = $_POST['hepa'];
    $monthage =$_POST['monthage'];
    $length = $_POST['length'];
    $weight = $_POST['weight'];
    $ltaken = $_POST['ltaken'];
    $wtaken = $_POST['wtaken'];
    $weightgiven = $_POST['weightgiven'];
    $for1month = $_POST['for1month'];
    $for2month = $_POST['for2month'];
    $for3month= $_POST['for3month'];
    $immunization = $_POST['immunization'];
    $dose = $_POST['dose'];
    $doi = $_POST['doi'];
    $exbf = $_POST['exbf'];
    $age11m = $_POST['age11m'];
    $length11m = $_POST['length11m'];
    $weight11m = $_POST['weight11m'];
    $wtaken11m = $_POST['wtaken11m'];
    $ltaken11m = $_POST['ltaken11m'];
    $status11m = $_POST['status11m'];
    $exbf11m = $_POST['exbf11m'];
    $infant = $_POST['infant'];
    $feeding = $_POST['feeding'];
    $breastfed = $_POST['breastfed'];
    $vitamin = $_POST['vitamin'];
    $mnp = $_POST['mnp'];
    $mvc1 = $_POST['mvc1'];
    $mvc2 = $_POST['mvc2'];
    $fic = $_POST['fic'];
    $cic = $_POST['cic'];
    $assigned = $_POST['assigned'];
    $remarks = $_POST['remarks'];
    $user_id = $_SESSION['userdata']['id'];
    $insert = mysqli_query($conn, "INSERT INTO `patient_list`(id, name, user_id) VALUES('$id', '$child', '$user_id')") or die('query failed');

    $sql = "INSERT INTO immunization_child (id,dob,fsn,child,sex,mother,address,cpab,age,blength,bweight,status,stat,breastfeed,bcg,hepa,monthage,length,weight,ltaken,wtaken,weightgiven,for1month,for2month,for3month,immunization,dose,doi,exbf,age11m,length11m,weight11m,wtaken11m,ltaken11m,status11m,exbf11m,infant,feeding,breastfed,vitamin,mnp,mvc1,mvc2,fic,cic,assigned,remarks)
    VALUES ('$id','$dob','$fsn','$child','$sex','$mother','$address','$cpab','$age','$blength','$bweight','$status','$stat','$breastfeed','$bcg','$hepa','$monthage','$length','$weight','$ltaken','$wtaken','$weightgiven','$for1month','$for2month','$for3month','$immunization','$dose','$doi','$exbf','$age11m','$length11m','$weight11m','$wtaken11m','$ltaken11m','$status11m','$exbf11m','$infant','$feeding','$breastfed','$vitamin','$mnp','$mvc1','$mvc2','$fic','$cic','$assigned','$remarks')";
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


<!-- display success message -->
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
                window.location.href ='?page=list-immunization';
                });
                </script>.$message.";
            }
        }
        ?>

        <!-- //display error -->
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<div class=" text-center alert alert-danger text-white err_msg"><i class="fa fa-exclamation-triangle"> </i>'.$error.'</div>';
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
                            <form action method="POST">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Patient No.</label>
                                            <input class="form-control" name="id" placeholder="Patient No." value="<?= $lastRowId ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Family Serial Number</label>
                                            <input class="form-control" name="fsn" placeholder="Enter Family Serial Number">
                                        </div>
                                        <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name of Child</label>
                                            <input class="form-control" name="child" placeholder="First Name, Middle Initial, Last Name">
                                        </div>
                                        <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="dob" class="control-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" onchange="submitBday()" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="sex" class="control-label">Sex</label>
                                            <select type="text" class="form-control form-select-sm-6" name="sex">
                                                <option class="placeholder" style="display: none" >Select Sex</option>
                                                <option <?php echo isset($patient['sex']) && $patient['sex'] == "Male" ? "selected" : "" ?>>Male</option>
                                                <option <?php echo isset($patient['sex']) && $patient['sex'] == "Female" ? "selected" : "" ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Complete Name of Mother</label>
                                            <input class="form-control" name="mother" placeholder="Last Name, First Name, Middle Initial">
                                        </div>
                                        <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Complete Address</label>
                                            <input class="form-control" name="address" placeholder="Enter Complete Address">
                                        </div>
                                    </div>
                                </div>

<!-- <div class="col-3">
<div class="form-group">
<label for="dob" class="control-label">Date of Registration</label>
<input type="date" class="form-control" id="dor" name="dor" value="<?php echo isset($patient['dor']) ? $patient['dor'] : '' ?>">
</div>
</div> -->
</div>
</div>
</div>
</div>



<div class="card-header mt--4">
    <h2 class="card-title">Immunization and Nutrition Services for Infants Age 0-11 Months Old and Children Age 12 Months Old</h2>
</div>

<div class="card-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="cpab" class="control-label">Child Protected at Birth (CPAB)</label>
                             <select type="text" class="form-control form-select-sm-6" name="cpab" required>
              <option class="placeholder" style="display: none" >Select Option</option>
              <option <?php echo isset($patient['cpab']) && $patient['cpab'] == "TT2/Td2" ? "selected" : "" ?>>TT2/Td2</option>
              <option <?php echo isset($patient['cpab']) && $patient['cpab'] == "TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)" ? "selected" : "" ?>>TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)</option>
            </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="age" class="control-label">Age</label>
                                    <select id="selection" type="text" class="form-control form-select-sm-6" name="age">
                                        <option class="placeholder" style="display: none"> Select Age</option>
                                        <option value="Newborn"> Newborn (0-28 days old)</option>
                                        <option value="1-3Months"> 1-3 Months old</option>
                                        <option value="6-11Months"> 6-11 Months old</option>
                                        <option value="12Months"> 12 Months old</option>   
                                    </select>
                                </div>
                            </div>

                            <span class="Data" id="showNewborn">
                                <div class="row pl-3 pr-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Length at Birth <small>(cm)</small></label>
                                            <input type="number" class="form-control" name="blength">
                                        </div>
                                        <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Weight at Birth <small>(kg)</small></label>
                                            <input type="number" class="form-control" name="bweight">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="status" class="control-label">Status <small>(Birth Weight)</small></label>
                                            <select type="text" class="form-control form-select-sm-6" name="stat">
                                                <option class="placeholder" style="display: none" >Select stat</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "L - low < 2500gms" ? "selected" : "" ?>>L - low < 2500gms</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "N - normal > 2500gms" ? "selected" : "" ?>>N - normal > 2500gms</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "U - unknown" ? "selected" : "" ?>>U - unknown</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="breastfeed" class="control-label">Initiated breast feeding immediately after birth lasting for 90 minutes </label>
                                            <input type="date" class="form-control" id="breastfeed" name="breastfeed" value="<?php echo isset($patient['breastfeed']) ? $patient['breastfeed'] : '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <label for="bcg"><b>Immunization</b></label>

                                        <div class="row mt--2">
                                            <div class="col-sm-6">
                                                <div class="form-group">        
                                                    <label for="bcg" class="control-label">BCG</label>
                                                    <input type="date" class="form-control" id="bcg" name="bcg" value="<?php echo isset($patient['bcg']) ? $patient['bcg'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="hepa" class="control-label">Hepa B-BD</label>
                                                    <input type="date" class="form-control" id="hepa" name="hepa" value="<?php echo isset($patient['hepa']) ? $patient['hepa'] : '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>


                            <span class="Data" id="show1-3Months">
                                <div class="col-sm-12">
                                    <label for="gender"><b>Nutritional Status Assessment</b></label>

                                    <div class="row mt--2">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Age <small>(in months)</small></label>
                                                <input type="number" class="form-control" name="monthage" >
                                            </div>
                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Length <small>(cm)</small></label>
                                                <input type="number" class="form-control" name="length" >
                                            </div>
                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">        
                                                <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                                <input type="date" class="form-control" id="ltaken" name="ltaken" value="<?php echo isset($patient['ltaken']) ? $patient['ltaken'] : '' ?>" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Weight <small>(kg)</small></label>
                                                <input type="number" class="form-control" name="weight" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">        
                                                <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                                <input type="date" class="form-control" id="wtaken" name="wtaken" value="<?php echo isset($patient['wtaken']) ? $patient['wtaken'] : '' ?>" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gender" class="control-label">Status </label>
                                                <select type="text" class="form-control form-select-sm-6" name="status" >
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
                                                <select id="select" type="text" class="form-control form-select-sm-6" name="weightgiven" >
                                                    <option class="placeholder" style="display: none" >Select month/s</option>
                                                    <option value="1month">1 month</option>
                                                    <option value="2months">2 months</option>
                                                    <option value="3months">3 months</option>
                                                </select>
                                            </div>
                                        </div>  


                                        <div class="1month Data col-lg-3" id="print1month">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for1month" name="date" value="<?php echo isset($patient['for1month']) ? $patient['for1month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="2months Data col-lg-3"  id="print2months">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for2month" name="date" value="<?php echo isset($patient['for2month']) ? $patient['for2month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="3months Data col-lg-3"  id="print3month">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for3month" name="date" value="<?php echo isset($patient['for3month']) ? $patient['for3month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender">Immunization </label>
                                                <select type="text" class="form-control form-select-sm-6" name="immunization" >
                                                    <option class="placeholder" style="display: none" >Select Immunization</option>
                                                    <option value="DPT-HIB-HepB">DPT-HIB-HepB</option>
                                                    <option value="OPV">OPV</option>
                                                    <option value="PCV">PCV</option>
                                                    <option value="IPV">IPV</option>
                                                </select>
                                            </div>
                                        </div>   

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender">Dose </label>
                                                <select type="text" class="form-control form-select-sm-6" name="dose" >
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
                                                <input type="date" class="form-control" id="doi" name="doi" value="<?php echo isset($patient['doi']) ? $patient['doi'] : '' ?>" >
                                            </div>
                                        </div> 

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="gender" class="control-label">Exclusive Breastfeeding</label>
<!--    <div class="selectBox" onclick="showCheckboxes()">
<select class="form-control form-select-sm-6">
<option class="placeholder" style="display: none">Select an option</option>
</select>
<div class="overSelect"></div>
</div> -->
<div class="form-group">
    <label for="1 1/2 months">
        <input type="checkbox" name="exbf" value="1 1/2 months"> 1 1/2 months</label>
        <label for="2 1/2 months" >
            <input type="checkbox" name="exbf" value=" 2 1/2 months"> 2 1/2 months</label>
            <label for="3 1/2 months">
                <input type="checkbox" name="exbf" value=" 3 1/2 months"> 3 1/2 months</label>
                <label for="4-5 months">
                    <input type="checkbox" name="exbf" value=" 4-5 months"> 4-5 months</label>
                </div>
            </div>
        </div>    
    </div>
</div>
</span>

<span class="Data" id="show6-11Months">
    <div class="col-sm-12">
        <label for="gender"><b>Nutritional Status Assessment</b></label>

        <div class="row mt--2">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Age <small>(in months)</small></label>
                    <input type="number" class="form-control" name="age11m" >
                </div>
                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Length <small>(cm)</small></label>
                    <input type="number" class="form-control" name="length11m" >
                </div>
                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
            </div>

            <div class="col-sm-4">
                <div class="form-group">        
                    <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                    <input type="date" class="form-control" id="ltaken11m" name="ltaken11m" value="<?php echo isset($patient['ltaken11m']) ? $patient['ltaken11m'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Weight <small>(kg)</small></label>
                    <input type="number" class="form-control" name="weight11m" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">        
                    <label for="date taken" class="control-label">Date Taken <small>(Weight)</small></label>
                    <input type="date" class="form-control" id="wtaken11m" name="wtaken11m" value="<?php echo isset($patient['wtaken11m']) ? $patient['wtaken11m'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="status" class="control-label">Status </label>
                    <select type="text" class="form-control form-select-sm-6" name="status11m" >
                        <option class="placeholder" style="display: none" >Select Status</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exbf11m">Exclusively Breastfed up to 6 months</label>
                    <select type="text" class="form-control form-select-sm-6" name="exbf11m" >
                        <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">        
                    <label for="gender" class="control-label">Date when the infant was assessed</label>
                    <input type="date" class="form-control" id="infant" name="infant" value="<?php echo isset($patient['infant']) ? $patient['infant'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gender">Introduction of Complementary Feeding at 6 months old</label>
                    <select type="text" class="form-control form-select-sm-6" name="feeding" >
                        <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gender">1 <small>- With continuous breastfeeding</small><br>
                        2 <small>- No longer breastfeeding or never breastfed</small></label>
                        <select type="text" class="form-control form-select-sm-6" name="breastfed" >
                            <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">        
                        <label for="gender" class="control-label">Vitamin A <small>(date given)</small></label>
                        <input type="date" class="form-control" id="vitamin" name="vitamin" value="<?php echo isset($patient['vitamin']) ? $patient['vitamin'] : '' ?>" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>MNP <small>(date when 90 sachets given)</small></label>
                        <input type="date" class="form-control" name="mnp" >
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>MCV 1 Dose at 9th month <small>(date given)</small></label>
                        <input type="date" class="form-control" name="mcv1" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>MCV 2 Dose 2</label>
                        <input type="date" class="form-control" name="mcv2" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>FIC</label>
                        <input type="date" class="form-control" name="fic" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>CIC</label>
                        <input type="date" class="form-control" name="cic" >
                    </div>
                </div>
            </span>

            <span class="Data" id="show12Months">
                <div class="col-sm-12">
                    <label for="Nutritional"><b>Nutritional Status Assessment</b></label>

                    <div class="row mt--2">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Age <small>(in months)</small></label>
                                <input type="number" class="form-control" name="age12" >
                            </div>
                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Length <small>(cm)</small></label>
                                <input type="number" class="form-control" name="length12" >
                            </div>
                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">        
                                <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                <input type="date" class="form-control" id="ltaken12" name="ltaken12" value="<?php echo isset($patient['ltaken12']) ? $patient['ltaken12'] : '' ?>" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Weight <small>(kg)</small></label>
                                <input type="number" class="form-control" name="weight12" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">        
                                <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                <input type="date" class="form-control" id="wtaken12" name="wtaken12" value="<?php echo isset($patient['wtaken12']) ? $patient['wtaken12'] : '' ?>" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="status" class="control-label">Status </label>
                                <select type="text" class="form-control form-select-sm-6" name="status12" >
                                    <option class="placeholder" style="display: none" >Select Status</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </span>


        </div>
    </div>
</span>
</div>

<div class="row">
    <div class="col-sm-9">
        <div class="form-group">
            <label>Remarks</label>
            <textarea class="form-control" name="remarks" placeholder="Enter remarks" ></textarea>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group ">
            <label>Assigned Staff</label>
            <textarea class="form-control" name="assigned" value="" readonly><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></textarea>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<div class="mt-2 text-center">
    <button class="btn btn-primary submit-btn" name="submit">Add Patient Record</button>
</div>  
</form>

</div>
<div class="sidebar-overlay" data-reff=""></div>

<!-- Core -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- jQuery Show|Hide Elements Using Selection option in span -->
<script>
    $(document).ready(function(){
        $('#selection').on('change', function(){
            var demovalue = $(this).val(); 
            $("span.Data").hide();
            $("#show"+demovalue).show();
        });
    });
</script> 

<script>
    $(document).ready(function(){
        $('#select').on('change', function(){
            var demovalue = $(this).val(); 
            $("div.Data").hide();
            $("#print"+demovalue).show();
        });
    });
</script> 


<!-- jQuery Show|Hide Elements Using Selection option using class -->
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

<!-- //check birthdays start -->
<script type='text/javascript'>
    function submitBday() {
        var Q4A = "";
        var Bdate = document.getElementById('dob').value;
        var Bday = +new Date(Bdate);
        Q4A += ~~((Date.now() - Bday) / (31557600000));

        var dobMonth = dob.getMonth();
//get the current date from the system
        var now = new Date();
        var currentMonth = now.getMonth();
//get months
        if (currentMonth >= dobMonth)
//get months when current month is greater
            var monthAge = currentMonth - dobMonth;
        else {
            yearAge--;
            var monthAge = 12 + currentMonth - dobMonth;
        }
        var theBday = document.getElementById('resultBday');
        theBday.value = Q4A;
    }
</script>  


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
        var checkboxes = document.getElementsByName('cpab')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>


</body>

</html>