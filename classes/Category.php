<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Category
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function catInsert($cat_name, $cat_id, $cat_description)
	{
		$cat_id = $this->fm->validation($cat_id);
		$cat_id = mysqli_real_escape_string($this->db->link, $cat_id);
		$cat_name = $this->fm->validation($cat_name);
		$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
		$cat_description = $this->fm->validation($cat_description);
		$cat_description = mysqli_real_escape_string($this->db->link, $cat_description);

		if (empty($cat_id)) {
			$MSG = "<span class='success'> Category ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($cat_name)) {
			$MSG = "<span class='success'> Category Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "INSERT INTO tbl_category(cat_id, cat_name,  cat_description) VALUES('$cat_id', '$cat_name', ' $cat_description')";
			$cateInsert = $this->db->insert($query);
			if ($cateInsert) {
				$MSG = "<span class='success'> Category Intered Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> Category Not Intered. </span>";
				return $MSG;
			}
		}
	}
	public function getAllCat()
	{
		$query = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getByCatId($id){
		$query = "SELECT * FROM tbl_category WHERE cat_id='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateCat($cat_id, $cat_name, $cat_description){
		$cat_id = $this->fm->validation($cat_id);
		$cat_id = mysqli_real_escape_string($this->db->link, $cat_id);
		$cat_name = $this->fm->validation($cat_name);
		$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
		$cat_description = $this->fm->validation($cat_description);
		$cat_description = mysqli_real_escape_string($this->db->link, $cat_description);

		if (empty($cat_id)) {
			$MSG = "<span class='success'> Category ID can't be empty. </span>";
			return $MSG;
		}
		elseif (empty($cat_name)) {
			$MSG = "<span class='success'> Category Name can't be empty. </span>";
			return $MSG;
		}
		else {
			$query = "UPDATE tbl_category
					SET cat_name = '$cat_name', cat_description = '$cat_description'
					WHERE cat_id = '$cat_id'";
					$updated_row = $this->db->update($query);
			if ($updated_row) {
				$MSG = "<span class='success'> Category updated Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> Category Not Updated. </span>";
				return $MSG;
			}
		}
	}
	public function catDeleteById($id){
		$query = "DELETE FROM tbl_category
				WHERE cat_id = '$id'";
		$DataDelete = $this->db->delete($query);
		if ($DataDelete) {
			$MSG = "<span class='success'> Category Deleted Successfully. </span>";
			return $MSG;
		}
		else {
			$MSG = "<span class='error'> Category Not Deleted. </span>";
				return $MSG;
		}
	}

	public function totCat()
	{
		$query = "SELECT COUNT(*) AS count_cat FROM tbl_category";
		$result = $this->db->select($query);
		return $result;
	}

	public function getTopCat()
	{
		$query = "SELECT * FROM tbl_category WHERE top_cat = 1 ORDER BY cat_id ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSubCat($cat_id)
	{
		$query = "SELECT * FROM tbl_category NATURAL JOIN tbl_subcategory
		WHERE cat_id = '$cat_id' ORDER BY subCatName ASC";
		$result = $this->db->select($query);
		return $result;
	}
}
?>