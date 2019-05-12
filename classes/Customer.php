<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
	class Customer{
		private $db;
		private $fm;

		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();
		}


		public function getAllCountry()
		{
			$query = "SELECT * FROM tbl_countries ORDER BY country_id ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function customerRegistration($data){

			$first_name     = mysqli_real_escape_string($this->db->link, $data['first_name']);
			$last_name      = mysqli_real_escape_string($this->db->link, $data['last_name']);
			$email    		= mysqli_real_escape_string($this->db->link, $data['email']);
			$phone          = mysqli_real_escape_string($this->db->link, $data['phone']);
			$address	    = mysqli_real_escape_string($this->db->link, $data['address']);
			$city   	    = mysqli_real_escape_string($this->db->link, $data['city']);
			$zip            = mysqli_real_escape_string($this->db->link, $data['zip']);
			$country_id 	= mysqli_real_escape_string($this->db->link, $data['country_id']);
			$password 	    = mysqli_real_escape_string($this->db->link, $data['password']);


			if ($first_name == "" || $last_name == "" || $email == "" || $phone == "" || $address == "" || $city == "" || $zip == "" || $country_id == "" || $password == "") {
				$MSG = "<span class='error'> Fields must not be empty. </span>";
				return $MSG;
			}

			$mailQuery = "SELECT * FROM tbl_customers WHERE email = '$email' limit 1 ";
			$mailCheck = $this->db->SELECT($mailQuery);

			if ($mailCheck != false) {
				$MSG = "<span class = 'error'> Email already exits !!</span>";
				return $MSG;
			}else{

				$query = "INSERT INTO tbl_customers(first_name, last_name, email, phone, address, city, zip, country_id, password) 
				VALUES('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$zip', '$country_id', '$password')";

				$insertRow = $this->db->insert($query);

				if ($insertRow) {
                    header("location:cart.php");
					$MSG = "<span class='success'> Customer data inserted Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Customer data not inserted Successfully. </span>";
					return $MSG;
				}
			}
		}

		public function customerLogin($data){

			$email    = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);

			if (empty($email ) || empty($password)) {
				$MSG = "<span class='error'> Fields must not be Empty. </span>";
				return $MSG;
			}

			$query = "SELECT * FROM tbl_customers WHERE email = '$email' AND password = '$password'";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				Session::set("customerLogin", true);
				Session::set("customerId",    $value['customer_id']);
				Session::set("customerName",  $value['first_name']);

				header("location:cart.php");
			}else{
				$MSG = "<span class='error'> Email or Password not matched. </span>";
				return $MSG;
			}
		}

		public function getCustomerData($id){
			$query = "SELECT * FROM tbl_customers NATURAL JOIN tbl_countries
			WHERE customer_id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
        
        public function updateCustomerProfile($data, $customer_id){


			$first_name     = mysqli_real_escape_string($this->db->link, $data['first_name']);
			$last_name      = mysqli_real_escape_string($this->db->link, $data['last_name']);
			$address	    = mysqli_real_escape_string($this->db->link, $data['address']);
			$city   	    = mysqli_real_escape_string($this->db->link, $data['city']);
			$zip            = mysqli_real_escape_string($this->db->link, $data['zip']);
			$phone          = mysqli_real_escape_string($this->db->link, $data['phone']);

			$email    		= mysqli_real_escape_string($this->db->link, $data['email']);
		
			$country_id 	= mysqli_real_escape_string($this->db->link, $data['country_id']);
			


			if ($first_name == "" || $last_name == "" || $email == "" || $phone == "" || $address == "" || $city == "" || $zip == "" || $country_id == "") {
				$MSG = "<span class='error'> Fields must not be empty. </span>";
				return $MSG;
			}else{

				$query = "UPDATE tbl_customers
					SET 
					first_name = '$first_name', 
					last_name = '$last_name',
					address = '$address',
					city = '$city',
					zip = '$zip',
					phone = '$phone',
					email = '$email',
				    country_id = '$country_id'

					WHERE customer_id = '$customer_id'";
						$updated_row = $this->db->update($query);
					if ($updated_row) {
                        header("location:profile.php");
						$MSG = "<span class='success'> Customer Profile  updated Successfully. </span>";
						return $MSG;
					}
					else {
						$MSG = "<span class='error'> Customer profile Not Updated. </span>";
						return $MSG;
					}
		}
			
			
		}
	}
?>