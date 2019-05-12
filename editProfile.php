<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php
	$custLogin = Session::get("customerLogin");

	if ($custLogin == false) {
		header("location:login.php");
	}
?>

<?php

   $customer_id = Session::get("customerId");
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $updateCustomerPro = $cmr->updateCustomerProfile($_POST,$customer_id);
          
  }
?>

<style>
	
	.table{
		width: 550px;
		margin:0 auto;
		border: 2px solid #ddd;
	}

  .user{
    text-align: center;
  }
</style>

 <div id="content">

    <div class="table-responsive form-group">
    <h2 class="user">Update Profile information</h2>

    <?php
    	$id = Session::get("customerId");
    	$getData =$cmr->getCustomerData($id);

    	if ($getData) {
    		while ($result=$getData->fetch_assoc()) {  ?>

      <form action="" method="post">
      <table class="table">

       	<tr>
       		<td width="30%">First Name</td>
       		<td><input type="text" name="first_name" value="<?php echo $result['first_name'];?>"></td>
       	</tr>

        <tr>
       		<td width="30%">Last Name</td>
       		<td><input type="text" name="last_name" value="<?php echo $result['last_name'];?>"></td>
       	</tr>

       	<tr>
       		<td>Address</td>
       		<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
             		
       		
       	</tr>

       	<tr>
       		<td>City</td>
       		<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
        
       	</tr>

       	<tr>
       		<td>Zip</td>
       		<td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
       	</tr>

       	<tr>
       		<td>Phone</td>
       		<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
        
       	
       	</tr>

       	<tr>
       		<td>Email</td>
       		<td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
       	</tr>

       	<tr>
       		<td>Country</td>
            <td>
                <select name="country_id" id="input-country" class="form-control">
                    <option value=""> --- Please Select --- </option>
                    <?php
                        $getCountry = $cmr->getAllCountry();
                            if ($getCountry) {
                              $i=0;
                              while ($resultCountry = $getCountry->fetch_assoc()) {
                                $i++;
                    ?>
                    <option value="<?php echo $resultCountry['country_id']; ?>"><?php echo $resultCountry['country_name']; ?></option>
                    <?php } } ?>
                </select>
            </td>
       	
       	</tr>

         <tr>
          <td></td>         
          <td><input type="submit" name="submit" value="Save"></td>
        </tr>

         
      </table>

      </form>

      <?php } }?>

	</div>

</div>


<?php include 'inc/footer.php'; ?>