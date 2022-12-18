
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<?php
  error_reporting(0);
ini_set('display_errors', 0);

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


      $query=mysqli_query($conn, "insert immunization1-3(patientId,incident,source,part,category,type,owner,ownercon,location,remark,assigned)value('$vid','$incident','$source','$part','$category','$type','$owner','$ownercon','$location','$remark','$assigned')");
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
  $result = mysqli_query($conn,"SELECT * FROM immunization_history WHERE id = 'id'");
?>

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

$ret=mysqli_query($conn,"select * from immunization_child
  where id='$vid'");
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
        <th>Contact Number <small>(Pet Owner)</small></th>
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

<?php  

$ret=mysqli_query($conn,"select * from immunization_history where patientId='$vid'");
 ?>
 <tr>
   <?php  
    while ($row=mysqli_fetch_array($ret)) { 
      ?>
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
          <!-- <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-hover data-tables">

           <form method="post" name="submit">

        

<div class="card-header mt--4">
    <h2 class="card-title">Add Medical History</h2>
</div>

<div class="card-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="cpab" class="control-label">Child Protected at Birth (CPAB)</label>
                             <select type="text" class="form-control form-select-sm-6" name="cpab" required>
              <option class="placeholder" style="display: none" >Select Option</option>
              <option <?php echo isset($patient['cpab']) && $patient['cpab'] == "TT2/Td2" ? "selected" : "" ?>>TT2/Td2</option>
              <option <?php echo isset($patient['cpab']) && $patient['cpab'] == "TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)" ? "selected" : "" ?>>TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)</option>
            </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="age" class="control-label">Age</label>
                                    <select id="selection" type="text" class="form-control form-select-sm-6" name="age">
                                        <option class="placeholder" style="display: none"> Select Age</option>
                                        <option value="Newborn"> Newborn (0-28 days old)</option>
                                        <option value="1-3Months"> 1-3 Months old</option>
                                        <option value="6-11Months"> 6-11 Months old</option>
                                        <option value="12Months"> 12 Months old</option>   
                                    </select>
                                </div>
                            </div>

                            <span class="Data" id="showNewborn">
                                <div class="row pl-3 pr-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Length at Birth <small>(cm)</small></label>
                                            <input type="number" class="form-control" name="blength">
                                        </div>
                                        <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Weight at Birth <small>(kg)</small></label>
                                            <input type="number" class="form-control" name="bweight">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="status" class="control-label">Status <small>(Birth Weight)</small></label>
                                            <select type="text" class="form-control form-select-sm-6" name="stat">
                                                <option class="placeholder" style="display: none" >Select stat</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "L - low < 2500gms" ? "selected" : "" ?>>L - low < 2500gms</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "N - normal > 2500gms" ? "selected" : "" ?>>N - normal > 2500gms</option>
                                                <option <?php echo isset($patient['stat']) && $patient['stat'] == "U - unknown" ? "selected" : "" ?>>U - unknown</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="breastfeed" class="control-label">Initiated breast feeding immediately after birth lasting for 90 minutes </label>
                                            <input type="date" class="form-control" id="breastfeed" name="breastfeed" value="<?php echo isset($patient['breastfeed']) ? $patient['breastfeed'] : '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <label for="bcg"><b>Immunization</b></label>

                                        <div class="row mt--2">
                                            <div class="col-sm-6">
                                                <div class="form-group">        
                                                    <label for="bcg" class="control-label">BCG</label>
                                                    <input type="date" class="form-control" id="bcg" name="bcg" value="<?php echo isset($patient['bcg']) ? $patient['bcg'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="hepa" class="control-label">Hepa B-BD</label>
                                                    <input type="date" class="form-control" id="hepa" name="hepa" value="<?php echo isset($patient['hepa']) ? $patient['hepa'] : '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>


                            <span class="Data" id="show1-3Months">
                                <div class="col-sm-12">
                                    <label for="gender"><b>Nutritional Status Assessment</b></label>

                                    <div class="row mt--2">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Age <small>(in months)</small></label>
                                                <input type="number" class="form-control" name="monthage" >
                                            </div>
                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Length <small>(cm)</small></label>
                                                <input type="number" class="form-control" name="length" >
                                            </div>
                                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">        
                                                <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                                <input type="date" class="form-control" id="ltaken" name="ltaken" value="<?php echo isset($patient['ltaken']) ? $patient['ltaken'] : '' ?>" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Weight <small>(kg)</small></label>
                                                <input type="number" class="form-control" name="weight" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">        
                                                <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                                <input type="date" class="form-control" id="wtaken" name="wtaken" value="<?php echo isset($patient['wtaken']) ? $patient['wtaken'] : '' ?>" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gender" class="control-label">Status </label>
                                                <select type="text" class="form-control form-select-sm-6" name="status" >
                                                    <option class="placeholder" style="display: none" >Select Status</option>
                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender">Low birth weight given </label>
                                                <select id="select" type="text" class="form-control form-select-sm-6" name="weightgiven" >
                                                    <option class="placeholder" style="display: none" >Select month/s</option>
                                                    <option value="1month">1 month</option>
                                                    <option value="2months">2 months</option>
                                                    <option value="3months">3 months</option>
                                                </select>
                                            </div>
                                        </div>  


                                        <div class="1month Data col-lg-3" id="print1month">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for1month" name="date" value="<?php echo isset($patient['for1month']) ? $patient['for1month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="2months Data col-lg-3"  id="print2months">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for2month" name="date" value="<?php echo isset($patient['for2month']) ? $patient['for2month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="3months Data col-lg-3"  id="print3month">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Date</label>
                                                    <input type="date" class="form-control" id="for3month" name="date" value="<?php echo isset($patient['for3month']) ? $patient['for3month'] : '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender">Immunization </label>
                                                <select type="text" class="form-control form-select-sm-6" name="immunization" >
                                                    <option class="placeholder" style="display: none" >Select Immunization</option>
                                                    <option value="DPT-HIB-HepB">DPT-HIB-HepB</option>
                                                    <option value="OPV">OPV</option>
                                                    <option value="PCV">PCV</option>
                                                    <option value="IPV">IPV</option>
                                                </select>
                                            </div>
                                        </div>   

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender">Dose </label>
                                                <select type="text" class="form-control form-select-sm-6" name="dose" >
                                                    <option class="placeholder" style="display: none" >Select Dose</option>
                                                    <option>1st Dose</option>
                                                    <option>2nd Dose</option>
                                                    <option>3rd Dose</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="gender" class="control-label">Date of Immunization</label>
                                                <input type="date" class="form-control" id="doi" name="doi" value="<?php echo isset($patient['doi']) ? $patient['doi'] : '' ?>" >
                                            </div>
                                        </div> 

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="gender" class="control-label">Exclusive Breastfeeding</label>
<!--    <div class="selectBox" onclick="showCheckboxes()">
<select class="form-control form-select-sm-6">
<option class="placeholder" style="display: none">Select an option</option>
</select>
<div class="overSelect"></div>
</div> -->
<div class="form-group">
    <label for="1 1/2 months">
        <input type="checkbox" name="exbf" value="1 1/2 months"> 1 1/2 months</label>
        <label for="2 1/2 months" >
            <input type="checkbox" name="exbf" value=" 2 1/2 months"> 2 1/2 months</label>
            <label for="3 1/2 months">
                <input type="checkbox" name="exbf" value=" 3 1/2 months"> 3 1/2 months</label>
                <label for="4-5 months">
                    <input type="checkbox" name="exbf" value=" 4-5 months"> 4-5 months</label>
                </div>
            </div>
        </div>    
    </div>
</div>
</span>

<span class="Data" id="show6-11Months">
    <div class="col-sm-12">
        <label for="gender"><b>Nutritional Status Assessment</b></label>

        <div class="row mt--2">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Age <small>(in months)</small></label>
                    <input type="number" class="form-control" name="age11m" >
                </div>
                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Length <small>(cm)</small></label>
                    <input type="number" class="form-control" name="length11m" >
                </div>
                <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
            </div>

            <div class="col-sm-4">
                <div class="form-group">        
                    <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                    <input type="date" class="form-control" id="ltaken11m" name="ltaken11m" value="<?php echo isset($patient['ltaken11m']) ? $patient['ltaken11m'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Weight <small>(kg)</small></label>
                    <input type="number" class="form-control" name="weight11m" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">        
                    <label for="date taken" class="control-label">Date Taken <small>(Weight)</small></label>
                    <input type="date" class="form-control" id="wtaken11m" name="wtaken11m" value="<?php echo isset($patient['wtaken11m']) ? $patient['wtaken11m'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="status" class="control-label">Status </label>
                    <select type="text" class="form-control form-select-sm-6" name="status11m" >
                        <option class="placeholder" style="display: none" >Select Status</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                        <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exbf11m">Exclusively Breastfed up to 6 months</label>
                    <select type="text" class="form-control form-select-sm-6" name="exbf11m" >
                        <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">        
                    <label for="gender" class="control-label">Date when the infant was assessed</label>
                    <input type="date" class="form-control" id="infant" name="infant" value="<?php echo isset($patient['infant']) ? $patient['infant'] : '' ?>" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gender">Introduction of Complementary Feeding at 6 months old</label>
                    <select type="text" class="form-control form-select-sm-6" name="feeding" >
                        <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gender">1 <small>- With continuous breastfeeding</small><br>
                        2 <small>- No longer breastfeeding or never breastfed</small></label>
                        <select type="text" class="form-control form-select-sm-6" name="breastfed" >
                            <!-- <option class="placeholder" style="display: none" >Select Dose</option> -->
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">        
                        <label for="gender" class="control-label">Vitamin A <small>(date given)</small></label>
                        <input type="date" class="form-control" id="vitamin" name="vitamin" value="<?php echo isset($patient['vitamin']) ? $patient['vitamin'] : '' ?>" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>MNP <small>(date when 90 sachets given)</small></label>
                        <input type="date" class="form-control" name="mnp" >
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>MCV 1 Dose at 9th month <small>(date given)</small></label>
                        <input type="date" class="form-control" name="mcv1" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>MCV 2 Dose 2</label>
                        <input type="date" class="form-control" name="mcv2" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>FIC</label>
                        <input type="date" class="form-control" name="fic" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>CIC</label>
                        <input type="date" class="form-control" name="cic" >
                    </div>
                </div>
            </span>

            <span class="Data" id="show12Months">
                <div class="col-sm-12">
                    <label for="Nutritional"><b>Nutritional Status Assessment</b></label>

                    <div class="row mt--2">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Age <small>(in months)</small></label>
                                <input type="number" class="form-control" name="age12" >
                            </div>
                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Length <small>(cm)</small></label>
                                <input type="number" class="form-control" name="length12" >
                            </div>
                            <!-- type="text" value="<?php echo $fetchRow['id'] ?>" -->
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">        
                                <label for="gender" class="control-label">Date Taken <small>(Length)</small></label>
                                <input type="date" class="form-control" id="ltaken12" name="ltaken12" value="<?php echo isset($patient['ltaken12']) ? $patient['ltaken12'] : '' ?>" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Weight <small>(kg)</small></label>
                                <input type="number" class="form-control" name="weight12" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">        
                                <label for="gender" class="control-label">Date Taken <small>(Weight)</small></label>
                                <input type="date" class="form-control" id="wtaken12" name="wtaken12" value="<?php echo isset($patient['wtaken12']) ? $patient['wtaken12'] : '' ?>" >
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="status" class="control-label">Status </label>
                                <select type="text" class="form-control form-select-sm-6" name="status12" >
                                    <option class="placeholder" style="display: none" >Select Status</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>S: Stunted</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-MAM: Wasted MAM</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>W-SAM: Wasted SAM</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>O: Obese/Overweight</option>
                                    <option <?php echo isset($patient['status']) && $patient['status'] == "Male" ? "selected" : "" ?>>N: Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </span>


        </div>
    </div>
</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Remarks</label>
            <textarea class="form-control" name="remarks" placeholder="Enter remarks" ></textarea>
        </div>
    </div>

    <div hidden class="col-sm-3">
        <div class="form-group ">
            <label>Assigned Staff</label>
            <textarea class="form-control" name="assigned" value="" readonly><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></textarea>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<div class="mt-2 text-center">
    <button class="btn btn-primary submit-btn" name="submit">Add Medical History</button>
</div>  
</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- jQuery Show|Hide Elements Using Selection option in span -->
<script>
    $(document).ready(function(){
        $('#selection').on('change', function(){
            var demovalue = $(this).val(); 
            $("span.Data").hide();
            $("#show"+demovalue).show();
        });
    });
</script> 

<script>
    $(document).ready(function(){
        $('#select').on('change', function(){
            var demovalue = $(this).val(); 
            $("div.Data").hide();
            $("#print"+demovalue).show();
        });
    });
</script> 


<!-- jQuery Show|Hide Elements Using Selection option using class -->
<script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".data").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".data").hide();
                }
            });
        }).change();
    });
