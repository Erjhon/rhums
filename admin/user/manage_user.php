<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
	$user = $conn->query("SELECT * FROM staff where id ='{$_GET['id']}'");
	foreach($user->fetch_array() as $k =>$v){
		$meta[$k] = $v;
	}
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
	</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
	<a href="#" class="nav-icon ni ni-bold-left text-success" style = "display: flex; justify-content: flex-end" onclick="history.back()">Back</a>
		<h2 class="card-title">Add User</h2>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">
				<div class="form-group col-12 d-flex justify-content-center">
					 <?php 
$id=$_SESSION['userdata']['id'];
$qry = $conn->query("SELECT * From staff where id = '$id'");
        while($row = $qry->fetch_assoc()):
          $pathx = "../";
          $file = $row["avatar"];
           switch(true)
              {
                case ($row['avatar'] == (!empty($row['gender'])) ):
                echo '<img src="'.$pathx.$file.'"  class="alt="" id="cimg" class="img-fluid img-thumbnail';
                break;
                case ($row['gender'] == 'Male'):
                echo '<img src="../dist/img/male_staff.png" class="alt="" id="cimg" class="img-fluid img-thumbnail';
                break;
                case ($row['gender'] == 'Female'):
                echo '<img src="../dist/img/staff.png"class="alt="" id="cimg" class="img-fluid img-thumbnail';
                break;
              } 

            ?>">
                </span>
              <?php endwhile?>
					<!-- <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail"> -->
				</div>	
				<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
				<!-- Form Row-->
				<div class="row gx-3 mb-3">
					<!-- Form Group (first name)-->
					<div class="col-md-4">
						<label class="small mb-1 required" for="inputFirstName">First Name</label>
						<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
					</div>
					<!-- Form Group (last name)-->
					<div class="col-md-4">
						<label class="small mb-1 required" for="inputLastName">Middle Initial</label>
						<input type="text" name="middleInitial" id="middleInitial" class="form-control" maxlength="2" value="<?php echo isset($meta['middleInitial']) ? $meta['middleInitial']: '' ?>" required>
					</div>
					<!-- Form Group (last name)-->
					<div class="col-md-4">
						<label class="small mb-1 required" for="inputLastName">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
					</div>
				</div>
				<!-- Form Row        -->
				<div class="row gx-3 mb-3">
					<div class="col-md-4">
					 	<label class="small mb-1 required" for="inputusername">Sex</label>
                    <select type="text" class="form-control form-select-sm-6" name="gender" required>
                        <option class="placeholder" style="display: none" selected disabled value="">Select Sex</option>
                        <option<?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                        <option<?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                    </select>
                    </div>
					<!-- Form Group (username)-->
					<div class="col-md-4">
						<label class="small mb-1 required" for="inputusername">Username</label>
						<input type="text" name="username" id="username" onkeyup="userAvailability()" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
						<span id="user-availability-status1" style="font-size:12px;"></span>
					</div>
					<!-- Form Group (email)-->
					<div class="col-md-4">
						<label class="small mb-1 required" for="inputEmailAddress">Email Address</label>
						<input type="text" name="email" id="email" class="form-control" onkeyup="userAvailability2()"value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required autocomplete="off">
						<span id="user-availability-status2" style="font-size:12px;" ></span>
					</div>

				</div>
				<!-- Form Row        -->
				<div class="row gx-3 mb-3">
					<!-- Form Group (password)-->
					<div class="col-md-6">
						<label class="small mb-1 required" for="inputPassword">Password</label>
						<div class="input-group input-group-alternative mb--1">
							<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": '' ?> required>
							<?php if(isset($_GET['id'])): ?>
							<?php endif; ?>
							<span class="input-group-text">
								<i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle1()"></i>
							</span>
						</div>
						<!-- <small><i>Leave this blank if you dont want to change the password.</i></small> -->
<!--     <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'required' ?>>
<?php if(isset($_GET['id'])): ?>
<small><i>Leave this blank if you dont want to change the password.</i></small>
<?php endif; ?> -->
</div>

