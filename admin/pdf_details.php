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

		<table style="width:100%">

			<tr>
				<th>Patient No.</th>
				<th>Name</th>
				<th>Contact No.</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Medical History</th>
			</tr>

			<tr>
				<td>PA-<?=$row["id"] ?></td>
				<td><?=$row["fullname"] ?></td>
				<td><?=$row["contactNo"] ?></td>
				<td><?=$row["gender"] ?></td>
				<td><?=$row["dob"] ?></td>
				<td><?=$row["medHistory"] ?></td>
			</tr>


		</table>

	</body>
	</html>