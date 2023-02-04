<?php
 error_reporting(0);
    ini_set('display_errors', 0);
if(isset($_POST['Submit']))
{
    $user_id = isset($_SESSION['userdata']['id']) ? $_SESSION['userdata']['id'] : "";
    $oldpass=md5($_POST['opwd']);
    $newpassword=md5($_POST['npwd']);
    $sql=mysqli_query($conn,"SELECT password FROM staff where password='$oldpass'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
        $conn=mysqli_query($conn,"update staff set password='$newpassword' where id='$user_id'");
        $_SESSION['msg1']= " <script>
        Swal.fire({
            icon: 'success',
            title: 'Password changed successfully',
            toast: true,
            position:'top-end',
            showConfirmButton: false,
            timer: 1000
        })</script>";
    }
    else
    {
        $_SESSION['msg1']= " <script>
        Swal.fire({
            icon: 'error',
            title: 'Old password not matched!',
            toast: true,
            position:'top-end',
            showConfirmButton: false,
            timer: 1000
        })</script>";
    }
}
?>
<style>
    .required::after{
        content: " *";
        color: red;
        font-size: 16px;
    }
    #hide{
        display: none;
        cursor: pointer;
    }
    #show{
        cursor: pointer;
    }
    #hide1{
        display: none;
        cursor: pointer;
    }
    #show1{
        cursor: pointer;
    }
    #hide2{
        display: none;
        cursor: pointer;
    }
    #show2{
        cursor: pointer;
    }
</style>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title">Change Password</h2>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div id="msg"></div>
            <?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?>
            <form name="chngpwd" action="" method="post" onSubmit="return valid();">
                <div class="form-group">
                    <label for="password" class="required">Old Password</label>
                    <div class="input-group input-group-alternative mb--1">
                        <input type="password" name="opwd" id="myInput" class="form-control" value="" autocomplete="off" onkeyup='check();' />
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="hide" onclick="myFunction()"></i>
                            <i class="fa fa-eye-slash" id="show" onclick="myFunction()"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="required">New Password</label>
                    <div class="input-group input-group-alternative mb--1">
                        <input  type="password" name="npwd" id="myInput1" class="form-control" value="" autocomplete="off" onkeyup="validatePassword()" onkeyup='check();' />
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="hide1" onclick="myFunction1()"></i>
                            <i class="fa fa-eye-slash" id="show1" onclick="myFunction1()"></i>
                        </span>
                    </div>
                    <span id="validatePassword1" style="font-size:12px;"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="required">Confirm Password</label>
                    <div class="input-group input-group-alternative mb--1">
                        <input  type="password" name="cpwd" id="myInput2" class="form-control" value="" autocomplete="off" onkeyup='check();' />
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="hide2" onclick="myFunction2()"></i>
                            <i class="fa fa-eye-slash" id="show2" onclick="myFunction2()"></i>
                        </span>
                    </div>

                </div>


<!-- 
<table align="center">
<tr height="50">
<td>Old Password :</td>
<td><input type="password" name="opwd" id="opwd"></td>
</tr>
<tr height="50">
<td>New Passowrd :</td>
<td><input type="password" name="npwd" id="npwd"></td>
</tr>
<tr height="50">
<td>Confirm Password :</td>
<td><input type="password" name="cpwd" id="cpwd"></td>
</tr>
<tr>
<td><a href="index.php">Back to login Page</a></td>
<td><input type="submit" name="Submit" value="Change Passowrd" /></td>
</tr>
</table> -->
<!-- <div class="card-footer"> -->
    <div class="col-md-12 d-flex justify-content-center">
        <div class="row">
            <input type="submit" id="submit" name="Submit" class="btn btn-md btn-primary" value="Update">
        </div>
    </div>
    <!-- </div> -->
</form>






</div>
</div>
</div>

<script type="text/javascript">
    function valid()
    {
        if(document.chngpwd.opwd.value=="")
        {
            Swal.fire({
                icon: 'warning',
                title: 'Old Password Field is Empty',
                toast: true,
                position:'top-end',
                showConfirmButton: false,
                timer: 5000

            });
            document.chngpwd.opwd.focus();
            return false;
        }
        else if(document.chngpwd.npwd.value=="")
        {
            Swal.fire({
                icon: 'warning',
                title: 'New Password Field is Empty',
                toast: true,
                position:'top-end',
                showConfirmButton: false,
                timer: 5000

            });
            document.chngpwd.npwd.focus();
            return false;
        }
        else if(document.chngpwd.cpwd.value=="")
        {
            Swal.fire({
                icon: 'warning',
                title: 'Confirm Password Field is Empty',
                toast: true,
                position:'top-end',
                showConfirmButton: false,
                timer: 5000

            });
            document.chngpwd.cpwd.focus();
            return false;
        }
        else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
        {
            Swal.fire({
                icon: 'error',
                title: 'Password and Confirm Password Field do not match  !!',
                toast: true,
                position:'top-end',
                showConfirmButton: false,
                timer: 5000

            });
            document.chngpwd.cpwd.focus();
            return false;
        }
        return true;
    }
</script>


<!-- show password -->
<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type == "password"){
      x.type = "text";
      document.getElementById('hide').style.display = "inline-block";
      document.getElementById('show').style.display = "none";
    }else{
      x.type = "password";
      document.getElementById('hide').style.display = "none";
      document.getElementById('show').style.display = "inline-block";
    }
  }

  function myFunction1() {
    var y = document.getElementById("myInput1");
    if (y.type == "password"){
      y.type = "text";
      document.getElementById('hide1').style.display = "inline-block";
      document.getElementById('show1').style.display = "none";
    }else{
      y.type = "password";
      document.getElementById('hide1').style.display = "none";
      document.getElementById('show1').style.display = "inline-block";
    }
  }
  function myFunction2() {
    var a = document.getElementById("myInput2");
    if (a.type == "password"){
      a.type = "text";
      document.getElementById('hide2').style.display = "inline-block";
      document.getElementById('show2').style.display = "none";
    }else{
      a.type = "password";
      document.getElementById('hide2').style.display = "none";
      document.getElementById('show2').style.display = "inline-block";
    }
  }

  function validatePassword() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "../admin/user/check_availability_users.php",
        data:'password='+$("#myInput1").val(),
        type: "POST",
        success:function(data){
            $("#validatePassword1").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
  }
</script>
