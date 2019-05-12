<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>

<?php
	$custLogin = Session::get("customerLogin");

	if ($custLogin == false) {
		header("location:login.php");
	}
?>

<style>
	
	.table{
		width: 550px;
		margin:0 auto;
		border: 2px solid #ddd;
	}
</style>

 <div id="content">

    <div class="table-responsive form-group">

    <?php
    	$id = Session::get("customerId");
    	$getData =$cmr->getCustomerData($id);

    	if ($getData) {
    		while ($result=$getData->fetch_assoc()) {  ?>
      <table class="table">

       	<tr>
       		<td width="30%">First Name</td>
       		<td width="5%">:</td>     		
       		<td><?php echo $result['first_name'];?></td>
       	</tr>

        <tr>
       		<td width="30%">Last Name</td>
       		<td width="5%">:</td>     		
       		<td><?php echo $result['last_name'];?></td>
       	</tr>

       	<tr>
       		<td>Address</td>
       		<td>:</td>      		
       		<td><?php echo $result['address'];?></td>
       	</tr>

       	<tr>
       		<td>City</td>
       		<td>:</td>
       		<td><?php echo $result['city'];?></td>
       	</tr>

       	<tr>
       		<td>Zip</td>
       		<td>:</td>
       		<td><?php echo $result['zip'];?></td>
       	</tr>

       	<tr>
       		<td>Phone</td>
       		<td>:</td>
       		<td><?php echo $result['phone'];?></td>
       	</tr>

       	<tr>
       		<td>Email</td>
       		<td>:</td>       		
       		<td><?php echo $result['email'];?></td>
       	</tr>

       	<tr>
       		<td>Country</td>
       		<td>:</td>       		
       		<td><?php echo $result['country_name'];?></td>
       	</tr>
        <tr>
          <td></td>
          <td></td>          
          <td><h1> <a href="editProfile.php">Update Details</a></h1></td>
        </tr>

         
      </table>

      <?php } }?>

	</div>

</div>


<?php include 'inc/footer.php'; ?>