<?php
	include_once '../lib/Session.php';
	Session::checkLogin();
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
/**
* Admin Login Class
*/
class AdminLogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
		
	}

	public function adminLogin($admin_username, $admin_password)
	{
		$admin_username = $this->fm->validation($admin_username);
		$admin_password = $this->fm->validation($admin_password);

		$admin_username = mysqli_real_escape_string($this->db->link, $admin_username);
		$admin_password = mysqli_real_escape_string($this->db->link, $admin_password);

		if (empty($admin_username) || empty($admin_password)) {
			$loginmsg = "Username or Parssword can't be empty";
			return $loginmsg;
		}
		else {
			$query = "SELECT * 
			FROM admin 
			WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("admin_login", true);
				Session::set("admin_id", $value['admin_id']);
				Session::set("admin_username", $value['admin_username']);
				Session::set("admin_name", $value['admin_name']);
				header("Location:dashboard.php");
			}
			else {
				$loginmsg = "Username or Parssword do not match!";
			return $loginmsg;
			}
		}

	}
}
?>