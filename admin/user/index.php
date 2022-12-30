<?php 
$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<div class="card card-outline card-primary">
	<div class="card-header">
        <h2 class="card-title">Edit Details</h2>
    </div>
	<div class="card-body ">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">	
				<input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="name">Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" onBlur="userAvailability()" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
						<span id="user-availability-status1" style="font-size:12px;"></span>
				</div>
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" name="email" id="email" class="form-control" onBlur="userAvailability2()"value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>">
						<span id="user-availability-status2" style="font-size:12px;" required></span>
				</div>
				<!-- <div class="form-group">
					<label for="password">Password</label>
					   <div class="input-group input-group-alternative mb--1">
                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" onkeyup='check();' />
                        <span class="input-group-text">
                          <i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle1()"></i>
                        </span>
                      </div>
  						
                            </div>

                            <div class="form-group">
					<label for="password"> Confirm Password</label>
					   <div class="input-group input-group-alternative mb--1">
                        <input type="password" name="password" id="confirm_password" class="form-control" value="" autocomplete="off" onkeyup='check();' />
                        <span class="input-group-text">
                          <i class="fa fa-eye rounded" aria-hidden="true" id="eye1" onclick="toggle2()"></i>
                        </span>
                      </div>	
                     	  <span id='message'></span>						             
                            </div> -->

				<div class="form-group">
					<label for="" class="control-label">Avatar</label>
					<div class="custom-file">
		              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
		              <label class="custom-file-label" for="customFile">Choose file</label>
		            </div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12 d-flex justify-content-center">
				<div class="row">
					<button class="btn btn-md btn-primary" form="manage-user">Update</button>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
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
					end_loader()
				}
			}
		})
	})

</script>


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