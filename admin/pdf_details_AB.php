<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patients Reports</title>
	</head>


	<style>
		.pic1, .text, .pic2 {
			display: inline-block;
			margin-bottom: 20px;
			margin-top: 5px;
		}
		.pic1 {
			position: relative;
		 	left: 25%;
		}
		.text {
			text-align: center;
			width: 85%;
		}

		.pic2 {
			position: relative;
		  right: 25%;
		}


		table {
			border: 1px solid;
		  border-collapse: collapse;
		  margin: 0;
		  padding: 0;
		  width: 10%;
		  table-layout: fixed;
		  padding-bottom: 50px;
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
  		width: 4%;
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
  	.row-ad {
  		width: 10%;
  	}
  	.row-di {
  		width: 7%;
  	}
  	.row-s {
  		width: 4%;
  	}
  	.row-pbb {
  		width: 6%;
  	}
  	.row-c {
  		width: 4%;
  	}
  	.row-t {
  		width: 4%;
  	}
  	.row-po {
  		width: 10%;
  	}
  	.row-pcn {
  		width: 10%;
  	}
  	.row-li {
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
	</style>


	<body>
			<!-- Getting image1 -->
			<?php
			$path = '../assets/assets/img/brand/rhu.png';
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			?>
			<img class="pic1" src="<?php echo $base64?>" width="120" height="120"/>
			<div class="text">
			<h1>RURAL HEALTH UNIT II</h1>
			<h2>Patient Records for Animal Bite</h2>
		</div>

			<!-- Getting image2 -->
			<?php
			$path = '../assets/assets/img/brand/doh.png';
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			?>
			<img class="pic2" src="<?php echo $base64?>" width="120" height="120"/>

	</div>
		<table style="width:100%">

			<tr>
				<th class="row-ID">Patient No.</th>
				<th class="row-dor">Date of Registration</th>
				<th class="row-n">Name</th>
				<th class="row-g">Gender</th>
				<th class="row-cn">Contact Number</th>
				<th class="row-dob">Date of Birth</th>
				<th class="row-a">Age</th>
				<th class="row-ad">Address</th>
				<th class="row-di">Date of Incident</th>
				<th class="row-s">Source</th>
				<th class="row-pbb">Part of Body Bitten</th>
				<th class="row-c">Category</th>
				<th class="row-t">Type</th>
				<th class="row-po">Name <small>(Pet Owner)</small></th>
				<th class="row-pcn">Contact Number <small>(Pet Owner)</small></th>
				<th class="row-li">Location of biting Incident</th>
				<th class="row-vd">Visit Date</th>
				<th class="row-r">Remarks</th>
			</tr>
<?php 
$ret=mysqli_query($conn,"select * from animalbite a join animalbite_history ab on a.pid = ab.patientId");
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
				<td><?=$row["paddress"] ?></td>
				<td><?=$row["incident"] ?></td>
				<td><?=$row["source"] ?></td>
				<td><?=$row["part"] ?></td>
				<td><?=$row["category"] ?></td>
				<td><?=$row["type"] ?></td>
				<td><?=$row["owner"] ?></td>
				<td><?=$row["ownercon"] ?></td>
				<td><?=$row["location"] ?></td>
				<td><?php echo date("m/d/Y", strtotime($row['visit']))?></td>
				<td><?=$row["remark"] ?></td>
			</tr>
 <?php } ?>

		</table>

	</body>
	</html>