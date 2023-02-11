<?php
require_once('../config.php');
include_once('SMS.php'); //include the SMS class

class Master extends DBConnection
{
	private $settings;

	//instantiate sms class
	private $sms;

	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;
		$this->sms = new SMS();
		parent::__construct();
	}
	public function __destruct()
	{
		parent::__destruct();
	}

	function capture_err()
	{
		if (!$this->conn->error)
			return false;
		else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			if (isset($sql))
				$resp['sql'] = $sql;
			return json_encode($resp);
			exit;
		}
	}
	// function save_appointment(){
	// 	extract($_POST);

	// 	return $contact;
	// } 

	function save_appointment()
	{

		//GET current user id from session
		$user_id = isset($_SESSION['userdata']['id']) ? $_SESSION['userdata']['id'] : "";
		// $p_id = isset($_SESSION['userdata']['id']) ? $_SESSION['userdata']['id'] : "";
		if (isset($_SESSION['user_id'])) {
			$current_user_id = $_SESSION['user_id'];
		} else {
			$current_user_id = NULL;
		}

		extract($_POST);

		$sched_set_qry = $this->conn->query("SELECT * FROM `schedule_settings`");
		$sched_set = array_column($sched_set_qry->fetch_all(MYSQLI_ASSOC), 'meta_value', 'meta_field');
		$morning_start = date("Y-m-d ") . explode(',', $sched_set['morning_schedule'])[0];
		$morning_end = date("Y-m-d ") . explode(',', $sched_set['morning_schedule'])[1];
		$afternoon_start = date("Y-m-d ") . explode(',', $sched_set['afternoon_schedule'])[0];
		$afternoon_end = date("Y-m-d ") . explode(',', $sched_set['afternoon_schedule'])[1];
		$sched_time = date("Y-m-d ") . date("H:i", strtotime($date_sched));


		//schedule filter
		if (!in_array(strtolower(date("l", strtotime($date_sched))), explode(',', strtolower($sched_set['day_schedule'])))) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Selected Schedule Day of Week is invalid.";
			return json_encode($resp);
			exit;
		}
		if (!((strtotime($sched_time) >= strtotime($morning_start) && strtotime($sched_time) <= strtotime($morning_end)) || (strtotime($sched_time) >= strtotime($afternoon_start) && strtotime($sched_time) <= strtotime($afternoon_end)))) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Selected Schedule Time is invalid.";
			return json_encode($resp);
			exit;
		}
		$check = $this->conn->query("SELECT * FROM `appointments` where ('" . strtotime($date_sched) . "' Between unix_timestamp(date_sched) and unix_timestamp(DATE_ADD(date_sched, interval 15 MINUTE)) OR '" . strtotime($date_sched . ' +15 mins') . "' Between unix_timestamp(date_sched) and unix_timestamp(DATE_ADD(date_sched, interval 15 MINUTE))) " . ($id > 4 ? " and id != '{$id}' " : ""))->num_rows;
		$this->capture_err();
		if ($check > 4) {
			$resp['status'] = 'failed';
			$resp['msg'] = "The selected time slot is already full.";
			return json_encode($resp);
			exit; // no need for exit.. return automaticall exit after execution
		}

		//
		if (empty($patient_id))
			$sql = "INSERT INTO `patient_list` set name = '{$name}',mname = '{$mname}',lname = '{$lname}'  ";
		else
			$sql = "UPDATE `patient_list` set name = '{$name}',mname = '{$mname}',lname = '{$lname}' where id = '{$id}'  ";
		$save_inv = $this->conn->query($sql);
		$this->capture_err();

		if ($save_inv) {
			$patient_id = (empty($patient_id)) ? $this->conn->insert_id : $patient_id;
			if (date("Y-m-d H:i", strtotime($date_sched)) <= date("Y-m-d H:i")) {
				$resp['status'] = 'failed';
				$resp['msg'] = "The selected date has already passed.";
				return json_encode($resp);
				exit;
			}


			//if user' patient is admin execute this if block else admin is login
			// $sql = "INSERT INTO `appointments`(`patient_id`, `user_id`, `date_sched`, `reason`, `status`) VALUES ('$patient_id','$user_id','$date_sched','$reason','$status')";
			if (!empty($current_user_id)) {
				if (empty($id))
					$sql = "INSERT INTO `appointments` SET `date_sched` = '{$date_sched}',`sched_date` = '{$date_sched}',patient_id = '{$patient_id}',`status` = '{$status}',`reason` = '{$reason}', `p_id`='{$current_user_id}',`created`='{$created}'";
				else
					$sql = "UPDATE `appointments` set date_sched = '{$date_sched}',`sched_date` = '{$date_sched}',patient_id = '{$patient_id}',`status` = '{$status}',`reason` = '{$reason}',`created`='{$created}' where id = '{$id}' ";
			} else {
				if (empty($id)) {
					if ($user_id) {
						$sql = "INSERT INTO `appointments`(`patient_id`, `user_id`, `date_sched`, `reason`, `status`,`created`) VALUES ('$patient_id','$user_id','$date_sched','$reason','$status','$created')";
					} else {
						$sql = "INSERT INTO `appointments`(`patient_id`, `date_sched`, `reason`, `status`, `p_id`,`created`) VALUES ('$patient_id','$date_sched','$reason','$status', '$current_user_id','$created')";
					}
				}
				// else
				// 	$sql = "UPDATE `appointments` set date_sched = '{$date_sched}',patient_id = '{$patient_id}',`status` = '{$status}',`reason` = '{$reason}' where id = '{$id}' ";
			}
			// $sql = "INSERT INTO `appointments` set date_sched = '{$date_sched}',patient_id = '{$patient_id}',`status` = '{$status}',`reason` = '{$reason}'";


			$save_sched = $this->conn->query($sql);
			$this->capture_err();
			$data = "";

			foreach ($_POST as $k => $v) {
				if (!in_array($k, array('lid', 'date_sched', 'status', 'reason'))) {
					if (!empty($data)) $data .= ", ";
					$data .= " ({$patient_id},'{$k}','{$v}')";
				}
			}

			$sql = "INSERT INTO `patient_meta` (patient_id,meta_field,meta_value) VALUES $data ";
			$this->conn->query("DELETE FROM `patient_meta` where patient_id = '{$patient_id}'");
			$save_meta = $this->conn->query($sql);
			$this->capture_err();
			if ($save_sched && $save_meta) {
				//formate date 
				$new_sched = date('F d, Y H:i A', strtotime($date_sched));
				//create message text
				$message = "Hi {$name}, thank you for making an appointment with RHU II Nabua. \nYou are scheduled for an appointment on {$new_sched}.\nPlease arrive 10 minutes before the scheduled time.";
				// $message .= " On {$new_sched}";

				//send sms enable this later
				$res = $this->sms->sendSMS($contact, $message);

				//return json encode to ajax
				return json_encode([
					'status' => 'success',
					'msg' => 'Your appointment is set',
					'sms_respond' => $res
				]);

				// bakit to naka flashdata pero naka ajax kayo?
				/**
				 this->settings->set_flashdata('success',' Appointment successfully saved');
				 * 
				 */
			} else {
				$resp['status'] = 'failed';
				$resp['msg'] = "There's an error while submitting the data.";
			}
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "There's an error while submitting the data.";
		}
		return json_encode($resp);
	}
