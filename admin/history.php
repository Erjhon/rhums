
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>
<body>

<?php if($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
	</script>



<?php endif;?>

<?php
$result = mysqli_query($conn,"SELECT * FROM patient_list where patient_id = meta_value");
?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h2 class="card-title text-center">Patient Records</h2>
		<div class="card-tools col-sm-2 col-10 text-right m-b-5">
			<a href="<?php echo base_url ?>admin/?page=add-consultation" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
		</div>

	</div>
	<div class="card-body">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-border table-hover custom-table datatable mb-0">
							<?php
							if (mysqli_num_rows($result) > 0) {
								?>
								<thead>
									<tr>
										<th>Patient Name</th>
										<th>Patient Contact Number</th>
										<th>Patient Gender</th>
										<th>View Records</th>
										<th>Generate reports</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									while($row = mysqli_fetch_array($result)) {
										?>


										<tr>
											<td><?php echo $row["patient_id"]; ?></td>
											<td><?php echo $row["contact"]; ?></td>										
											<td><?php echo $row["gender"]; ?></td>										
											<td>
												<a target="_blank" href="<?php echo base_url ?>admin/?page=history" class="btn btn-sm btn-primary">View<i class="fa fa-file-pdf-o"></a>
												</td>
											<td>
												<a target="_blank" href="generate_pdf.php?id=<?=$row['id']?>" class="btn btn-sm btn-primary">Generate PDF<i class="fa fa-file-pdf-o"></a>
												</td>
											</tr>
											<?php
											$i++;
										}
										?>
									</tbody>
								</table>
								<?php
							}
							else{
								echo "No result found";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="sidebar-overlay" data-reff=""></div>

</body>

<script type="text/javascript">
	
	$(document).ready( function () {
    $('table').DataTable();
} );
</script>

<!-- patients23:19-->
</html>