</script> 

<!-- //check birthdays start -->
<script type='text/javascript'>
    function submitBday() {
        var Q4A = "";
        var Bdate = document.getElementById('dob').value;
        var Bday = +new Date(Bdate);
        Q4A += ~~((Date.now() - Bday) / (31557600000));

        var dobMonth = dob.getMonth();
//get the current date from the system
        var now = new Date();
        var currentMonth = now.getMonth();
//get months
        if (currentMonth >= dobMonth)
//get months when current month is greater
            var monthAge = currentMonth - dobMonth;
        else {
            yearAge--;
            var monthAge = 12 + currentMonth - dobMonth;
        }
        var theBday = document.getElementById('resultBday');
        theBday.value = Q4A;
    }
</script>  


<!-- //check birthdays start -->
<script type='text/javascript'>
    function submitBday() {
        var Q4A = "";
        var Bdate = document.getElementById('dob').value;
        var Bday = +new Date(Bdate);
        Q4A += ~~((Date.now() - Bday) / (31557600000));
        var theBday = document.getElementById('resultBday');
        theBday.value = Q4A;
    }
</script>


<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('cpab')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>



<script type="text/javascript">
    
    $(document).ready( function () {
    $('table').DataTable();
} );
</script>
</body>
<!-- patients23:19-->
<!-- </html> -->