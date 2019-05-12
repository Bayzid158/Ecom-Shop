<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Orders Class
*/
class Orders
{
	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllOrders()
	{
		$query = "SELECT * 
		FROM tbl_orders
		NATURAL JOIN tbl_product
		NATURAL JOIN tbl_category";

		$result = $this->db->select($query);
		return $result;
	}

	public function orderDeleteById($id)
	{
		$query;
	}
}

?>