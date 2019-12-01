<?php
if(isset($_POST['create_customer'])){

  $customer_name = $_POST['customer_name'];

  $customer_password = $_POST['customer_password'];

  $customer_firstname = $_POST['customer_firstname'];
 
  $customer_lastname = $_POST['customer_lastname'];

  $customer_email = $_POST['customer_email'];

  $customer_image = $_FILES['customer_image']['name'];
  $customer_image_temp = $_FILES['customer_image']['tmp_name']; 

  $customer_role = $_POST['customer_role'];


  move_uploaded_file($customer_image_temp, "image/$customer_image");

  $query = "INSERT INTO customers (customer_name, customer_password, customer_firstname, customer_lastname, customer_email, customer_image, customer_role) VALUES('{$customer_name}', '{$customer_password}', '{$customer_firstname}', '{$customer_lastname}', '{$customer_email}', '{$customer_image}', '{$customer_role}')";


  $create_customer_query= mysqli_query($connection, $query);
  if(!$create_customer_query){
        die("query failed" . mysqli_error($connection));
}


  $the_customer_id=mysqli_insert_id($connection);
   echo "<p class='bg-success'>Customer Added: <a href='view_customer.php?c_id={$the_customer_id}'> View customer</a></p>";

}
?>