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
			$output .= '
			<li>
				<h4 class="text-dark">
				Cancelled by:<br></h4>'.$row['cancelled_by'].'
				<h4 class="text-dark">Cancelled time:<br></h4>'.date("M d, Y h:i A",strtotime($row['cancelled_time'])).'
				
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