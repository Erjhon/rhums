  
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Patients Reports</title>
    </head>


        <style>
            table, th, td {
                border: 1px solid white;
                border-collapse: collapse;
                text-align: center;
            }
            th, td {
                background-color: #96D4D4;
            }
            h1, h2 {
  text-align:center;
}
        </style>

    <body>

<!-- <?php 
$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM patient_history WHERE id='$id'");
$row = mysqli_fetch_assoc($sql); ?> -->
<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM patient_history WHERE id='$id'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
   
  }
?>
<h2>Medical Appointment and Record Management System <br>RURAL HEALTH UNIT II</h2>

        <table style="width:100%">

            <tr>
                <th>Patient No.</th>
                <th>Name</th>
                <th>Contact No.</th>
                <th>Gender</th>
                <th>Date of Birth</th>
            </tr>

            <tr>
                <td>PA-<?=$row["id"] ?></td>
                <td><?=$row["fullname"] ?></td>
                <td><?=$row["contactNo"] ?></td>
                <td><?=$row["gender"] ?></td>
                <td><?=$row["dob"] ?></td>
            </tr>


        </table>

<div><br></div>
        <table style="width:100%">

            <tr>
                <th>History</th>
                <th>reason</th>
                <th>status</th>
                <th>Gender</th>
                <th>Date of Birth</th>
            </tr>

            <tr>
                <td>PA-<?=$row["patient_id"] ?></td>
                <td><?=$row["reason"] ?></td>
                <td><?=$row["status"] ?></td>
                <td><?=$row["gender"] ?></td>
                <td><?=$row["dob"] ?></td>
            </tr>


        </table>

    </body>
    </html>