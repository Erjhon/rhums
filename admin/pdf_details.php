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


<h2>Medical Appointment and Record Management Sytem <br>RURAL HEALTH UNIT II</h2>

		<table style="width:100%">

			<tr>
				<th>Patient No.</th>
				<th>Reason for Appointment</th>
				<th>Treatment</th>
				<th>Prescription</th>
				<th>Date of Consultation</th>
			</tr>

			<tr>
				<td>PA-<?=$row["id"] ?></td>
				<td><?=$row["ailment"] ?></td>
				<td><?=$row["treatment"] ?></td>
				<td><?=$row["prescription"] ?></td>
				<td><?=$row["date"] ?></td>
			</tr>


		</table>

	</body>
	</html>