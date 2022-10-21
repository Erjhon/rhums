
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>
<body>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>

<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-top:0 !important;
}
</style>
<?php endif;?>

<?php
if(isset($_POST['submit']))
{    
     $id = $_POST['id'];
     $fullname = $_POST['fullname'];
     $contactNo = $_POST['contactNo'];
     $gender = $_POST['gender'];
     $dob = $_POST['dob'];
     $age = $_POST['age'];
     $address = $_POST['address'];
     $medHistory = $_POST['medHistory'];
     $sql = "INSERT INTO patient_history (id,fullname,contactNo,gender,dob,age,address,medHistory)
     VALUES ('$id','$fullname','$contactNo','$gender', '$dob', '$age', '$address', '$medHistory')";
     if (mysqli_query($conn, $sql)) {

        echo '<script>alert("Form submitted successfully")</script>';;
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>

 <div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title">Add Patient Record</h2>
    </div>
   
    <div class="card-body">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Patient No.</label>
                                        <input class="form-control" name="id" placeholder="Patient No.">
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id']?>" -->
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Patient Fullname</label>
                                        <input class="form-control" name="fullname" placeholder="Enter Patient Fullname" required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id']?>" -->
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Patient Contact No.</label>
                                        <input class="form-control" name="contactNo" placeholder="Enter Patient Contact No." required>
                                    </div>
                                    <!-- type="text" value="<?php echo $fetchRow['id']?>" -->
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select type="text" class="custom-select" name="gender" required>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected": "" ?>>Male</option>
                                            <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected": ""?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="dob" class="control-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>"  required>
                                    </div>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Patient Age</label>
                                        <input class="form-control" name="age" type="text" placeholder="Enter Patient Age" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Patient Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter Patient Address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Medical History</label>
                                        <textarea class="form-control" name="medHistory" placeholder="Enter Patient Medical History(if any)"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit">Create Consultation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>


</body>


<!-- add-patient24:07-->
</html>