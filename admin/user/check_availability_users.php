<?php 
include '../../config.php';

if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	$result =mysqli_query($conn,"SELECT username FROM patient WHERE username='$username'");
	$result1 =mysqli_query($conn,"SELECT username FROM staff WHERE username='$username'");
	$count=mysqli_num_rows($result);
	$count1=mysqli_num_rows($result1);

	if($count||$count1>0) {
		echo "<span class='text-danger'> Username already exists.</span>";
	 	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span class='text-success'> Username available.</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["email"])) {
	$email= $_POST["email"];

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit ("<span class='text-danger'>Invalid email address</span>"); // Use your own error handling ;)
}
$select = mysqli_query($conn, "SELECT `email` FROM `patient` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
$select1 = mysqli_query($conn, "SELECT `email` FROM `staff` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
$result=mysqli_num_rows($select);
$result1=mysqli_num_rows($select1);

if($result||$result1>0) {
    	echo "<span class='text-danger'> Email already registered.</span>";
	 	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span class='text-success'> Email available.</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["password"])) {
	$password= $_POST["password"];

	if (preg_match("/(?=.*\d)(?=.*[`!%^*()$#\\+_=+-{}:\\?\\.,~&@])(?=.*[a-z])(?=.*[A-Z]).{8,}/",$password)){
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}else{
		echo "<span class='text-danger''>Password must be at least 8 characters and contain at least one uppercase, one lowercase, one number, and one special character.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}
?>