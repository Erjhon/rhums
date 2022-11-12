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
?>