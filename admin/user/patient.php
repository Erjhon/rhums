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
<div class="card card-outline card-primary">
	<div class="card-header">
		<h2 class="card-title text-center">List of Patient Users</h2>
		<div class="card-tools">
			<a href="?page=user/manage_patient" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body ">
        <div class="container-fluid">
			<table class="table py-1 py-lg-1 table-hover table-striped text-center">
				<thead>
					<tr>
						<th>#</th>
						<!-- <th>Avatar</th> -->
						<th>Name</th>
						<th>Username</th>
						<!-- <th>User Type</th> -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * FROM `patient`");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
				<!-- 			<td class="avatar avatar-sm rounded-circle">
              <?php
         $select = mysqli_query($conn, "SELECT * FROM patient") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../patient/images/default-avatar.png">';
         }else{
            echo '<img src="../patient/uploaded_img/'.$fetch['image'].'">';
         }
      ?>

      </td> -->
							<td><?php echo $row['firstname']?> <?php echo $row['lastname']?></td>
							<td ><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
							<!-- <td ><p class="m-0 truncate-1"><?php echo $row['role'] ?></p></td> -->
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href=""><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <!-- ?page=user/manage_user&id=<?php echo $row['id'] ?> -->
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
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
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure you want to delete this user permanently?","delete_user",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Users.php?f=delete",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			success:function(resp){
				if(resp ==1){
					location.href = './?page=user/patient';
				 }else{
					alert_toast("An error occured",'error');
					end_loader();
                    console.log(resp)
				}
			}
		})
	}
</script>
