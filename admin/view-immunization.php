
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<body>
  <div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title text-center">Patient Records for Immunization</h2>
    </div>
    <?php
       $vid=$_GET['viewid'];
       $ret=mysqli_query($conn,"select * from immunization_child where id='$vid'");
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
              <th scope>Family Serial Number</th>
              <td><?php  echo $row['fsn'];?></td>
            </tr>
            <tr>
              <th scope>Name</th>
              <td><?php  echo $row['child'];?></td>
              <th>Gender</th>
              <td><?php  echo $row['sex'];?></td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td><?php echo date("M d, Y",strtotime($row['dob'])); ?></td>
              <th>Name of Mother</th>
              <td><?php  echo $row['mother'];?></td>
            </tr>
            <tr>
              <th>Address</th>
              <td><?php  echo $row['address'];?></td>
              <th>Date of Registration</th>
              <td><?php echo date("m-d-Y", strtotime($row['CreationDate']))?></td>
            </tr>
        </tr>
    </table>
    <?php }?>
    <?php  

    $ret=mysqli_query($conn,"select * from immunization_child where id='$vid'");


     ?>
     <div class="table-responsive">
        <table border="0" class="table table-bordered">
            <h4 class="card-title mt-4" style="font-size: 18px; color:darkblue;">Medical History</h4>
          <tr align="center">
          </tr>
          <tr>
            <th>#</th>
              <th>Child Protected at Birth (CPAB)</th>
            <th>Age</th>
            <th>Length at Birth</th>
            <th>Weight at Birth</th>
            <th>Status (Birth Weight)</th>
            <th>Initiated breast feeding immediately after birth lasting for 90 minutes</th>
            <th>Immunization BCG</th>
            <th>Hepa B-BD</th>
            <th>Remarks</th>
            <th>Visit Date</th>
            <th>Assigned Staff</th>
          </tr>
        <?php  
        while ($row=mysqli_fetch_array($ret)) { 
          ?>
          <tr>
             <td><?php echo $cnt;?>.</td>
            <td><?php  echo $row['cpab'];?></td>
            <td><?php  echo $row['age'];?></td>
            <td><?php  echo $row['blength'];?></td> 
            <td><?php  echo $row['bweight'];?></td>
            <td><?php  echo $row['stat'];?></td>
            <td><?php  echo $row['breastfeed'];?></td>
            <td><?php  echo $row['bcg'];?></td>
            <td><?php  echo $row['hepa'];?></td>
            <td><?php  echo $row['remarks'];?></td>
            <td><?php echo date("m-d-Y", strtotime($row['CreationDate']))?></td>
            <td><?php  echo $row['assigned'];?></td> 
          </tr>
        <?php $cnt=$cnt+1;} ?>

        <?php  

    
$ret=mysqli_query($conn,"select * from immunization_new where patientId='$vid'");
 ?>
 <tr>
   <?php  
    while ($row=mysqli_fetch_array($ret)) { 
      ?>
        <td><?php echo $cnt;?>.</td>
        <td><?php  echo $row['cpab'];?></td>
            <td><?php  echo $row['age'];?></td>
            <td><?php  echo $row['blength'];?></td> 
            <td><?php  echo $row['bweight'];?></td>
            <td><?php  echo $row['stat'];?></td>
            <td><?php  echo $row['breastfeed'];?></td>
            <td><?php  echo $row['bcg'];?></td>
            <td><?php  echo $row['hepa'];?></td>
            <td><?php  echo $row['remarks'];?></td>
            <td><?php echo date("m-d-Y", strtotime($row['CreationDate']))?></td>
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
    
    $(document).ready( function () {
    $('table').DataTable();
} );
</script>

<!-- patients23:19-->
<!-- </html> -->