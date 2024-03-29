<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `appointments` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
    $qry2 = $conn->query("SELECT * FROM `patient_meta` where patient_id = '{$patient_id}' ");
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $patient[$row['meta_field']] = $row['meta_value'];
    }
  }
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-bottom:0 !important;
}
</style>
<div class="container-fluid">
    <?php error_reporting(0);?>
    <p><b>Appointment Schedule:</b> <?php echo date("M d, Y h:i A",strtotime($date_sched))  ?></p>
    <p><b>Patient Name:</b> <?php echo $patient['name'] ?> <?php echo $patient['mname'] ?>. <?php echo $patient['lname'] ?></p>
    <p><b>Sex:</b> <?php echo ucwords($patient['gender']) ?></p>
    <p><b>Date of Birth:</b> <?php echo date("F d, Y",strtotime($patient['dob'])) ?></p>
    <p><b>Mobile Number:</b> <?php echo $patient['contact'] ?></p>
    <!-- <p><b>Email #:</b> <?php echo $patient['email'] ?></p> -->
    <p><b>Address:</b> <?php echo $patient['address'] ?></p>
    <p><b>Reason for Appointment:</b> <?php echo $reason ?></p>
    <p><b>Status:</b>
        <?php 
        switch($status){ 
            case(0): 
                echo '<span class="badge badge-info">Done</span>';
            break; 
            case(1): 
            echo '<span class="badge badge-success">Confirmed</span>';
            break; 
            case(2): 
                echo '<span class="badge badge-danger">Cancelled</span>';
            break; 
            default: 
                echo '<span class="badge badge-secondary">NA</span>';
        }
        ?>
    </p>
    <p><b>Creation Date:</b>  <?php echo date("M d, Y h:i A",strtotime($row['date_created'])) ?></p>
</div>

<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

