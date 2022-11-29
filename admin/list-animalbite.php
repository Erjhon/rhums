
<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>
<body>

<?php if($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
	</script>



<?php endif;?>

<?php
$result = mysqli_query($conn,"SELECT * FROM patient_history");
?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h2 class="card-title text-center">List for Animal Bite</h2>
		<div class="card-tools">
			<a href="<?php echo base_url ?>admin/?page=add-animalbite" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
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
										<th>Patient No.</th>
										<th>Patient Name</th>
										<th>Date of Incident</th>
										<th>Source</th>
										<th>Address</th>
										<th>Creation Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									while($row = mysqli_fetch_array($result)) {
										?>


										<tr>
											<td><b>PA-<?php echo $row["id"]; ?></td>
											<td><?php echo $row["fullname"]; ?></td>
											<td><?php echo $row["contactNo"]; ?></td>
											<td><?php echo $row["gender"]; ?></td>
											<td><?php echo $row["address"]; ?></td>
											<td><?php echo $row["CreationDate"]; ?></td>
											<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href=<?php echo base_url ?>admin/?page=view-animalbite&viewid=<?php echo $row['id'] ?>><span class="fa fa-search text-success"></span> View</a>

				                    <a class="dropdown-item view_data" href=<?php echo base_url ?>admin/?page=edit-animalbite&viewid=<?php echo $row['id'] ?>><span class="fa fa-edit text-danger"></span> Update</a>
				                
									<div class="divider"></div>
									<a class="dropdown-item edit_data" target="_blank" href="generate_pdf.php?id=<?=$row['id']?>"> <span class="fa fa-file-pdf text-danger"></span> Generate PDF</a>
				                  </div>
							</td>

											<!-- 	
												<a href="<?php echo base_url ?>admin/?page=history" class="btn btn-sm btn-primary">View</a>					
												<a target="_blank" href="generate_pdf.php?id=<?=$row['id']?>" class="btn btn-sm btn-primary">Generate PDF<i class="fa fa-file-pdf-o"></a> -->
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
		<div id="delete" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="../assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this record?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
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