<div class="col-md-6">
	<label class="small mb-1 required" for="password"> Confirm Password</label>
	<div class="input-group input-group-alternative mb--1">
		<input type="password" name="password" id="confirm_password" class="form-control" value="" autocomplete="off" onkeyup='check();'/ required>
		<span class="input-group-text">
			<i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle2()"></i>
		</span>
	</div>	
	<small id='message'></small>						             
</div>

</div>
<div class="row gx-3 mb-3">
<!-- Form Group (user type)-->
<div class="col-md-6">
	<label class="small mb-1 required" for="inputusertype">User Type</label>
	<select  class="form-control input-group input-group-alternative" name="role" required>
		<!-- <option class="placeholder" style="display: none" >Select user type</option> -->
		<option class="text-muted" value="Staff">Staff</option>
		<option class="text-muted" value="Admin">Admin</option>
	</select>
</div>
	<!-- Form Group (avatar)-->
	<div class="form-group col-md-6 mt-1">
		<label for="" class="small mb-1">Avatar</label>
		<div class="custom-file">
			<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this)">
			<label class="custom-file-label" for="customFile">Choose file</label>
		</div>
	</div>
</div>


<!-- <div class="card-footer"> -->
	<div class="form-group col-12 d-flex justify-content-center">
		<div class="row">
			<button class="btn btn-md btn-primary mr-2" id="submit" form="manage-user">Save</button>
			<a class="btn btn-md btn-secondary" href="./?page=user/list">Cancel</a>
		</div>
	</div>
</div>

<!-- 	<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
<div class="form-group col-6">
<label for="name">First Name</label>
<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
</div>
<div class="form-group col-6">
<label for="name">Last Name</label>
<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
</div>
<div class="form-group col-6">
<label for="username">Username</label>
<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
</div>
<div class="form-group col-6">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'required' ?>>
<?php if(isset($_GET['id'])): ?>
<small><i>Leave this blank if you dont want to change the password.</i></small>
<?php endif; ?>
</div>
<div  class="form-group col-6">
<label for="user_type">User Type</label>
<select  class="form-control input-group input-group-alternative" name="role">
<option class="text-muted" value="Admin">Admin</option>
<option class="text-muted" value="Staff">Staff</option>
</select>
</div>

<div class="form-group col-6">
<label for="" class="control-label">Avatar</label>
<div class="custom-file">
<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
<label class="custom-file-label" for="customFile">Choose file</label>
</div>
</div>
<div class="form-group col-6 d-flex justify-content-center">
<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
</div>
</form>
</div>
</div> -->
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	.required::after{
      content: " *";
      color: red;
      font-size: 13px;
    }
</style>
<!-- show password -->
<script>
	var state = false;
	function toggle1(){
		if (state){
			document.getElementById("password").setAttribute("type", "password");
			state = false;
		} else{
			document.getElementById("password").setAttribute("type", "text");
			state = true;
		}
	}
</script>

<script>
	var state = false;
	function toggle2(){
		if (state){
			document.getElementById("confirm_password").setAttribute("type", "password");
			state = false;
		} else{
			document.getElementById("confirm_password").setAttribute("type", "text");
			state = true;
		}
	}
</script>
<!-- Confirm password validation -->
<script type="text/javascript">
	var check = function() {
		if (document.getElementById('password').value ==
			document.getElementById('confirm_password').value) {
			document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Password matched';
	} else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Password not matched';
	}
}
</script>
<script>
	function displayImg(input,_this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
		var _this = $(this)
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success:function(resp){
				if(resp ==1){
					location.reload()
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					$("html, body").animate({ scrollTop: 0 }, "fast");
				}
				end_loader()
			}
		})
	})

</script>

<script>
	function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "user/check_availability_users.php",
			data:'username='+$("#username").val(),
			type: "POST",
			success:function(data){
				$("#user-availability-status1").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}
</script> 

<script>
	function userAvailability2() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "user/check_availability_users.php",
			data:'email='+$("#email").val(),
			type: "POST",
			success:function(data){
				$("#user-availability-status2").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}
</script> 