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
<br><h2>Patient Records</h2>
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
				<th>Contact No.</th>
				<td><?=$row["contactNo"] ?></td>
				
				

				
							</tr>

							<tr>
								<th>Date of Birth</th>
				<td><?=$row["dob"] ?></td>
				<th>Medical History</th>
				<td><?=$row["medHistory"] ?></td>
							</tr>


		</table>

<br><h2>Medical History</h2>
			<table style="width:100%">
        <th>Blood Pressure</th>
        <th>Weight</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Medical Prescription</th>
        <th>Visit Date</th>

         <tr>
         	<!-- <td><?=$row["BloodPressure"] ?></td> -->
        
      </tr>

		</table>

	</body>
	</html>