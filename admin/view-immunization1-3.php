
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
           <th>Age (in months)</th>
           <th>Length (cm)</th>
           <th>Date Taken (Length)</th>
           <th>Weight (kg)</th>
           <th>Date Taken (Weight)</th>
           <th>Status</th>
           <th>Low birth weight given</th>
           <th>Immunization</th>
           <th>Dose</th>
           <th>Date of Immunization</th>
           <th>Exclusive Breastfeeding</th>
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
            <td><?php  echo $row['monthage'];?></td>
            <td><?php  echo $row['length'];?></td> 
            <td><?php  echo $row['ltaken'];?></td> 
            <td><?php  echo $row['weight'];?></td>
            <td><?php  echo $row['wtaken'];?></td>
            <td><?php  echo $row['status'];?></td>
            <td><?php  echo $row['weightgiven'];?></td>
            <td><?php  echo $row['immunization'];?></td>
            <td><?php  echo $row['dose'];?></td>
            <td><?php  echo $row['doi'];?></td>
            <td><?php  echo $row['exbf'];?></td>
            <td><?php  echo $row['remarks'];?></td>
            <td><?php echo date("m-d-Y", strtotime($row['CreationDate']))?></td>
            <td><?php  echo $row['assigned'];?></td> 
          </tr>
        <?php $cnt=$cnt+1;} ?>

        <?php  

        $ret=mysqli_query($conn,"select * from immunization1-3 where patienId='$vid'");


        ?>
        <?php  
        while ($row=mysqli_fetch_array($ret)) { 
          ?>
          <tr>
            <td><?php echo $cnt;?>.</td>
            <td><?php  echo $row['cpab'];?></td>
            <td><?php  echo $row['age'];?></td>
            <td><?php  echo $row['monthage'];?></td>
            <td><?php  echo $row['length'];?></td> 
            <td><?php  echo $row['ltaken'];?></td> 
            <td><?php  echo $row['weight'];?></td>
            <td><?php  echo $row['wtaken'];?></td>
            <td><?php  echo $row['status'];?></td>
            <td><?php  echo $row['weightgiven'];?></td>
            <td><?php  echo $row['immunization'];?></td>
            <td><?php  echo $row['dose'];?></td>
            <td><?php  echo $row['doi'];?></td>
            <td><?php  echo $row['exbf'];?></td>
            <td><?php  echo $row['remarks'];?></td>
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