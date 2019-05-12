<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
/**
* Brand Class
*/
class Brand
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function brandInsert($brand_name, $brand_id)
	{
		$brand_id = $this->fm->validation($brand_id);
		$brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
		$brand_name = $this->fm->validation($brand_name);
		$brand_name = mysqli_real_escape_string($this->db->link, $brand_name);

		if (empty($brand_id)) {
			$MSG = "<span class='success'> Brand ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($brand_name)) {
			$MSG = "<span class='success'> Brand Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "INSERT INTO tbl_brand(brand_id, brand_name) VALUES('$brand_id', '$brand_name')";
			$brndInsert = $this->db->insert($query);
			if ($brndInsert) {
				$MSG = "<span class='success'> Brand Intered Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> Brand Not Intered. </span>";
				return $MSG;
			}
		}
	}
	public function getAllBrand()
	{
		$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getByBrandId($id){
		$query = "SELECT * FROM tbl_brand WHERE brand_id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateBrand($brand_id, $brand_name){
		$brand_id = $this->fm->validation($brand_id);
		$brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
		$brand_name = $this->fm->validation($brand_name);
		$brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
		if (empty($brand_id)) {
			$MSG = "<span class='success'> Brand ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($brand_name)) {
			$MSG = "<span class='success'> Brand Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "UPDATE tbl_Brand
					SET brand_name = '$brand_name'
					WHERE brand_id = '$brand_id'";
					$updated_row = $this->db->update($query);
			if ($updated_row) {
				$MSG = "<span class='success'> Brand updated Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> Brand Not Updated. </span>";
				return $MSG;
			}
		}
	}

	public function brandDeleteById($id){
		$query = "DELETE FROM tbl_brand
				WHERE brand_id = '$id'";
		$DataDelete = $this->db->delete($query);
		if ($DataDelete) {
			$MSG = "<span class='success'> Brand Deleted Successfully. </span>";
			return $MSG;
		}
		else {
			$MSG = "<span class='error'> Brand Not Deleted. </span>";
				return $MSG;
		}
	}

	public function totBrand()
	{
		$query = "SELECT COUNT(*) AS count_brand FROM tbl_brand";
		$result = $this->db->select($query);
		return $result;
	}
}

 ?>