function multiple_action() {
  extract($_POST);

  if ($_action == 'cancelled') {
  $stat_arr = array("pending" => 0, "confirmed" => 1, "cancelled" => 2);
  $status = $stat_arr[$_action];

  $cancelled_by = $_SESSION['userdata']['firstname'] . ' ' . $_SESSION['userdata']['lastname'];
  $cancelled_time = date("Y-m-d H:i:s");
  $seen_status = 0;

  $sql = "UPDATE `appointments` set status = '{$status}', cancelled_by='{$cancelled_by}', cancelled_time='{$cancelled_time}',seen_status = '{$seen_status}' where patient_id in (" . (implode(",", $ids)) . ") ";
  $process = $this->conn->query($sql);
  $this->capture_err();

  // remove the schedule time but store the date_sched in new column
  $sql_remove = "UPDATE `appointments` set date_sched = null where patient_id in (" . (implode(",", $ids)) . ")";
  $process_remove = $this->conn->query($sql_remove);
  $this->capture_err();

//get the patient contact and name from patient_meta table
  $sql_contact = "SELECT patient_meta.patient_id, patient_meta.meta_value as name, patient_meta.meta_value as contact, appointments.sched_date FROM `patient_meta` JOIN appointments ON patient_meta.patient_id = appointments.patient_id WHERE (patient_meta.meta_field = 'contact') AND patient_meta.patient_id IN (" . (implode(",", $ids)) . ")";
  $contact_res = $this->conn->query($sql_contact);
  while ($row = $contact_res->fetch_assoc()) {
    $name = $row['name'];
    $contact = $row['contact'];
    $sched_date = date('F d, Y H:i A', strtotime($row['sched_date']));

    // create message text
    $message = "Hi your appointment on {$sched_date} has been cancelled. Thank you for choosing RHU II Nabua for your health needs.";

    // send sms
    $res = $this->sms->sendSMS($contact, $message);
  }
}
 else if ($_action == 'delete') {
    $sql = "DELETE s.*,i.*,im.* from  `appointments` s inner join `patient_list` i on s.patient_id = i.id  inner join `patient_meta` im on im.patient_id = i.id where s.patient_id in (" . (implode(",", $ids)) . ") ";
    $process = $this->conn->query($sql);
    $this->capture_err();
  } else {
    $stat_arr = array("pending" => 0, "confirmed" => 1, "cancelled" => 2);
    $status = $stat_arr[$_action];

    $sql = "UPDATE `appointments` set status = '{$status}' where patient_id in (" . (implode(",", $ids)) . ") ";
    $process = $this->conn->query($sql);
    $this->capture_err();
  }

  if ($process) {
    $resp['status'] = 'success';
    $act = $_action == 'delete' ? "Deleted" : "Updated";
    $this->settings->set_flashdata("success", "Appointment/s successfully " . $act);
  } else {
    $resp['status'] = 'failed';
    $resp['error_sql'] = $sql;
  }
  return json_encode($resp);
}


	function save_sched_settings()
	{
		$data = "";
		foreach ($_POST as $k => $v) {
			if (is_array($_POST[$k]))
				$v = implode(',', $_POST[$k]);
			if (!empty($data)) $data .= ",";
			$data .= " ('{$k}','{$v}') ";
		}
		$sql = "INSERT INTO `schedule_settings` (`meta_field`,`meta_value`) VALUES {$data}";
		if (!empty($data)) {
			$this->conn->query("DELETE FROM `schedule_settings`");
			$this->capture_err();
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', ' Schedule settings successfully updated');
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_appointment':
		echo $Master->save_appointment();
		break;
	case 'multiple_action':
		echo $Master->multiple_action();
		break;
	case 'save_sched_settings':
		echo $Master->save_sched_settings();
		break;
	default:
		// echo $sysset->index();
		break;
}
