<?php
require_once '../config.php';
class Login extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function index(){
		echo "<h1>Access Denied</h1> <a href='".base_url."'>Go Back.</a>";
	}


	public function login(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from staff where username = '$username' and password = md5('$password') ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k) && $k != 'password'){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',1);
			return json_encode(array('status'=>'success'));
		}else{
			return json_encode(array('status'=>'incorrect','last_qry'=>"SELECT * from staff where username = '$username' and password = md5('$password') "));
		}
	}

	public function logout(){
		if($this->settings->sess_des()){
			redirect('admin/login.php');
		}
	}

	function login_user(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * from staff where usersname = '$usersname' and password = md5('$password') ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				$this->settings->set_userdata($k,$v);
			}
			$this->settings->set_userdata('login_type',1);
		$resp['status'] = 'success';
		}else{
		$resp['status'] = 'incorrect';
		}
		if($this->conn->error){
			$resp['status'] = 'failed';
			$resp['_error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	function login_for_all(){
		extract($_POST);

		//if user username is admin
		$verify_ = $this->check_admin($username, $password);
		if($verify_){
			$admin_q = $this->conn->query("SELECT * from staff where username = '$username' and password = md5('$password')");
			if($admin_q->num_rows > 0){
				foreach(mysqli_fetch_assoc($admin_q) as $k => $v){
					$this->settings->set_userdata($k,$v);
				}
				$this->settings->set_userdata('login_type',1);

			//return true for access 
				return json_encode([
					'user' => 'admin',
					'access' => true
				]);
			}
			//return access false or denied to ajax
			return json_encode([
				'user' => 'admin',
				'access' => false
			]);
		}

		//else user is not admin .. then execute this code
		$patient = $this->conn->query("SELECT * from patient where username = '$username' and password = md5('$password') ");

		if(mysqli_num_rows($patient) > 0){
			$row = mysqli_fetch_assoc($patient);
			$_SESSION['user_id'] = $row['id'];
			//return true for access 
			return json_encode([
				'user' => 'patient',
				'access' => true
			]);
		}

		//return access false or denied to ajax
		return json_encode([
			'user' => 'patient',
			'access' => false
		]);

	}

	//if user username is admin
	function check_admin($username, $password){
		$admin = $this->conn->query("SELECT * from staff where username = '$username'");
		if($admin->num_rows > 0){
			return true;
		}

		return false;
	}
}

$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'for_all':
		echo $auth->login_for_all();
		break;
	case 'login':
		echo $auth->login();
		break;
	case 'login_user':
		echo $auth->login_user();
		break;
	case 'logout':
		echo $auth->logout();
		break;
	default:
		echo $auth->index();
		break;
}