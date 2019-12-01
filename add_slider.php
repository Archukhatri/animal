<!-- to connect with database -->
<?php include "db.php";?>
<?php include "functions.php";?>


<!-- for header -->
<?php include "header.php";
?>

<?php include "navigation_bar.php";
?>
<?php
if(isset($_POST['create_slider'])){
	
    $slider_dogimage=$_FILES['slider_dogimage']['name'];
	$slider_dogimage_temp=$_FILES['slider_dogimage']['tmp_name']; 

	$slider_dogname=$_POST['slider_dogname'];
	$slider_description=$_POST['slider_description'];
	$slider_dogprice=$_POST['slider_dogprice'];


	move_uploaded_file($slider_dogimage_temp,"image/$slider_dogimage");

	$query = "INSERT INTO sliders (slider_dogimage, slider_dogname, slider_description, slider_dogprice) VALUES('{$slider_dogimage}', '{$slider_dogname}', '{$slider_description}', {$slider_dogprice})";


	$create_slider_query= mysqli_query($connection, $query);
	if(!$create_slider_query){
	      die("query failed" . mysqli_error($connection));
}


	$the_slider_id=mysqli_insert_id($connection);
	 echo "<p class='bg-success'>slider Created: <a href='view_slider.php?s_id={$the_slider_id}'> View Slider</a></p>";

}
?>




 <div class="well">
 	<h4>let post the data</h4>
 	<form action="" method="post" role="form" enctype="multipart/form-data">
 		<div class="form-group">
 			<label for="slider_dogimage">Select the image of dog</label>
 			<input type="file" name="slider_dogimage" class="form-control">
 		</div>
 		
 		<div class="form-group">
 			<label for="slider_dogname">Enter name of dog</label>
 			<input type="text" name="slider_dogname" class="form-control">
 		</div>
 		
 		<div class="form-group">
 			<label for="slider_description">Enter description</label>
 			<textarea name="slider_description" class="form-control" rows="3"></textarea>
 		</div>

 		<div class="form-group">
 			<label for="slider_dogprice">Enter price of dog</label>
 			<input type="text" name="slider_dogprice" class="form-control">
 		</div>

 		

<button name="create_slider" type="submit" class="btn btn-primary">Submit</button>

</form>
</div>



<!-- for footer -->
 <?php include "footer.php";
 ?>

 

</body>
</html>