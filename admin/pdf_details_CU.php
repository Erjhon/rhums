	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patients Reports</title>
	</head>


	<style>
		table {
			border: 1px solid;
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
/*		  border: 1px solid #ddd;*/
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
		  background-color: #88fcb5;
		}
		.row-ID {
  		width: 5%;
  	}

  	.row-dor {
  		width: 8%;
  	}
  	.row-n {
  		width: 10%;
  	}
  	.row-g {
  		width: 3%;
  	}
  	.row-cn {
  		width: 8%;
  	}
  	.row-dob {
  		width: 7%;
  	}
  	.row-a {
  		width: 3%;
  	}
  	.row-pob {
  		width: 10%;
  	}
  	.row-g {
  		width: 10%;
  	}
  	.row-ad {
  		width: 10%;
  	}
  	.row-bp {
  		width: 5%;
  	}
  	.row-bs {
  		width: 4%;
  	}
  	.row-bt {
  		width: 6%;
  	}
  	.row-h {
  		width: 4%;
  	}
  	.row-w {
  		width: 4%;
  	}
  	.row-bmi {
  		width: 3%;
  	}
  	.row-pc {
  		width: 10%;
  	}
  	.row-vd {
  		width: 7%;
  	}
  	.row-r {
  		width: 10%;
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
		h2 {
			padding-bottom: 50px;
		}
	</style>


	<body>
		<h1>RURAL HEALTH UNIT II</h1>
		<h2>Patient Records for Check-Up</h2>
		<table style="width:100%">

			<tr>
				<th class="row-ID">Patient No.</th>
				<th class="row-dor">Date of Registration</th>
				<th class="row-n">Name</th>
				<th class="row-g">Gender</th>
				<th class="row-cn">Contact Number</th>
				<th class="row-dob">Date of Birth</th>
				<th class="row-a">Age</th>
				<th class="row-pob">Place of Birth <small>(for child)</small></th>
				<th class="row-g">Guardian/Mother <small>(for child)</small></th>
				<th class="row-ad">Address</th>
				<th class="row-bp">Blood Presure</th>
				<th class="row-bs">Blood Sugar</th>
				<th class="row-bt">Body Temperature</th>
				<th class="row-h">Height</th>
				<th class="row-w">Weight</th>
				<th class="row-bmi">BMI</th>
				<th class="row-pc">Patient Complaints</th>
				<th class="row-vd">Visit Date</th>
				<th class="row-r">Remarks</th>
				<!-- <th>Date of Registration</th> -->
			</tr>
<?php 
$ret=mysqli_query($conn,"select * from checkup c, patient_history p where c.pid=p.patientId");
 ?>
   <?php  
    while ($row=mysqli_fetch_array($ret)) { 
      ?>
			<tr>
				<td>PA-<?=$row["pid"] ?></td>
				<td><?php echo date("m/d/Y", strtotime($row['CreationDate']))?></td>
				<td><?=$row["pfname"] ?></td>
				<td><?=$row["gender"] ?></td>
				<td><?=$row["pcontact"] ?></td>
			
				<td><?php echo date("M, d, Y", strtotime($row['dob']))?></td>
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
				<td><?php echo date("m/d/Y", strtotime($row['visit']))?></td>
				<td><?=$row["remark"] ?></td>
				
				<!-- <td><?=$row["CreationDate"] ?></td> -->
			</tr>
 <?php } ?>

		</table>

	</body>
	</html>