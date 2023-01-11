
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
  $assigned=$_POST['assigned'];


  $query=mysqli_query($conn, "insert  patient_history(patientId,bloodpress,bloodsugar,bodytemp,weight,height,bmi,complaints,remark,assigned)value('$vid','$bloodpress','$bloodsugar','$bodytemp','$weight','$height', '$bmi', '$complaints','$remark','$assigned')");
  if ($query) {

    $message[] = "";
  }
  else
  {
    $error[] = "";
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

      <div class="card card-outline card-primary">
        <div class="card-header">
          <a href="#" class="nav-icon ni ni-bold-left text-success" onclick="history.back()"> Back</a>
          <h2 class="card-title text-center">Patient Records for Check-Up</h2>
        </div>
        <?php
        $vid=$_GET['viewid'];
        $ret=mysqli_query($conn,"select * from checkup where pid='$vid'");
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
                    <th scope>Contact Number</th>
                    <td><?php  echo $row['pcontact'];?></td>
                  </tr>
                  <tr>
                    <th scope>Name</th>
                    <td><?php  echo $row['pfname'];?></td>
                    <th>Gender</th>
                    <td><?php  echo $row['gender'];?></td>
                  </tr>
                  <tr>
                    <th>Date of Birth</th>
                    <td><?php echo date("F d, Y",strtotime($row['dob'])); ?></td>
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
                    <td><?php echo date("F d, Y", strtotime($row['CreationDate']))?></td>
                  </tr>
                </tr>
              </table>
            <?php }?>
            <?php  

            $ret=mysqli_query($conn,"select * from patient_history where patientId='$vid'");


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
                    <td><?php echo date("m-d-Y", strtotime($row['visit']))?></td> 
                    <td><?php  echo $row['assigned'];?></td> 
                  </tr>
                  <?php $cnt=$cnt+1;} ?>
                </table>


              </div>
              <p align="center"> <br>                          
                <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  
                <?php  ?>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog modal-lg" role="document">
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
                              <td><input name="bloodpress" placeholder="Sample: 120/80" class="form-control wd-450" required="true"></td>
                            </tr>                          
                            <tr>
                              <th>Blood Sugar :</th>
                              <td><input name="bloodsugar" placeholder="Sample: 70" class="form-control wd-450" required="true"></td>
                            </tr> 
                            <tr>
                              <th>Body Temperature :</th>
                              <td><input name="bodytemp" placeholder="Sample: 36.5" class="form-control wd-450" required="true"></td>
                            </tr> 
                            <tr>
                              <th>Height :</th>
                              <td><input type="number" id="height" name="height" placeholder="Enter height in centimeters" class="form-control wd-450" required="true"></td>
                            </tr>
                            <tr>
                              <th>Weight :</th>
                              <td><input type="number" id="weight" name="weight" placeholder="Enter weight in kilograms" class="form-control wd-450" required="true"></td>
                            </tr>
                            <tr>
                              <th>BMI :</th>
                              <td><textarea class="form-control" rows="1" id="bmi" name="bmi" readonly></textarea></td>
                            </tr>
                            <tr>
                              <th>Patient Complaints :</th>
                              <td><textarea name="complaints" placeholder="Enter Patient Complaints" rows="4" cols="14" class="form-control wd-450" required="true"></textarea></td>
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

          <!-- COMPUTE BMI -->
          <script>
            $(document).ready(function(){
              let keyupTimer;
              $('#height').keyup(function(){
                var weight = $("#weight").val();
                var height = $(this).val();
                clearTimeout(keyupTimer);
                keyupTimer = setTimeout(function () {
                  var bmi = (weight / Math.pow( (height/100), 2 )).toFixed(1);
                  $("#bmi").text(bmi);
                }, 400);
              });

              let keyupTimer2;
              $('#weight').keyup(function(){
                var weight = $(this).val();
                var height = $("#height").val();
                clearTimeout(keyupTimer2);
                keyupTimer2 = setTimeout(function () {
                  var bmi = (weight / Math.pow( (height/100), 2 )).toFixed(1);
                  $("#bmi").text(bmi);
                }, 400);
              });

// if(result < 18.5){
//     category = "Underweight";
//     result.style.color = "#ffc44d";
// }
// else if( result >= 18.5 && result <= 24.9 ){
//     category = "Normal Weight";
//     result.style.color = "#0be881";
// }
// else if( result >= 25 && result <= 29.9 ){
//     category = "Overweight";
//     result.style.color = "#ff884d";
// }
// else{
//     category = "Obese";
//     result.style.color = "#ff5e57";
// }
// document.getElementById("category").textContent = category;
            });
          </script>

          <!-- patients23:19-->
<!-- </html> -->