<!-- to connect with database -->
<?php include "db.php";?>

<?php
if(isset($_POST['create_post'])){
	
	$post_category_id=$_POST['post_category_id'];
	$post_dog_name=$_POST['post_dog_name'];
	$post_customer=$_POST['post_customer'];
	$post_date=date('d-m-y');


	$post_image=$_FILES['post_image']['name'];
	$post_image_temp=$_FILES['post_image']['tmp_name'];
	// $post_image=$_POST['post_image'];


	$post_description=$_POST['post_description'];
	$post_dog_price=$_POST['post_dog_price'];
	$post_comment_count=$_POST['post_comment_count'];
	$post_status=$_POST['post_status'];
	$post_views_count=$_POST['post_views_count'];
	$post_life_expectancy=$_POST['post_life_expectancy'];
	$post_gender=$_POST['post_gender'];
	$post_height=$_POST['post_height'];
	$post_weight=$_POST['post_weight'];
	$post_colors=$_POST['post_colors'];
		

	move_uploaded_file($post_image_temp,"image/$post_image");

	$query = "INSERT INTO posts(post_category_id, post_dog_name, post_customer, post_date, post_image, post_description, post_dog_price, post_comment_count, post_status, post_views_count, post_life_expectancy, post_gender, post_height, post_weight, post_colors) VALUES({$post_category_id}, '{$post_dog_name}', '{$post_customer}', '{$post_date}', '{$post_image}', '{$post_description}', '{$post_dog_price}', '{$post_comment_count}', '{$post_status}', '{$post_views_count}', '{$post_life_expectancy}', '{$post_gender}', '{$post_height}', '{$post_weight}', '{$post_colors}')";

	$create_post_query= mysqli_query($connection, $query);
	if(!$create_post_query){
	die("query failed" . mysqli_error($connection));}



	$the_post_id=mysqli_insert_id($connection);
	 echo "<p class='bg-success'>Post Created: <a href='view_post.php?p_id={$the_post_id}'> View Post</a></p>";


}
?>





<!-- for header -->
<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>



 <div class="well">
 	<h4>let post the data</h4>
 	<form action="view_post.php" method="post" role="form" enctype="multipart/form-data">
 		
 		<div class="form-group">
 			<label for="post_category_id">Enter category id</label>
 			<input type="text" name="post_category_id" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_dog_name">Enter name of dog</label>
 			<input type="text" name="post_dog_name" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_customer">Enter customer name</label>
 			<input type="text" name="post_customer" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_date">Enter date of post</label>
 			<input type="date" name="post_date" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_image">Enter image of dog</label>
 		<input type="file" name="post_image" class="form-control">
 		</div>


 		<div class="form-group">
 			<label for="post_description">Enter description</label>
 			<textarea name="post_description" class="form-control" rows="3"></textarea>
 		</div>
 		<div class="form-group">
 			<label for="post_dog_price">Enter price of dog</label>
 			<input type="text" name="post_dog_price" class="form-control" >
 		</div>

 		<div class="form-group">
 			<label for="post_comment_count">Number of comments</label>
 			<input text="text" name="post_comment_count" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_status">Status of post</label>
 			<input type="text" name="post_status" class="form-control">
 		</div>


 		<div class="form-group">
 			<label for="post_views_count">Number of views</label>
 			<input type="text" name="post_views_count" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_life_expectancy">Enter life </label>
 			<input type="text" name="post_life_expectancy" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_gender">Enter gender</label>
 			<input type="text" name="post_gender" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_height">Enter height</label>
 			<input type="text" name="post_height" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="post_weight">Enter weight</label>
 			<input type="text" name="post_weight" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for=" post_colors">Enter color</label>
 			<input type="text" name=" post_colors" class="form-control">
 		</div>

 		
       



<button name="create_post" type="submit" class="btn btn-primary">Submit</button>

</form>
</div>









<!-- for footer -->
 <?php include "footer.php";
 ?>

 

</body>
</html>