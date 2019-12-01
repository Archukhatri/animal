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
        		<th>Dog Image</th>
        		<th>Dog Name</th>
            <th>Dog Description</th>
        		<th>Dog Price</th>
            <th>Edit Data</th>
            <th>Delete Data</th>
            </tr>
        </thead>

<tbody>

 <?php
        $query = "SELECT * FROM sliders ORDER BY slider_id DESC ";
            
            $select_sliders = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($select_sliders)){

                $slider_id=$row['slider_id'];

                $slider_dogimage=$row['slider_dogimage'];

                $slider_dogname=$row['slider_dogname'];

                $slider_description=$row['slider_description'];

                $slider_dogprice=$row['slider_dogprice'];
                echo "<tr>";

        ?>
        <?php
            
            echo "<td>$slider_id</td>";

           echo "<td> <img width='100' src ='image/$slider_dogimage' alt ='image'></td>";

            echo "<td>$slider_dogname</td>";

            echo "<td>$slider_description</td>";

            echo "<td>$slider_dogprice</td>";



            echo "<td><a href='edit_slider.php?source=edit_slider&s_id={$slider_id}'> Edit</a></td>";

                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='view_slider.php?delete={$slider_id}'> Delete </a></td>";

                
                 echo "</tr>";
         
         }
         
         ?>
</tbody>
</table>

<?php
            if(isset($_GET['delete'])){
              $the_slider_id = $_GET['delete'];

              $query = "DELETE FROM sliders WHERE slider_id = {$the_slider_id}";
              $delete_query = mysqli_query($connection,$query);
              header("Location: view_slider.php");

            }
?>
