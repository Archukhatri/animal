<!-- to connect with database -->
<?php include "db.php";?>

<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>

<?php include "functions.php";
?>




<?php
if(isset($_GET['c_id'])){
	$the_customer_id= $_GET['c_id'];

}
$query = "SELECT * FROM customers WHERE customer_id = $the_customer_id";
$select_customer_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_customer_by_id)){
$customer_id=$row['customer_id'];
$customer_name=$row['customer_name'];
$customer_password=$row['customer_password'];
$customer_firstname=$row['customer_firstname'];

$customer_lastname=$row['customer_lastname'];

$customer_email=$row['customer_email'];

$customer_image=$row['customer_image'];

$customer_role=$row['customer_role'];

}


if(isset($_POST['update_customer'])){

	// $customer_id=$_POST['customer_id'];
	$customer_name=$_POST['customer_name'];
	$customer_password=$_POST['customer_password'];
	$customer_firstname=$_POST['customer_firstname'];
	$customer_lastname=$_POST['customer_lastname'];
	$customer_email=$_POST['customer_email'];
	
	$customer_image = $_FILES['customer_image']['name'];
	$customer_image_temp = $_FILES['customer_image']['tmp_name'];

	$customer_role=$_POST['customer_role'];


	move_uploaded_file($customer_image_temp, "image/$customer_image");
	if(empty($customer_image)){
		$query = "SELECT * FROM customers WHERE customer_id = $the_customer_id";
		$select_image = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_image))
		{
			$customer_image =$row['customer_image'];
		}
	}

	$query = "UPDATE customers SET ";
	
	$query .= "customer_name='{$customer_name}' , ";
	$query .= "customer_password='{$customer_password}' , ";
	$query .= "customer_firstname='{$customer_firstname}' , ";
	$query .= "customer_lastname='{$customer_lastname}' , ";
	$query .= "customer_email='{$customer_email}' , ";
	$query .= "customer_image='{$customer_image}' , ";
	$query .= "customer_role='{$customer_role}' ";
	
	$query .="WHERE customer_id = {$the_customer_id}";

	$update_customer = mysqli_query($connection, $query);



	confirmQuery($update_customer);
	echo "<p class='bg-success'>Customer Updated: <a href='view_customer.php?c_id={$the_customer_id}'> View Customer</a> or <a href='edit_customer.php'>Edit More Customers</a></p>";


}	

?>





<div class="well">
  <h4>let post the data</h4>
  <form action="" method="post" role="form" enctype="multipart/form-data">
    <div class="form-group">
      <label for="customer_name">Enter your name</label>
      <input type="text" value="<?php echo $customer_name?>"  name="customer_name" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="customer_password">Enter your password</label>
      <input type="text" value="<?php echo $customer_password?>"  name="customer_password" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_firstname">Enter your first name</label>
      <input type="text" value="<?php echo $customer_firstname?>"  name="customer_firstname" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_lastname">Enter your last name</label>
      <input type="text" value="<?php echo $customer_lastname?>"  name="customer_lastname" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_email">Enter your email</label>
      <input type="text" value="<?php echo $customer_email?>"  name="customer_email" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_image">Select your image</label>
      <input type="file" value="<?php echo $customer_image?>"  name="customer_image" class="form-control">
    </div>

    <div class="form-group">
       <label for="customer_role">Select who are you?</label>
       <input type="text" value="<?php echo $customer_role?>" name="customer_role" class="form-control">
  </div>


<button value="update_customer" name="update_customer" type="submit" class="btn btn-primary">Update Submit</button>

</form>
</div>