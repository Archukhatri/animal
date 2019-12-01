<body style="background-color: #F0FFF0">
    <div>
        <h1>Dapper Dogs<small><small  style="color:green;">let them know someones cares</small></small></h1>
      </div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><image src = "./image/logo.jpg" width="30px" height="30px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li> <a href="home.php">Home</a></li>
         <li> <a href="registration.php">Registration</a></li>
         <li> <a href="view_post.php">View All Post</a></li>
         <li> <a href="view_slider.php">View All Slider</a></li>
          <?php 

                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_categories_query)){
                        $dog_name = $row['dog_name'];

                        echo "<li><a href='#'>{$dog_name}<?a></li>";

                    }
                       
                    ?>


      </ul>
    </div>
  </div>
</nav>
