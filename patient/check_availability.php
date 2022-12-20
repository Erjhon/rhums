<?php 
include 'config.php';

if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	$result =mysqli_query($conn,"SELECT username FROM patient WHERE username='$username'");
	$count=mysqli_num_rows($result);

	if($count>0) {
		echo "<span style='color:red'> Username already exists.</span>";
	 	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span style='color:green'> Username available.</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	$result1 =mysqli_query($conn,"SELECT email FROM patient WHERE email='$email'");

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "<span style='color:red'> Invalid email.</span>";
	 	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span style='color:green'> Email available.</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>