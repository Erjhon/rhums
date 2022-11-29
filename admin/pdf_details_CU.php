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


<h2>Medical Appointment and Record Management System <br>RURAL HEALTH UNIT II</h2>
<br><h2>Patient Records for Check-Up</h2>
		<table style="width:100%">

			<tr>
				<th>Patient No.</th>
				<td>PA-<?=$row["id"] ?></td>
				<th>Name</th>
				<td><?=$row["fullname"] ?></td>
			</tr>

			<tr>
				<th>Gender</th>
				<td><?=$row["gender"] ?></td>
				<th>Contact Number</th>
				<td><?=$row["contactNo"] ?></td>
			</tr>

			<tr>
				<th>Date of Birth</th>
				<td><?=$row["dob"] ?></td>
				<th>Age</th>
				<td><?=$row["age"] ?></td>
			</tr>

			<tr>
				<th>Place of Birth <small>(for child)</small></th>
				<td><?=$row["dob"] ?></td>
				<th>Guardian/Mother <small>(for child)</small></th>
				<td><?=$row["age"] ?></td>
			</tr>

			<tr>
				<th>Address</th>
				<td><?=$row["address"] ?></td>
				<th>Date of Registration</th>
				<td><?=$row["CreationDate"] ?></td>
			</tr>


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
         	<!-- <td><?=$row["BloodPressure"] ?></td> -->
        
      </tr>

		</table>

	</body>
	</html>