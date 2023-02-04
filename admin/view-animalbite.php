
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<body>
  <div class="card card-outline card-primary">
    <div class="card-header">
       <a href="#" class="nav-icon ni ni-bold-left text-success"onclick="history.back()"> Back</a>
      <h2 class="card-title text-center">Patient Records for Animal Bite</h2>
    </div>
    <?php
    $vid=$_GET['viewid'];
    $ret=mysqli_query($conn,"select * from animalbite where pid='$vid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
      ?>

      <div class="col-md-12">
        <div class="table-responsive">
          <table border="0" class="table table-bordered">
            <tr align="center">
              <tr>
                <th scope>Patient No.</th>
                <td><?php  echo $row['pid'];?></td>
                <th scope>Mobile Number</th>
                <td><?php  echo $row['pcontact'];?></td>
              </tr>
              <tr>
                <th scope>Name</th>
              <td><?php  echo $row['pfname'];?> <?php  echo $row['mname'];?>. <?php  echo $row['lname'];?></td>
                <th>Sex</th>
                <td><?php  echo $row['gender'];?></td>
              </tr>
              <tr>
                <th>Date of Birth</th>
                <td><?php echo date("F d, Y",strtotime($row['dob'])); ?></td>
                <th>Age</th>
                <td><?php  echo $row['age'];?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php  echo $row['paddress'];?></td>
                <th>Date of Registration</th>
                <td><?php echo date("M d, Y", strtotime($row['CreationDate']))?></td>
              </tr>
            </tr>
          </table>
        <?php }?>
        <?php  
        $ret=mysqli_query($conn,"select * from animalbite_history where patientId='$vid'");


        ?>
        <div class="table-responsive">
          <table border="0" class="table table-bordered">
            <h4 class="card-title mt-4" style="font-size: 18px; color:darkblue;">Medical History</h4>
            <tr align="center">
            </tr>
            <tr>
              <th>#</th>
              <th>Date of Incident</th>
              <th>Source</th>
              <th>Part of Body Bitten</th>
              <th>Category</th>
              <th>Type</th>
              <th>Name <small>(Pet Owner)</small></th>
              <th>Mobile Number <small>(Pet Owner)</small></th>
              <th>Location of biting Incident</th>
              <th>Remarks</th>
              <th>Visit Date</th>
              <th>Assigned Staff</th>
            </tr>
            <?php  
            while ($row=mysqli_fetch_array($ret)) { 
              ?>
              <tr>
                <td><?php echo $cnt;?>.</td>
                <td><?php  echo $row['incident'];?></td>
                <td><?php  echo $row['source'];?></td> 
                <td><?php  echo $row['part'];?></td>
                <td><?php  echo $row['category'];?></td>
                <td><?php  echo $row['type'];?></td>
                <td><?php  echo $row['owner'];?></td>
                <td><?php  echo $row['ownercon'];?></td>
                <td><?php  echo $row['location'];?></td>
                <td><?php  echo $row['remark'];?></td>
                <td><?php echo date("m-d-Y", strtotime($row['visit']))?></td> 
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