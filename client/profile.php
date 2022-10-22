<?php require_once('../config.php'); ?>


 <!DOCTYPE html>
 <html lang="en">
<?php require_once('../inc/header.php') ?>
<div class="card card-outline card-primary">
  <div class="card-header">
        <h2 class="card-title">Update Profile</h2>
    </div>
  <div class="card-body">
    <div class="container-fluid">
      <div id="msg"></div>
      <form action="" id="manage-user"> 
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group col-6">
          <label for="name">First Name</label>
          <input type="text" name="firstname" id="firstname" class="form-control"  required>
        </div>
        <div class="form-group col-6">
          <label for="name">Last Name</label>
          <input type="text" name="lastname" id="lastname" class="form-control" required>
        </div>
        <div class="form-group col-6">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" required  autocomplete="off">
        </div>
        <div class="form-group col-6">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" >
                    <?php if(isset($_GET['id'])): ?>
          <small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
        </div>
        <div class="form-group col-6">
          <label for="user_type">User Type</label>
                      <select  class="input-group input-group-alternative" name="role">
                          <option class="text-muted" value="admin">Admin</option>
                          <option class="text-muted" value="staff">Staff</option>
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
          <img src="" alt="" id="cimg" class="img-fluid img-thumbnail">
        </div>
      </form>
    </div>
  </div>
  <div class="card-footer">
      <div class="col-md-12">
        <div class="row">
          <button class="btn btn-md btn-primary mr-2" form="manage-user">Save</button>
          <a class="btn btn-md btn-secondary" href="">Cancel</a>
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
          location.href = './?page=user/list';
        }else{
          $('#msg').html('<div class="alert alert-danger">Username already exist</div>')
          $("html, body").animate({ scrollTop: 0 }, "fast");
        }
                end_loader()
      }
    })
  })

</script>