
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
<!-- 


<?php 
    $sql = "select * from appointments";
    $rs = mysqli_query($conn, $sql);
    //get row
    $fetchRow = mysqli_fetch_assoc($rs);
?> 
 -->
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

//get age from date of birth function
function compute_age($dob){

    //date from db (given date of birth)
    $dateOfBirth = new DateTime($dob);

    //get date today
    $today = new DateTime();

    $diff = $today->diff($dateOfBirth);
    return $diff->y;

}

/**
    TITLE: Get patient record form patient_meta table
  * return : array
 */
function get_record_details($patient_id, $conn){

    $query1 = mysqli_query($conn, "SELECT `meta_value` FROM `patient_meta` WHERE `patient_id` = 18 AND `meta_field` = 'name' ");
    $query2 = mysqli_query($conn, "SELECT `meta_value` FROM `patient_meta` WHERE `patient_id` = 18 AND `meta_field` = 'contact' ");
    $query3 = mysqli_query($conn, "SELECT `meta_value` FROM `patient_meta` WHERE `patient_id` = 18 AND `meta_field` = 'dob' ");
    $query4 = mysqli_query($conn, "SELECT `meta_value` FROM `patient_meta` WHERE `patient_id` = 18 AND `meta_field` = 'gender' ");
    $query5 = mysqli_query($conn, "SELECT `meta_value` FROM `patient_meta` WHERE `patient_id` = 18 AND `meta_field` = 'address' ");

    $name = mysqli_fetch_assoc($query1);
    $contact = mysqli_fetch_assoc($query2);
    $dob = mysqli_fetch_assoc($query3);
    $address = mysqli_fetch_assoc($query5);
    $gender = mysqli_fetch_assoc($query4);

    $data = [
        'name' => $name['meta_value'],
        'contact_n' => $contact['meta_value'],
        'dob' => $dob['meta_value'],
        'address' => $address['meta_value'],
        'gender' => $gender['meta_value'],
        'age' => compute_age($dob['meta_value'])
    ];

    return $data;
}
//store data into variable
$data_p = get_record_details($fetchRow['patient_id'], $conn);

?>

 <div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title">Add Patient Record</h2>
    </div>


    <div class="card-body">
        <div class="container-fluid">
            <div class="row" id="appointment">
                <div class="col-lg-8 offset-lg-2">
                    <form action method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Patient No.</label>
                                    <input class="form-control" name="id" placeholder="Patient No." type="text" value="<?php echo $fetchRow['patient_id']?>">
                                </div>
                                
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Patient Fullname</label>
                                    <input class="form-control" name="fullname" placeholder="Enter Patient Fullname" value="<?php echo $data_p['name']?>" required>
                                </div>
                                <!-- type="text" value="<?php echo $fetchRow['id']?>" -->
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Patient Contact No.</label>
                                    <input class="form-control" name="contactNo" placeholder="Enter Patient Contact No." value="<?php echo $data_p['contact_n']?>" required>
                                </div>
                                <!-- type="text" value="<?php echo $fetchRow['id']?>" -->
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gender" class="control-label">Gender</label>
                                    <select type="text" class="custom-select" name="gender" value="<?php echo $data_p['gender']?>" required>
                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected": "" ?>>Male</option>
                                        <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected": ""?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="dob" class="control-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="<?php echo $data_p['dob']?>"  required>
                                </div>
                            </div>
                        
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Patient Age</label>
                                    <input class="form-control" name="age" type="text" placeholder="Enter Patient Age" value="<?php echo $data_p['age']?>" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Patient Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter Patient Address" value="" required><?php echo $data_p['address']?></textarea>
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
                            <button class="btn btn-primary submit-btn" name="submit">Add Patient Record</button>
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