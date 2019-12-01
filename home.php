<!-- to connect with database -->
<?php include "db.php";
?>

<!-- for header -->
<?php include "header.php";
?>

<!-- for navigation_bar -->
<?php include "navigation_bar.php";
?>



<div class="container">
  <div class="row">
    <!-- for slider -->
    <?php include "slider.php";
    ?>

    <!-- for sidebar -->
    <?php include "sidebar.php";
    ?>

    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
       
          <?php

          $per_page= 2;

          if(isset($_GET['page'])){


            $page = $_GET['page'];
          }else {
            $page= "";
          }

          if($page == "" || $page ==1){
            $page_1 = 0;
          }else{
            $page_1 = ($page * $per_page) -$per_page;
          }



          $post_query_count = "SELECT * FROM posts";

          $find_count = mysqli_query($connection,$query);

          $count = mysqli_num_rows($find_count);

          $count = ceil($count/$per_page);







          $query ="SELECT * FROM posts LIMIT $page_1, $per_page";
          $select_all_posts_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){//loop start here
                      $post_id=$row['post_id'];
                      $post_category_id=$row['post_category_id'];
                      $post_dog_name=$row['post_dog_name'];
                      $post_customer=$row['post_customer'];
                      $post_date=$row['post_date'];
                      $post_image=$row['post_image'];
                      // $post_description=substr($row['post_description'],0,100);
                      $post_description=$row['post_description'];
                      $post_dog_price=$row['post_dog_price'];
                      $post_life_expectancy=$row['post_life_expectancy'];
                      $post_gender=$row['post_gender'];
                      $post_height=$row['post_height'];
                      $post_weight=$row['post_weight'];
                      $post_colors=$row['post_colors'];
                      $post_status=$row['post_status'];

                      ?>




                      <!-- <h1><?php echo $count; ?></h1> -->

                      <!-- <h2>
                      
                     </h2>

                     <p><span class="glyphicon glyphicon-time"></span><?php echo "Date: $post_date"?></p>
                     <hr> -->

                <!-- <a href="">
                   
                </a>
              -->
            <div class="col-md-12">
              <div class="row">
              <div class="col-sm-3">
              
                <div class="well">
                  <img class="img-responsive" src="image/<?php echo $post_image;?>" width="1000px" height="100px" alt="">
                   <a href="view_post.php?p_id=<?php echo $post_id;?>"><?php echo $post_dog_name ?> </a>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo "Date: $post_date"?></p>
                </div>
                 </div>
             
              <div class="col-sm-9">
                <div class="well">

                  <p><?php echo "Image is uploaded by: $post_customer"; ?></p>
                  <p><?php echo "Description: $post_description"; ?></p>
                  <p><?php echo "life of dog: $post_life_expectancy"; ?></p>
                  <p><?php echo "Gender: $post_gender"; ?></p>
                  <p><?php echo "Height: $post_height"; ?></p>
                  <p><?php echo "weight: $post_weight"; ?></p>
                  <p><?php echo "colors: $post_colors"; ?></p>

                </div>
              </div>
            </div>

         


</div>



              
                    <?php  }//loop close here
                    ?>

  <br>


                  </div>

                </div> 
              </div>






              <ul class ="pager">
                <?php
                for($i =1; $i <= $count; $i++){

                  if($i == $page){

                    echo "<li '><a class='active_link' href='home.php?page={$i}'>{$i}</a></li>";

                  }else{
                    echo "<li  '><a href='home.php?page={$i}'>{$i}</a></li>";
                  }

                }
                ?>
              </ul> 



              <!-- for footer -->
              <?php include "footer.php";
              ?>



            </body>
            </html>


