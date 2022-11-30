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
  text-transform: uppercase;
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



/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
			table, th, td {
/*				border: 1px solid black;*/
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


<h2>Medical Appointment and Record Management System <br>RURAL HEALTH UNIT II</h2>
<br><h2>Patient Records for Check-Up</h2>
		<table style="width:100%">

			<tr>
				<th>Patient No.</th>
				<td>PA-<?=$row["id"] ?></td>
				<th>Name</th>
<<<<<<< Updated upstream:admin/pdf_details_AB.php
				<td><?=$row["fullname"] ?></td>
=======
				<td><?=$row["child"] ?></td>

>>>>>>> Stashed changes:admin/pdf_details.php
			</tr>

			<tr>
				<th>Gender</th>
<<<<<<< Updated upstream:admin/pdf_details_AB.php
				<td><?=$row["gender"] ?></td>
				<th>Contact Number</th>
				<td><?=$row["contactNo"] ?></td>
			</tr>
=======
				<td><?=$row["sex"] ?></td>
				<th>Address</th>
				<td><?=$row["address"] ?></td>
				
				
>>>>>>> Stashed changes:admin/pdf_details.php

			<tr>
				<th>Date of Birth</th>
				<td><?=$row["dob"] ?></td>
				<th>Age</th>
				<td><?=$row["age"] ?></td>
			</tr>

			<tr>
				<th>Place of Birth <small>(for child)</small></th>
				<td><?=$row["dob"] ?></td>
<<<<<<< Updated upstream:admin/pdf_details_AB.php
				<th>Guardian/Mother <small>(for child)</small></th>
				<td><?=$row["age"] ?></td>
			</tr>

			<tr>
				<th>Address</th>
				<td><?=$row["address"] ?></td>
				<th>Date of Registration</th>
				<td><?=$row["CreationDate"] ?></td>
			</tr>
=======
				<th>Date of registration</th>
				<td><?=$row["dor"] ?></td>
							</tr>
>>>>>>> Stashed changes:admin/pdf_details.php


		</table>

<br><h2>Medical History</h2>
	<table style="width:100%">
        <th>#</th>
        <th>Blood Pressure</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Weight</th>
        <th>Height</th>
        <th>BMI</th>
        <th>Patient Complaints</th>
        <th>Remarks</th>
        <th>Visit Date</th>

         <tr>
         	<td><?=$row["BloodPressure"] ?></td>
         	<td><?=$row["BloodPressure"] ?></td>
         	<td><?=$row["BloodPressure"] ?></td>
         	<td><?=$row["BloodPressure"] ?></td>
        
      </tr>

		</table>

	</body>
	</html>