<?php 
include 'config.php';

if(!empty($_POST["firstname"])) {
	$firstname= $_POST["firstname"];

	if(preg_match("/^[a-zA-Z ]+$/",$firstname)){
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}else{
		echo "<span class='text-danger''>First Name must contain only letters.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}

if(!empty($_POST["middleInitial"])) {
	$middleInitial= $_POST["middleInitial"];

	if(preg_match("/^[a-zA-Z ]+$/",$middleInitial)){
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}else{
		echo "<span class='text-danger''>Middle Initial must contain only letters.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}

if(!empty($_POST["lastname"])) {
	$lastname= $_POST["lastname"];

	if(preg_match("/^[a-zA-Z ]+$/",$lastname)){
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}else{
		echo "<span class='text-danger''>Last Name must contain only letters.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}

if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	$result =mysqli_query($conn,"SELECT username FROM patient WHERE username='$username'");
	$result1 =mysqli_query($conn,"SELECT username FROM staff WHERE username='$username'");
	$count=mysqli_num_rows($result);
	$count1=mysqli_num_rows($result1);

	if($count||$count1>0) {
		echo "<p class='text-danger''><b> Username already exists.</p>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<p class='text-success''> <b>Username available.</p>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["email"])) {
	$email= $_POST["email"];

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit ("<p class='text-danger'><b>Invalid email address</p>"); //error handling ;)
	}
	$select = mysqli_query($conn, "SELECT `email` FROM `patient` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
	$select1 = mysqli_query($conn, "SELECT `email` FROM `staff` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
	$result=mysqli_num_rows($select);
	$result1=mysqli_num_rows($select1);

	if($result||$result1>0) {
		echo "<p class='text-danger'><b>Email already registered.</p>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<p class='text-success'><b> Email available.</p>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["contact"])) {
	$contact= $_POST["contact"];

	if (preg_match("/^0(9)\d{9}$/",$contact)){
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}else{
		echo "<span class='text-danger''>Invalid contact number.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}


?>
