<!-- to connect with database -->
<?php include "db.php";?>

<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>

<?php include "functions.php";
?>


<?php
if(isset($_GET['s_id'])){
	$the_slider_id= $_GET['s_id'];

}

$query = "SELECT * FROM sliders WHERE slider_id = $the_slider_id";
$select_sliders_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_sliders_by_id)){

	$slider_dogimage=$row['slider_dogimage'];

    $slider_dogname=$row['slider_dogname'];
    $slider_description=$row['slider_description'];
    $slider_dogprice=$row['slider_dogprice'];
}

if(isset($_POST['update_slider'])){

	$slider_dogimage = $_FILES['slider_dogimage']['name'];
	$slider_dogimage_temp = $_FILES['slider_dogimage']['tmp_name'];

	$slider_dogname=$_POST['slider_dogname'];
	$slider_description=$_POST['slider_description'];
	$slider_dogprice=$_POST['slider_dogprice'];


	move_uploaded_file($slider_dogimage_temp, "image/$slider_dogimage");

	if(empty($slider_dogimage)){
		$query = "SELECT * FROM sliders WHERE slider_id = $the_slider_id";
		$select_image = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_image))
		{
			$slider_dogimage =$row['slider_dogimage'];
		}
	}


	$query = "UPDATE sliders SET ";
    $query .= "slider_dogimage = '{$slider_dogimage}' ,";
    $query .= "slider_dogname = '{$slider_dogname}' ,";
    $query .= "slider_description = '{$slider_description}' ,";
    $query .= "slider_dogprice = '{$slider_dogprice}' ";


	$query .="WHERE slider_id={$the_slider_id}";
	$update_slider = mysqli_query($connection,$query);
	confirmQuery($update_slider);

	echo "<p class='bg-success'>Sliders Updated: <a href='view_slider.php?s_id={$the_slider_id}'> View Slider</a> or <a href='edit_slider.php'>Edit More Slider</a></p>";

}
?>

<div class="well">
 	<h4>let post the data</h4>
 	<form action="" method="post" role="form" enctype="multipart/form-data">

 		<div class="form-group">
			<label for="slider_dogimage">Select another image of dog</label>
				<img width="100" src="image/<?php echo $slider_dogimage;?>" alt="">
 		<input type="file" name="slider_dogimage">
		</div>
 		
 		<div class="form-group">
 			<label for="slider_dogname">Enter customer name</label>
 			<input type="text"  value="<?php echo $slider_dogname?>" name="slider_dogname" class="form-control">
 		</div>
 		
 		<div class="form-group">
 			<label for="slider_description">Enter description</label>
 			<input  value="<?php echo $slider_description?>" name="slider_description"  class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="slider_dogprice">Enter price of dog</label>
 			<input type="text"  value="<?php echo $slider_dogprice?>" name="slider_dogprice" class="form-control">
 		</div>

 		

<button value="Update_slider" name="update_slider" type="submit" class="btn btn-primary">Submit</button>

</form>
</div>


<!-- for footer -->
 <?php include "footer.php";
 ?>

 

</body>
</html>