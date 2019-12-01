<!-- to connect with database -->
<?php include "db.php";?>

<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>

<?php include "functions.php";
?>

<table border='1'>
        <thead>
        	<tr>
        		<th>Id</th>
        		<th>Name</th>
        		<th>Password</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Email</th>
        		<th>Image</th>
        		<th>Role</th>
        	</tr>
        </thead>

<tbody>
        <?php
           $query = "SELECT * FROM customers ORDER BY customer_id DESC ";
              $select_customers = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($select_customers)){

              	$customer_id=$row['customer_id'];
              	$customer_name=$row['customer_name'];
              	$customer_password=$row['customer_password'];
              	$customer_firstname=$row['customer_firstname'];
           
              	$customer_lastname=$row['customer_lastname'];
              	$customer_email=$row['customer_email'];

              	$customer_image=$row['customer_image'];

              	$customer_role=$row['customer_role'];
 
                  echo "<tr>";
        ?>
        <?php
        echo "<td>$customer_id</td>";
        echo "<td>$customer_name</td>";
        echo "<td>$customer_password</td>";
        echo "<td>$customer_firstname</td>";
        echo "<td>$customer_lastname</td>";
        echo "<td>$customer_email</td>";
        echo "<td> <img width='100' src ='image/$customer_image' alt ='image'></td>";
        echo "<td>$customer_role</td>";

   
      
      

        

        echo "<td><a href='edit_customer.php?source=edit_customer&c_id={$customer_id}'> Edit</a></td>";

                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='view_customer.php?delete={$customer_id}'> Delete </a></td>";
               

             

        echo "</tr>";
              }
        
      
        ?>
    </tbody>
</table>

<?php
            if(isset($_GET['delete'])){
              $the_customer_id = $_GET['delete'];

              $query = "DELETE FROM customers WHERE customer_id = {$the_customer_id}";
              $delete_query = mysqli_query($connection,$query);
              

            }


?>







<!-- for footer -->
 <?php include "footer.php";
 ?>

 

</body>
</html>