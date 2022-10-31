
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
        <h2 class="card-title text-center">Patient Records</h2>
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
          <th scope>Patient Name</th>
          <td><?php  echo $row['fullname'];?></td>
          <th scope>Patient Mobile Number</th>
          <td><?php  echo $row['contactNo'];?></td>
        </tr>
        <tr>
          <th>Patient Gender</th>
          <td><?php  echo $row['gender'];?></td>
          <th>Patient Address</th>
          <td><?php  echo $row['address'];?></td>
        </tr>
          <tr>
          <th>Patient Date of Birth</th>
          <td><?php echo date("M d, Y",strtotime($row['dob'])); ?></td>
          <th>Patient Age</th>
          <td><?php  echo $row['age'];?></td>
        </tr>
        <tr>
          <th>Patient Medical History(if any)</th>
          <td><?php  echo $row['medHistory'];?></td>
           <th>Patient Reg Date</th>
          <td><?php  echo $row['CreationDate'];?></td>
        </tr>
 
<?php }?>
</table>
<?php  

$ret=mysqli_query($conn,"select * from tblmedicalhistory  where PatientID='$vid'");


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
    <th colspan="8" >Medical History</th> 
  </tr>
  <tr>
    <th>#</th>
    <th>Blood Pressure</th>
    <th>Weight</th>
    <th>Blood Sugar</th>
    <th>Body Temprature</th>
    <th>Medical Prescription</th>
    <th>Visit Date</th>
  </tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
  <tr>
    <td><?php echo $cnt;?></td>
    <td><?php  echo $row['BloodPressure'];?></td>
    <td><?php  echo $row['Weight'];?></td>
    <td><?php  echo $row['BloodSugar'];?></td> 
    <td><?php  echo $row['Temperature'];?></td>
    <td><?php  echo $row['MedicalPres'];?></td>
    <td><?php  echo $row['CreationDate'];?></td> 
  </tr>
<?php $cnt=$cnt+1;} ?>
</table>

    <p align="center"> <br>                          
     <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

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
          <td><input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
        </tr>                          
        <tr>
          <th>Blood Sugar :</th>
          <td><input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
        </tr> 
        <tr>
          <th>Weight :</th>
          <td><input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
        </tr>
        <tr>
          <th>Body Temprature :</th>
          <td><input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
        </tr>
        <tr>
          <th>Prescription :</th>
          <td><textarea name="pres" placeholder="Medical Prescription" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
        </tr>  
  </table>
</div>
    <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <!--   </form> -->
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