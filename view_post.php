<?php include "db.php";?>

<table border='1'>
        <thead>
        	<tr>
        		<th>id</th>
        		<th>category_id</th>
        	    <th>dog_name</th>
        	    <th>customer</th>
        	    <th>date</th>
        	    <th>image</th>
        	    <th>description</th>
        	    <th>dogprice</th>
        	    <th>comment_count</th>
        	    <th>status</th>
        	    <!-- <th>post_views_count</th> -->
        	    <th>life_expectancy</th>
        	    <th>gender</th>
        	    <th>height</th>
        	    <th>weight</th>
        	    <th>colors</th>
              <th>Edit</th>
              <th>Delete</th>
              <th>views_count</th>

        	</tr>
        </thead>
        <tbody>
        <?php
           $query = "SELECT * FROM posts ORDER BY post_id DESC ";
              $select_posts = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($select_posts)){

                $post_id=$row['post_id'];
              	$post_category_id=$row['post_category_id'];
              	$post_dog_name=$row['post_dog_name'];
              	$post_customer=$row['post_customer'];
              	$post_date= $row['post_date'];

              	$post_image=$row['post_image'];

              	$post_description=$row['post_description'];
              	$post_dog_price=$row['post_dog_price'];
              	$post_comment_count=$row['post_comment_count'];
              	$post_status=$row['post_status'];
              	// $post_views_count=$row['post_views_count'];
              	$post_life_expectancy=$row['post_life_expectancy'];
              	$post_gender=$row['post_gender'];
              	$post_height=$row['post_height'];
              	$post_weight=$row['post_weight'];
              	$post_colors=$row['post_colors'];


                  echo "<tr>";
        ?>
        <?php
        echo "<td>$post_id</td>";
        echo "<td>$post_category_id</td>";
        echo "<td>$post_dog_name</td>";
        echo "<td>$post_customer</td>";
        echo "<td> $post_date</td>";

        echo "<td> <img width='100' src ='image/$post_image' alt ='image'></td>";
        
        echo "<td>$post_description</td>";
        echo "<td>$post_dog_price</td>";
        echo "<td>$post_comment_count</td>";
        echo "<td>$post_status</td>";
       
        echo "<td>$post_life_expectancy</td>";
        echo "<td>$post_gender</td>";
        echo "<td>$post_height</td>";
        echo "<td>$post_weight</td>";
        echo "<td>$post_colors</td>";

      

         echo "<td><a href='edit_post.php?source=edit_post&p_id={$post_id}'> Edit</a></td>";

                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='view_post.php?delete={$post_id}'> Delete </a></td>";
               

                // echo "<td><a href='view.php?reset={$post_id}'>{$post_views_count} </a> </td>";

        echo "</tr>";
              }
        
      
        ?>	
    </tbody>
</table>

<?php
            if(isset($_GET['delete'])){
              $the_post_id = $_GET['delete'];

              $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
              $delete_query = mysqli_query($connection,$query);
              header("Location: view_post.php");

            }


            if(isset($_GET['reset'])){
              $the_post_id = $_GET['reset'];

              $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
              $reset_query = mysqli_query($connection,$query);
               header("Location: view_post.php");

            }
?>