<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Admin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function userInsert($admin_name, $admin_id, $admin_username)
	{
		$admin_id = $this->fm->validation($admin_id);
		$admin_id = mysqli_real_escape_string($this->db->link, $admin_id);
		$admin_name = $this->fm->validation($admin_name);
		$admin_name = mysqli_real_escape_string($this->db->link, $admin_name);
		$admin_username = $this->fm->validation($admin_username);
		$admin_username = mysqli_real_escape_string($this->db->link, $admin_username);

		if (empty($admin_id)) {
			$MSG = "<span class='success'> User ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($admin_name)) {
			$MSG = "<span class='success'> User Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "INSERT INTO admin(admin_id, admin_name,  admin_username, admin_password) VALUES('$admin_id', '$admin_name', '$admin_username', '$admin_username')";
			$usereInsert = $this->db->insert($query);
			if ($usereInsert) {
				$MSG = "<span class='success'> User Intered Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> User Not Intered. </span>";
				return $MSG;
			}
		}
	}
	public function getAlladmin()
	{
		$query = "SELECT * FROM admin ORDER BY admin_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLimitedAdmin($limit)
	{
		$query = "SELECT * FROM admin ORDER BY admin_id ASC LIMIT $limit";
		$result = $this->db->select($query);
		return $result;
	}
	public function getByAdminId($id){
		$query = "SELECT * FROM admin WHERE admin_id='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateAdmin($admin_id, $admin_name, $admin_username, $admin_password){
		$admin_id = $this->fm->validation($admin_id);
		$admin_id = mysqli_real_escape_string($this->db->link, $admin_id);
		$admin_name = $this->fm->validation($admin_name);
		$admin_name = mysqli_real_escape_string($this->db->link, $admin_name);
		$admin_username = $this->fm->validation($admin_username);
		$admin_username = mysqli_real_escape_string($this->db->link, $admin_username);
		$admin_password = $this->fm->validation($admin_password);
		$admin_password = mysqli_real_escape_string($this->db->link, $admin_password);

		if (empty($admin_id)) {
			$MSG = "<span class='success'> User ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($admin_name)) {
			$MSG = "<span class='success'> User Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "UPDATE admin
					SET admin_name = '$admin_name', admin_username = '$admin_username', admin_password = '$admin_password'
					WHERE admin_id = '$admin_id'";
					$updated_row = $this->db->update($query);
			if ($updated_row) {
				$MSG = "<span class='success'> User updated Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> User Not Updated. </span>";
				return $MSG;
			}
		}
	}
	public function adminDeleteById($id){
		$query = "DELETE FROM admin
				WHERE admin_id = '$id'";
		$DataDelete = $this->db->delete($query);
		if ($DataDelete) {
			$MSG = "<span class='success'> User Deleted Successfully. </span>";
			return $MSG;
		}
		else {
			$MSG = "<span class='error'> User Not Deleted. </span>";
			return $MSG;
		}
	}

	public function totAdmin()
	{
		$query = "SELECT COUNT(*) AS count_admin FROM admin";
		$result = $this->db->select($query);
		return $result;
	}
}
?>