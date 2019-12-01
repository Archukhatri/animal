   
<?php
    include "db.php"; 
?>
<?php
    include "header.php"; 
?>

<?php
    include "functions.php"; 
?>





<?php
if(isset($_POST['submit'])){
    
    $customer_name = $_POST['customer_name'];
    $customer_password = $_POST['customer_password'];
    $customer_email = $_POST['customer_email'];


    if(!empty($customer_name) && !empty($customer_email) && !empty($customer_password) ){

     $customer_name = mysqli_real_escape_string($connection, $customer_name);
     $customer_email = mysqli_real_escape_string($connection, $customer_email);
     $customer_password = mysqli_real_escape_string($connection, $customer_password);


    $customer_password = password_hash($customer_password, PASSWORD_BCRYPT, array('cost' => 12));



    $query = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_role) "; 

    $query .= "VALUES('{$customer_name}', '{$customer_email}', '{$customer_password}', 'customer') ";

    $register_customer_query = mysqli_query($connection, $query);

    if(!$register_customer_query){
        die("Query Failed" . mysqli_error($connection) . ' ' . mysqli_error($connection));
    }

    $message ="your registration has been submitted";




    }else{

        $message = "Feilds cannot be error";
    }

  
   
}else{
    $message = "";
}
  
  
  ?>
    
   
    <!-- Navigation -->
    
   <?php
    include "navigation_bar.php"; 
?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="customer_name" class="sr-only">customer_name</label>
                            <input type="text" name="customer_name" id="username" class="form-control" required placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="customer_email" class="sr-only">Email</label>
                            <input type="customer_email" name="customer_email" id="customer_email" class="form-control" required placeholder="somename@example.com">
                        </div>
                         <div class="form-group">
                            <label for="customer_password" class="sr-only">Password</label>
                            <input type="customer_password" name="customer_password" id="key" class="form-control" required placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "footer.php";?>
