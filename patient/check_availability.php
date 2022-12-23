<?php 
include 'config.php';

if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	$result =mysqli_query($conn,"SELECT username FROM patient WHERE username='$username'");
	$result1 =mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
	$count=mysqli_num_rows($result);
	$count1=mysqli_num_rows($result1);

	if($count||$count1>0) {
		echo "<span class='text-danger''> Username already exists.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span class='text-success''> Username available.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

if(!empty($_POST["email"])) {
	$email= $_POST["email"];

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
exit ("<span class='text-danger'>Invalid email address</span>"); //error handling ;)
}
$select = mysqli_query($conn, "SELECT `email` FROM `patient` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
$select1 = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
$result=mysqli_num_rows($select);
$result1=mysqli_num_rows($select1);

if($result||$result1>0) {
	echo "<span style='color:red'> Email already registered.</span>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> Email available.</span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
}
}

?>
<!-- 
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
?> -->