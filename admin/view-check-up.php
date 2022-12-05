
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<?php
if(isset($_POST['submit']))
{
  $vid=$_GET['viewid'];
  $bloodpress=$_POST['bloodpress'];
  $bloodsugar=$_POST['bloodsugar'];
  $bodytemp=$_POST['bodytemp'];
  $weight=$_POST['weight'];
  $height=$_POST['height'];
  $bmi=$_POST['bmi'];
  $complaints=$_POST['complaints'];
  $remark=$_POST['remark'];
 

    $query=mysqli_query($conn, "insert  patient_history(patientId,bloodpress,bloodsugar,bodytemp,weight,height,bmi,complaints,remark)value('$vid','$bloodpress','$bloodsugar','$bodytemp','$weight','$height', '$bmi', '$complaints','$remark')");
    if ($query) {
    echo '<script>alert("Medical history has been added.")</script>';
    echo "<script>window.location.href ='history.php&viewid=['pid']'</script>";

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
  $result = mysqli_query($conn,"SELECT * FROM checkup WHERE id = 'pid'");
  ?>

  <div class="card card-outline card-primary">
    <div class="card-header">
      <h2 class="card-title text-center">Patient Records for Check-Up</h2>
    </div>
    <?php
    $vid=$_GET['viewid'];
    $ret=mysqli_query($conn,"select * from checkup where pid='$vid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
      ?>
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr align="center">
              <tr>
                <th>Patient No.</th>
                <td><?php  echo $row['pid'];?></td>
                <th>Contact Number</th>
                <td><?php  echo $row['pcontact'];?></td>
              </tr>
              <tr>
                <th>Name</th>
                <td><?php  echo $row['pfname'];?></td>
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
                <td><?php  echo $row['placebirth'];?></td>
                <th>Guardian/Mother <small>(for child)</small></th>
                <td><?php  echo $row['guardian'];?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php  echo $row['paddress'];?></td>
                <th>Date of Registration</th>
                <td><?php  echo $row['CreationDate'];?></td>
              </tr>
            </tr>
          </table>
        <?php }?>

        <?php  
        $ret=mysqli_query($conn,"select * from checkup  where pid='$vid'");
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
              <th>Height</th>
              <th>Weight</th>
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
                <td><?php  echo $row['bloodpress'];?></td>
                <td><?php  echo $row['bloodsugar'];?></td> 
                <td><?php  echo $row['bodytemp'];?></td>
                <td><?php  echo $row['height'];?></td>
                <td><?php  echo $row['weight'];?></td>
                <td><?php  echo $row['bmi'];?></td>
                <td><?php  echo $row['complaints'];?></td>
                <td><?php  echo $row['remark'];?></td>
                <td><?php  echo $row['visit'];?></td> 
                <td><?php  echo $row['assigned'];?></td> 
              </tr>
              <?php $cnt=$cnt+1;} ?>

              <?php  

              $ret=mysqli_query($conn,"select * from patient_history where patientId='$vid'");


              ?>
              <?php  
              while ($row=mysqli_fetch_array($ret)) { 
                ?>
                <tr>
                  <td><?php echo $cnt;?>.</td>
                  <td><?php  echo $row['bloodpress'];?></td>
                  <td><?php  echo $row['bloodsugar'];?></td> 
                  <td><?php  echo $row['bodytemp'];?></td>
                  <td><?php  echo $row['height'];?></td>
                  <td><?php  echo $row['weight'];?></td>
                  <td><?php  echo $row['bmi'];?></td>
                  <td><?php  echo $row['complaints'];?></td>
                  <td><?php  echo $row['remark'];?></td>
                  <td><?php  echo $row['visit'];?></td> 
                  <td><?php  echo $row['assigned'];?></td> 
                </tr>
                <?php $cnt=$cnt+1;} ?>
              </table>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function () {
    $('table').DataTable();
});
</script>
</html>