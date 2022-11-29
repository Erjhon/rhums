
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<?php
if(isset($_POST['submit']))
  {
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
    $pres=$_POST['pres'];
   
 
      $query=mysqli_query($conn, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
      if ($query) {
      echo '<script>alert("Medical history has been added.")</script>';
      echo "<script>window.location.href ='history.php&viewid=['id']'</script>";
      
    }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    } 
}

?>
<body>

<?php if($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>



<?php endif;?>

<?php
  $result = mysqli_query($conn,"SELECT * FROM patient_history WHERE id = 'id'");
?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title text-center">Patient Records for Check-Up</h2>
    </div>
<?php
   $vid=$_GET['viewid'];
   $ret=mysqli_query($conn,"select * from patient_history where id='$vid'");
  $cnt=1;
  while ($row=mysqli_fetch_array($ret)) {
?>
<div class="col-md-12">
  <div class="table-responsive">
    <table border="0" class="table table-bordered">
       <tr align="center">
          <tr>
          <th scope>Patient No.</th>
          <td><?php  echo $row['id'];?></td>
          <th scope>Contact Number</th>
          <td><?php  echo $row['contactNo'];?></td>
        </tr>
        <tr>
          <th scope>Name</th>
          <td><?php  echo $row['fullname'];?></td>
          <th>Gender</th>
          <td><?php  echo $row['gender'];?></td>
        </tr>
        <tr>
          <th>Date of Birth</th>
          <td><?php echo date("M d, Y",strtotime($row['dob'])); ?></td>
          <th>Age</th>
          <td><?php  echo $row['age'];?></td>
        </tr>
        <tr>
          <th>Place of Birth <small>(for child)</small></th>
          <td><?php echo date("M d, Y",strtotime($row['dob'])); ?></td>
          <th>Guardian/Mother <small>(for child)</small></th>
          <td><?php  echo $row['age'];?></td>
        </tr>
        <tr>
          <th>Address</th>
          <td><?php  echo $row['address'];?></td>
           <th>Date of Registration</th>
          <td><?php  echo $row['CreationDate'];?></td>
        </tr>
    </tr>
</table>
<?php }?>
<?php  

$ret=mysqli_query($conn,"select * from tblmedicalhistory  where PatientID='$vid'");


 ?>
 <div class="table-responsive">
    <table border="0" class="table table-bordered">
      <h4 class="card-title mt-4" style="font-size: 18px; color:darkblue;">Medical History</h4>
      <tr align="center"> 
      </tr>
      <tr>
        <th>#</th>
        <th>Blood Pressure</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Weight</th>
        <th>Height</th>
        <th>BMI</th>
        <th>Patient Complaints</th>
        <th>Remarks</th>
        <th>Visit Date</th>
        <th>Assigned Staff</th>
      </tr>
    <?php  
    while ($row=mysqli_fetch_array($ret)) { 
      ?>
      <tr>
        <td><?php echo $cnt;?>.</td>
        <td><?php  echo $row['BloodPressure'];?></td>
        <td><?php  echo $row['BloodSugar'];?></td> 
        <td><?php  echo $row['Temperature'];?></td>
        <td><?php  echo $row['Weight'];?></td>
        <td><?php  echo $row['Temperature'];?></td>
        <td><?php  echo $row['Temperature'];?></td>
        <td><?php  echo $row['Temperature'];?></td>
        <td><?php  echo $row['MedicalPres'];?></td>
        <td><?php  echo $row['CreationDate'];?></td> 
        <td><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></td> 
      </tr>
<?php $cnt=$cnt+1;} ?>
</table>

    <p align="center"> <br>                          
     <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

 </div>
<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-hover data-tables">

        <form method="post" name="submit">

        <tr>
          <th>Blood Pressure :</th>
          <td><input name="bp" placeholder="Sample: 120/80"" class="form-control wd-450" required="true"></td>
        </tr>                          
        <tr>
          <th>Blood Sugar :</th>
          <td><input name="bs" placeholder="Sample: 70" class="form-control wd-450" required="true"></td>
        </tr> 
        <tr>
          <th>Body Temperature :</th>
          <td><input name="bs" placeholder="Sample: 36.5" class="form-control wd-450" required="true"></td>
        </tr> 
        <tr>
          <th>Weight :</th>
          <td><input name="weight" placeholder="Enter weight in kilograms" class="form-control wd-450" required="true"></td>
        </tr>
        <tr>
          <th>Height :</th>
          <td><input name="temp" placeholder="Enter height in meters" class="form-control wd-450" required="true"></td>
        </tr>
        <tr>
          <th>Patient Complaints :</th>
          <td><textarea name="pres" placeholder="Enter Patient Complaints" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
        </tr> 
        <tr>
          <th>Remarks :</th>
          <td><textarea name="pres" placeholder="Enter Remarks" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
        </tr>  
  </table>

    <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>



<script type="text/javascript">
    
    $(document).ready( function () {
    $('table').DataTable();
} );
</script>

<!-- patients23:19-->
<!-- </html> -->