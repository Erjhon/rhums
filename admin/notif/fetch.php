<?php
//fetch.php;
if(isset($_POST["view"])){
	
	include '../../config.php';
	if($_POST["view"] != ''){
		mysqli_query($conn,"update `appointments` set seen_status='1' where seen_status='0'");
	}
	
	$query=mysqli_query($conn,"select * from `appointments` order by id desc limit 5");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
		if(!empty($row['cancelled_by']) && !empty($row['cancelled_time'])){
			$output .= '<li class="">
<div class="dropdown-menu-lg">
<a href="#!" class="list-group-item list-group-item-action">
<div class="row align-items-center">

<div class="col ml--2">
<div class="d-flex justify-content-between align-items-center">
<div>
<div>
<h6 class="mb-0 text-sm">Appointment No: '.$row['patient_id'].'</h6>
</div>
<h4 class="mb-0 text-sm">Cancelled By: '.$row['cancelled_by'].'</h4>
</div>
<div class="text-right text-muted">
<small></small>
</div>
</div>
<p class="text-sm mb-0">Cancelled Time: '.date("M d, Y h:i A",strtotime($row['cancelled_time'])).'</p>
</div>
</div>
</a>
</div>
</li>
			';
		}
	}
	if(empty($output)){
		$output .= '<li><a href="#" class="text-dark text-italic"> No Notification Found</a></li>';
	}
}
else{
	$output .= '<li><a href="#" class="text-dark text-italic"> No Notification Found</a></li>';
}
	
	$query1=mysqli_query($conn,"select * from `appointments` where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
}
?>