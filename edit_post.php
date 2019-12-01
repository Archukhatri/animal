<!-- to connect with database -->
<?php include "db.php";?>

<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>

<?php include "functions.php";
?>


<?php
if(isset($_GET['p_id'])){
	$the_post_id= $_GET['p_id'];

}
// echo $the_post_id;
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_post_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_post_by_id)){
	$post_category_id=$row['post_category_id'];
	$post_dog_name=$row['post_dog_name'];
	$post_customer=$row['post_customer'];
	$post_date= $row['post_date'];

	$post_image=$row['post_image'];

	$post_description=$row['post_description'];
	$post_dog_price=$row['post_dog_price'];
	$post_comment_count=$row['post_comment_count'];
	$post_status=$row['post_status'];
	$post_views_count=$row['post_views_count'];
	$post_life_expectancy=$row['post_life_expectancy'];
	$post_gender=$row['post_gender'];
	$post_height=$row['post_height'];
	$post_weight=$row['post_weight'];
	$post_colors=$row['post_colors'];
}


if(isset($_POST['update_post'])){

	$post_category_id=$_POST['post_category_id'];
	$post_dog_name=$_POST['post_dog_name'];
	$post_customer=$_POST['post_customer'];
	$post_date= $row['post_date'];

	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];
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
// echo $post_image;die();

	move_uploaded_file($post_image_temp, "image/$post_image");

	if(empty($post_image)){
		$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
		$select_image = mysqli_query($connection, $query);

		// print_r($select_image); die();
		while($row = mysqli_fetch_assoc($select_image))
		{
			$post_image =$row['post_image'];
		}
	}

	$query = "UPDATE posts SET ";
	$query .= "post_category_id = '{post_category_id}' , ";
	$query .= "post_dog_name = '{$post_dog_name}', ";
	$query .= "post_customer = '{$post_customer}',";
	$query .= "post_date = now(),";
	$query .= "post_image='{$post_image}',";
	$query .= "post_description='{$post_description}',";
	$query .= "post_dog_price='{$post_dog_price}',";
	$query .= "post_comment_count='{$post_comment_count}',";
	$query .= "post_status='{$post_status}',";
	$query .= "post_views_count='{$post_views_count}',";
	$query .= "post_life_expectancy='{$post_life_expectancy}',";
	$query .= "post_gender='{$post_gender}',";
	$query .= "post_height='{$post_height}',";
	$query .= "post_weight='{$post_weight}',";
	$query .= "post_colors='{$post_colors}' ";

	$query .="WHERE post_id={$the_post_id}";

	$update_post = mysqli_query($connection,$query);



	confirmQuery($update_post);
	echo "<p class='bg-success'>Post Updated: <a href='view_post.php?p_id={$the_post_id}'> View Post</a> or <a href='edit_post.php'>Edit More Posts</a></p>";


}
?>



<div class="well">
	<h4>let post the data</h4>
	<form action="" method="post" role="form" enctype="multipart/form-data">

        <div class="form-group">
			<label for="post_category_id">Select the dogs category</label>
			<select name="post_category_id" id="">
				<?php
				$query = "SELECT * FROM categories";
				$select_categories = mysqli_query($connection,$query);

				confirmQuery($select_categories);

				while($row = mysqli_fetch_assoc($select_categories)){
					$dog_id = $row['dog_id'];
					$dog_name = $row['dog_name'];

					echo "<option value='$dog_id'>{$dog_name}</option>";
				}
				?>
			</select>
		</div>



		<div class="form-group">
			<label for="post_dog_name">Enter name of dog</label>
			<input type="text" value="<?php echo $post_dog_name?>" name="post_dog_name" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_customer">Enter customer name</label>
			<input type="text" value="<?php echo $post_customer?>" name="post_customer" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_date">Enter date of post</label>
			<input type="date" value="<?php echo $post_date?>" name="post_date" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_image">Select another image of dog</label>
				<img width="100" src="image/<?php echo $post_image;?>" alt="">
 		<input type="file" name="post_image">
		</div>


		<div class="form-group">
			<label for="post_description">Enter description</label>
			<input value="<?php echo $post_description?>" name="post_description" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_dog_price">Enter price of dog</label>
			<input type="text" value="<?php echo $post_dog_price?>" name="post_dog_price" class="form-control" >
		</div>

		<div class="form-group">
			<label for="post_comment_count">Number of comments</label>
			<input text="text" value="<?php echo $post_comment_count?>" name="post_comment_count" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_status">Select the status</label>
			<select name="post_status" id="">
				<option value='<?php echo $post_status; ?>'>Select:</option>

				if($post_status == 'published' ){
				
				echo "<option value='draft'>Draft</option>";
			}else{
			echo "<option value='published'>Published</option>";
		     }
	        </select>
        </div>


		<div class="form-group">
			<label for="post_views_count">Number of views</label>
			<input type="text" value="<?php echo $post_views_count?>" name="post_views_count" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_life_expectancy">Enter life </label>
			<input type="text" value="<?php echo $post_life_expectancy?>" name="post_life_expectancy" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_gender">Enter gender</label>
			<input type="text"  value="<?php echo $post_gender?>" name="post_gender" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_height">Enter height</label>
			<input type="text"  value="<?php echo $post_height?>" name="post_height" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_weight">Enter weight</label>
			<input type="text"  value="<?php echo $post_weight?>" name="post_weight" class="form-control">
		</div>

		<div class="form-group">
			<label for=" post_colors">Enter color</label>
			<input type="text"  value="<?php echo $post_colors?>" name=" post_colors" class="form-control">
		</div>


		<div class="form-group">
 			<input class="btn btn-primary" type="submit"  value="Update_Post" name="update_post">
 		</div>


		</form>
		</div>


		<!-- for footer -->
		<?php include "footer.php";
		?>



		</body>
		</html>