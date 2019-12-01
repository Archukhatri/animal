<!-- to connect with database -->
<?php include "db.php";?>

<?php include "add_customer_processes.php";
?>
<?php include "functions.php";?>


<!-- for header -->
<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>




<div class="well">
  <h4>let post the data</h4>
  <form action="" method="post" role="form" enctype="multipart/form-data">
    <div class="form-group">
      <label for="customer_name">Enter your name</label>
      <input type="text" name="customer_name" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="customer_password">Enter your password</label>
      <input type="text" name="customer_password" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_firstname">Enter your first name</label>
      <input type="text" name="customer_firstname" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_lastname">Enter your last name</label>
      <input type="text" name="customer_lastname" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_email">Enter your email</label>
      <input type="text" name="customer_email" class="form-control">
    </div>

     <div class="form-group">
      <label for="customer_image">Select your image</label>
      <input type="file" name="customer_image" class="form-control">
    </div>

    <div class="form-group">
       <label for="customer_role">Select who are you?</label>
       <input type="text" name="customer_role" class="form-control">
  </div>


<button name="create_customer" type="submit" class="btn btn-primary">Submit</button>

</form>
</div>

<!-- for footer -->
 <?php include "footer.php";
 ?>

 

</body>
</html>