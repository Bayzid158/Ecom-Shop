<?php 

/**
* Stat Class
*/
class Stat
{
	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function siteAllStat()
	{
		$query = "SELECT tbl_product.product_name, tbl_category.cat_name, tbl_brand.brand_name, SUM(tbl_orders.amount)
		FROM
		tbl_product NATURAL JOIN 
        tbl_category NATURAL JOIN 
        tbl_brand NATURAL JOIN 
        tbl_orders
		WHERE tbl_orders.order_date BETWEEN '2017-01-00 00:00:00' AND '2017-12-31 00:00:00'
		GROUP BY tbl_product.product_id
		ORDER BY tbl_product.product_name ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function siteStat($data)
	{
		$startDate = mysqli_real_escape_string($this->db->link, $data['startDate']);
    	$endDate   = mysqli_real_escape_string($this->db->link, $data['endDate']);

		$query = "SELECT tbl_product.product_name, tbl_category.cat_name, tbl_brand.brand_name, SUM(tbl_orders.amount)
		FROM
		tbl_product NATURAL JOIN 
        tbl_category NATURAL JOIN 
        tbl_brand NATURAL JOIN 
        tbl_orders
		WHERE tbl_orders.order_date BETWEEN '$startDate 00:00:00' AND '$endDate 00:00:00'
		GROUP BY tbl_product.product_id
		ORDER BY tbl_product.product_name ASC";
		$result = $this->db->select($query);
		return $result;
	}
}


 ?>