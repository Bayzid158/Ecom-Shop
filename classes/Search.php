<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Search Class
*/
class Search
{
	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function SearchProducts($data)
	{	
		$cat_id   = mysqli_real_escape_string($this->db->link, $data['cat_id']);
    	$brand_id = mysqli_real_escape_string($this->db->link, $data['brand_id']);
    	$minPrice = mysqli_real_escape_string($this->db->link, $data['price-min']);
    	$maxPrice = mysqli_real_escape_string($this->db->link, $data['price-max']);
        $search   = mysqli_real_escape_string($this->db->link, $data['search']);
        $sort     = mysqli_real_escape_string($this->db->link, $data['sort']);

		if ($cat_id == 0) {
			$catSearch = "";
		}
		else {
			$catSearch = "cat_id = '$cat_id' AND";
		}
		
		if ($brand_id == 0) {
			$brandSearch = "";
		}
		else {
			$brandSearch = "brand_id = '$brand_id' AND";
		}

		if ($minPrice == 0 || $maxPrice == 0) {
			$PriceSearch = "";
		}
		else {
			$PriceSearch = "price BETWEEN '$minPrice' AND '$maxPrice' AND";
		}

		if ($sort == "ASC" || $sort == "DESC") {
			$sortSearch = "ORDER BY product_name ".$sort;
		}
		else {
			$sortSearch = "";
		}
		
		$query = "SELECT * FROM tbl_product
		NATURAL JOIN tbl_brand NATURAL JOIN tbl_category
		WHERE $catSearch $brandSearch $PriceSearch product_name LIKE '%$search%'
		$sortSearch";
		$result = $this->db->select($query);
		return $result;
	}
}

?>