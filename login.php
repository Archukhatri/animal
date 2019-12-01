<?php
include "db.php";
?>
<?php
if(isset($_SESSION['customer_role'])) {

if($_SESSION['customer_role'] !== 'admin')
{
    header("Location: home.php");
}
}
?>

<?php session_start();?>



<?php
if(isset($_POST['login'])){

  $customer_name = $_POST['customer_name'];
  $customer_password = $_POST['customer_password']; 

  $customer_name = mysqli_real_escape_string($connection, $customer_name);
  $customer_password= mysqli_real_escape_string($connection, $customer_password);
  
  $query = "SELECT * FROM customers WHERE customer_name = '{$customer_name}' ";
  $select_customer_query = mysqli_query($connection, $query);
  if(!$select_customer_query){
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while($row = mysqli_fetch_array($select_customer_query)){

    $db_customer_id = $row['customer_id'];
    $db_customer_name = $row['customer_name'];
    $db_customer_password= $row['customer_password'];
     $db_customer_firstname = $row['customer_firstname'];
     $db_customer_lastname = $row['customer_lastname'];
      $db_customer_role = $row['customer_role'];
  }



if(password_verify($customer_password, $db_customer_password)){
  
$_SESSION['customername'] = $db_username;
$_SESSION['customer_firstname'] = $db_customer_firstname;
$_SESSION['customer_lastname'] = $db_customer_lastname;
$_SESSION['customer_role'] = $db_customer_role;





  header("Location: view_customer.php ");
}
else{
  header("Loction: home.php ");
}}
?>