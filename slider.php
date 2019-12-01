 <div class="col-sm-8">
    <h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
     

      

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
         <?php
            $count = 0;
          $query = "SELECT * FROM sliders ";
          $select_all_sliders_query = mysqli_query($connection,$query);
           while($row = mysqli_fetch_assoc($select_all_sliders_query)){
            $slider_dogimage=$row['slider_dogimage'];

             $slider_dogname=$row['slider_dogname'];

              $slider_description=$row['slider_description'];
            ?>
        <div class="item <?php if ($count == 0){
          echo "active";
        } ?> ">
            
                    <img src="image/<?php echo $slider_dogimage;?>">
                
          <div class="carousel-caption">
               <?php echo "<b>$slider_dogname</b>"; ?>
               <br>
               <?php echo "Description: $slider_description"; ?>
          </div>      
        </div>
         <?php
$count++;
          } ?>

      <?php

    $count_counter = 0;

    $query = "SELECT * FROM sliders";
     $select_sliders = mysqli_query($connection, $query);
      ?>  
      
      <ol class="carousel-indicators">
        <?php 
         while($row = mysqli_fetch_assoc($select_sliders)){
         ?>
         <li data-target="#myCarousel" data-slide-to="<?php echo $count_counter; ?>" class="<?php if ($count_counter == 0) { echo "active"; } ?>"></li>
         <?php 
         $count_counter++;
       } ?>
       

      </div>


      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>