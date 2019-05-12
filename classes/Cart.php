<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Cart Class
*/
class Cart
{
	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($quantity, $id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$product_id = mysqli_real_escape_string($this->db->link, $id);

		$sId = session_id();

		$squery = "SELECT *
		FROM tbl_product
		WHERE product_id = '$product_id'
		";
		$result = $this->db->select($squery)->fetch_assoc();

		$price = $result['price'];

		$checkCartQuery = "SELECT * FROM tbl_cart WHERE product_id ='$product_id' AND sId = '$sId'";

		$getPd = $this->db->select($checkCartQuery);
		if ($getPd) {
			$msg = "Product Already Added !!";
			return $msg;
		}else{

			$query = "INSERT INTO tbl_cart(sId, product_id, price, quantity) VALUES ('$sId', '$product_id', '$price', '$quantity')
		    	";
		    	$productInsert = $this->db->insert($query);
				if ($productInsert) {
					header("location:cart.php");
				}
				else {
					header("location:404.php");
				}

		}
	}

	public function getCartProduct(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart NATURAL JOIN tbl_product WHERE sId = '$sId'";

		$result = $this->db->select($query);
		return $result;
	}

	public function updateCartQuantity($cart_id, $quantity){

		$cart_id  = mysqli_real_escape_string($this->db->link,$cart_id);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);

		$query = "UPDATE tbl_cart
					SET 
					quantity = '$quantity'

					WHERE cart_id = '$cart_id' ";

					$updated_row= $this->db->update($query);

				if ($updated_row) {
				$MSG = "<span class='success'> Quantity updated Successfully. </span>";
				return $MSG;
				}
				else {
					$MSG = "<span class='error'> Quantity Not Updated. </span>";
					return $MSG;
				}
	}


	public function deleteProductFromCart($delId){

		$delId = mysqli_real_escape_string($this->db->link, $delId);

		$query = "DELETE FROM tbl_cart
				WHERE cart_id = '$delId'";
		$DataDelete = $this->db->delete($query);
		if ($DataDelete) {
			echo " <script>window.location='cart.php'</script>";
		}
		else {
			$MSG = "<span class='error'> Product Not Deleted. </span>";
				return $MSG;
		}
	}

	public function checkCartTable(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart NATURAL JOIN tbl_product WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function insertOrderProduct($customer_id){

		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$orderDate = date("Y-m-d h:i:sa", time());
		
		$getPro = $this->db->select($query);

		if ($result = $getPro->fetch_assoc()) {
			$product_id = $result['product_id'];
			$quantity = $result['quantity'];
			$amount = $result['price'];


			$query = "INSERT INTO tbl_orders(customer_id, product_id, quantity, amount, order_date) VALUES ('$customer_id', '$product_id', '$quantity', '$amount', '$orderDate')";

			$orderInsert = $this->db->insert($query);
		}

	}

	public function delCustomerCart(){
		$sId = session_id();	

		$query = "DELETE FROM tbl_cart WHERE sid = '$sId' ";

		$delOrder = $this->db->delete($query);
		if ($delOrder) {
					header("location:orderDetails.php");
				}
				else {
					header("location:404.php");
				}

	}

	public function getOrderProduct($customer_id){
		$query = "SELECT * FROM tbl_orders NATURAL JOIN tbl_product
		WHERE customer_id= '$customer_id' ORDER BY product_id DESC " ;
		$result = $this->db->select($query);
		return $result;
	}

	public function checkOrderTable(){
		$customer_id = session_id();
		$query = "SELECT * FROM tbl_orders WHERE customer_id = '$customer_id'";
		$result = $this->db->select($query);
		return $result;
	}

}

?>