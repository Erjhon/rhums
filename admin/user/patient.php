
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
						<th>Email</th>
						<th>Contact</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Address</th>
					
					
						
					</tr>
				</thead>
				<tbody>	<?php 
					$i = 1;
						$qry = $conn->query("SELECT * From patient");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class="text-center">
								<img src="<?php echo "../patient/uploaded_img/".$row['image'];?> "  class="img-avatar img-thumbnail p-0 border-2 avatar avatar--default default--two "  alt="">
							


							</td>
							<td><?php echo ucwords($row['firstname']) ?> <?php echo ucwords($row['lastname']) ?></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['email'] ?></p></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['contact'] ?></p></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['gender'] ?></p></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['dob'] ?></p></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['address'] ?></p></td>
						
							
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
<style>

.avatar--default {
  position: relative;
  overflow: hidden;
  width: 50px;
  height: 50px;
  margin: auto;

}
.avatar--default::before {
  content: "";
  position: absolute;
  left: 50%;
  bottom: 0;
  width: 70%;
  height: 44%;
  margin: 0 0 0 -35%;
  border-radius: 100% 100% 0 0;
}
.avatar--default::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 19%;
  width: 40%;
  height: 40%;
  margin: 0 0 0 -20%;
  border-radius: 50%;
}
.avatar--default.default--two {
  background-color: #f2f2f2;
  border-radius: 50%;
}
.avatar--default.default--two::before {
  background-color: #999;
}
.avatar--default.default--two::after {
  background-color: #999;
  box-shadow: 0 0 0 4px #f2f2f2;
}
</style>

