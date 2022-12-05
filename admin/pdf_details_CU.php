	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patients Reports</title>
	</head>


					<style>
			table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 10%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .525em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: ;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 31px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				text-align: center;
			}
			th, td {
				background-color: #fffff;
			}
			h1, h2 {
  text-align:center;
}
		</style>

	<body>
		<h1>RURAL HEALTH UNIT II</h1>
		<h2>Patient Records for Check-Up</h2>
		<table style="width:100%">

			<tr>
				<th>Patient No.</th>
				<th>Date of Registration</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Contact Number</th>
				<th>Date of Birth</th>
				<th>Age</th>
				<th>Place of Birth <small>(for child)</small></th>
				<th>Guardian/Mother <small>(for child)</small></th>
				<th>Address</th>
				<th>Blood Presure</th>
				<th>Blood Sugar</th>
				<th>Body Temperature</th>
				<th>Height</th>
				<th>Weight</th>
				<th>BMI</th>
				<th>Patient Complaints</th>
				<th>Visit Date</th>
				<th>Remarks</th>
				<!-- <th>Date of Registration</th> -->
			</tr>
<?php 
$ret=mysqli_query($conn,"select * from checkup c, patient_history p where c.pid=p.patientId");
 ?>
   <?php  
    while ($row=mysqli_fetch_array($ret)) { 
      ?>
     <tr>
			<tr>
				<td>PA-<?=$row["pid"] ?></td>
				<td><?=$row["CreationDate"] ?></td>
				<td><?=$row["pfname"] ?></td>
				<td><?=$row["gender"] ?></td>
				<td><?=$row["pcontact"] ?></td>
			
				<td><?=$row["dob"] ?></td>
				<td><?=$row["age"] ?></td>
			
				<td><?=$row["placebirth"] ?></td>
				<td><?=$row["guardian"] ?></td>
				<td><?=$row["paddress"] ?></td>
				<td><?=$row["bloodpress"] ?></td>
				<td><?=$row["bloodsugar"] ?></td>
			
				<td><?=$row["bodytemp"] ?></td>
				<td><?=$row["height"] ?></td>
			
				<td><?=$row["weight"] ?></td>
				<td><?=$row["bmi"] ?></td>
				<td><?=$row["complaints"] ?></td>
				<td><?=$row["visit"] ?></td>
				<td><?=$row["remark"] ?></td>
				
				<!-- <td><?=$row["CreationDate"] ?></td> -->
			</tr>
 <?php } ?>

		</table>

	</body>
	</html>