<?php if($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
	</script>
<?php endif;?>

<style>
	.img-avatar{
		width:45px;
		height:45px;
		object-fit:cover;
		object-position:center center;
		border-radius:100%;
	}
</style>
<div class="card card-outline card-primary" >
	<div class="card-header">
		<h2 class="card-title text-center ">List of Patient Users</h2>
		<div class="card-tools">
			<!-- <a href="?page=user/manage_patient" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a> -->
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class=" table py-1 py-lg-1 table-hover table-striped text-center datatable ">
				<thead>
					<tr>
						<th>#</th>
						<th>Avatar</th>
						<th>Name</th>
						<th>Username</th>
						
					</tr>
				</thead>
				<tbody>
<?php

$conn = mysqli_connect("localhost","root","","scheduler_db");
$query ="SELECT * FROM patient";
$query_run = mysqli_query($conn,$query);

?>

					<?php 
					$i = 1;
					$qry = $conn->query("SELECT * FROM `patient`");
					while($row = $qry->fetch_assoc()):
						?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>					
							<td class="img-avatar img-thumbnail p-0 avatar">
								<img src="<?php echo "../patient/uploaded_img/".$row['image'];?>"></td>
							<td><?php echo $row['firstname']?> <?php echo $row['lastname']?></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
							<!-- <td ><p class="m-0 truncate-1"><?php echo $row['role'] ?></p></td> -->

							
						<?php if (isset($_GET['id'])) {  
							$id = $_GET['id'];  
							$query = "DELETE FROM `patient` WHERE id = '$id'";  
							$run = mysqli_query($conn,$query);  
							if ($run) {  

							}else{  
								echo "Error: ".mysqli_error($conn);  
							}  
						} ?>
					<?php endwhile; ?>

				</tbody>

			</table>

		</div>
	</div>
</div>
</div>
<div class="modal fade" id="confirm_modal" role='dialog'>
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Confirmation</h5>
			</div>
			<div class="modal-body">
				<div id="delete_content"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


		<script type="text/javascript">
	
	$(document).ready( function () {
		$('table').DataTable();
	} );
</script>

