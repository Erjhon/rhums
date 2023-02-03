
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<?php
if(isset($_POST['submit']))
{
  $vid=$_GET['viewid'];
  $incident=$_POST['incident'];
  $source=$_POST['source'];
  $part=$_POST['part'];
  $category=$_POST['category'];
  $type=$_POST['type'];
  $owner=$_POST['owner'];
  $ownercon=$_POST['ownercon'];
  $location=$_POST['location'];
  $remark=$_POST['remark'];
// $visit=$_POST['visit'];
  $assigned=$_POST['assigned'];


  $query=mysqli_query($conn, "insert animalbite_history(patientId,incident,source,part,category,type,owner,ownercon,location,remark,assigned)value('$vid','$incident','$source','$part','$category','$type','$owner','$ownercon','$location','$remark','$assigned')");
  if ($query) {

    $message[] = "";

  }
  else
  {
    $error[] ="";
  } 
}

?>


<!-- display success -->
<?php
if(isset($message)){
  foreach($message as $message){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Medical history has been added successfully',
      toast: true,
      position:'top-end',
      showConfirmButton: false,
      timer: 1000
      });
      </script>.$message.";
    }
  }
  ?>

  <!-- //display error -->
  <?php
  if(isset($error)){
    foreach($error as $error){
      echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Something went wrong try again',
        toast: true,
        position:'top-end',
        showConfirmButton: false,
        timer: 1000
        })
        </script>.$error.";
      };
    };

    ?>
    <body>

      <?php if($_settings->chk_flashdata('success')): ?>
        <script>
          alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
        </script>


      <?php endif;?>

      <?php
      $result = mysqli_query($conn,"SELECT * FROM patient_history WHERE id = 'pid'");
      ?>

      <div class="card card-outline card-primary">
        <div class="card-header">
          <a href="#" class="nav-icon ni ni-bold-left text-success" onclick="history.back()"> Back</a>
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
                    <td><?php  echo $row['pfname'];?></td>
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
                    <td><?php echo date("F d, Y", strtotime($row['CreationDate']))?></td>
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

                <p align="center"> <br>                          
                  <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

                </div>
                <?php  ?>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
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
                              <th>Date of Incident :</th>
                              <td><input type="date" class="form-control wd-450" name="incident" required="true"></td>
                            </tr>                          
                            <tr>
                              <th>Source :</th>
                              <td>
                                <select type="text" class="form-control form-select-sm-6" name="source" required>
                                  <option class="placeholder" style="display: none" >Select Source</option>
                                  <option <?php echo isset($patient['source']) && $patient['source'] == "Dog" ? "selected" : "" ?>>Dog</option>
                                  <option <?php echo isset($patient['source']) && $patient['source'] == "Cat" ? "selected" : "" ?>>Cat</option>
                                </select>
                              </td>
                            </tr> 
                            <tr>
                              <th>Part of Body Bitten :</th>
                              <td><input name="part" placeholder="Sample: Left Leg" class="form-control wd-450" required="true"></td>
                            </tr> 
                            <tr>
                              <th>Category :</th>
                              <td>
                                <select type="text" class="form-control form-select-sm-6" name="category" required>
                                  <option class="placeholder" style="display: none" >Select Category</option>
                                  <option <?php echo isset($patient['category']) && $patient['category'] == "I" ? "selected" : "" ?>>I</option>
                                  <option <?php echo isset($patient['category']) && $patient['category'] == "II" ? "selected" : "" ?>>II</option>
                                  <option <?php echo isset($patient['category']) && $patient['category'] == "III" ? "selected" : "" ?>>III</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <th>Type :</th>
                              <td>
                                <select type="text" class="form-control form-select-sm-6" name="type" required>
                                  <option class="placeholder" style="display: none" >Select Type</option>
                                  <option <?php echo isset($patient['type']) && $patient['type'] == "Bite" ? "selected" : "" ?>>Bite</option>
                                  <option <?php echo isset($patient['type']) && $patient['type'] == "Scratch" ? "selected" : "" ?>>Scratch</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <th>Name <small>(Pet Owner)</small> :</th>
                              <td><textarea name="owner" placeholder="Enter Name" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
                            </tr> 
                            <tr>
                              <th>Contact Number <small>(Pet Owner)</small> :</th>
                              <td><input type="tel" class="form-control" name="ownercon" maxlength="11" value="09" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="true"></td>
                            </tr>
                            <tr>
                              <th>Location of Biting Incident :</th>
                              <td><textarea name="location" placeholder="Enter Location of Biting Incident" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
                            </tr>
                            <tr>
                              <th>Remarks :</th>
                              <td><textarea name="remark" placeholder="Enter Remarks" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
                              <td><textarea hidden name="assigned" placeholder="Enter Remarks" rows="4" cols="14" class="form-control wd-450" value="<?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?>" required="true"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></textarea></td>
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