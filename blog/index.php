<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">

    <link rel="stylesheet" href="index.css">
    
    <title>blog!</title>
  </head>
  <body>
   
   <div class="container">
       <div class="row">
           <div class="col-xl-5 offset-md-4 offset-1 col-11 " >
               <h2 class="" id="title_id"><span id="cap">S</span>peaking <span id="cap">M</span>inds</h2>
           </div>
           
       </div>
   
      
      </div>
       
      <div class="container-fluid">
   <hr>
   <nav class="navbar navbar-expand-lg sticky-top navbar-light " id="nav_id">
   
  <a class="navbar-brand" href="#" id="nav-text"  style="padding-top: 0px;">Speaking Minds</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../login.php" id="nav-text">User Signup / Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../admin.php" id="nav-text">Admin</a>
      </li>
<!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
        <span id="nav-text" >Categories</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="drop-id">
            <a class="dropdown-item" href="#" id="drop_devider">Health</a>    
          <a class="dropdown-item" href="#" id="drop_devider">Motivation</a>
          <a class="dropdown-item" href="#" id="drop_devider">Technology</a>
        </div>
      </li>
-->
    </ul>
    <form action="viewer_search.php" method=post class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search_name" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search"  type="submit" id="submit_id">Search</button>
    </form>
  </div>
</nav>  
</div>

   <div class="container-fluid">
    
   <div class="row"  >   
   
       <div class="col-xl-3">
           
           
        <div id="title-id">
           <h3> Categories </h3>
           <hr>
       </div>
                
            <form action="viewer_search_category.php" method=post >
                
                <div class="row" style="" >
                    
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Education class="btn btn-warning col-md-12 col-sm-12 col-xs-12 " > Education </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Technology class="btn btn-primary col-md-12 col-sm-12 col-xs-12" > Technology </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Bussiness class="btn btn-success col-md-12 col-sm-12 col-xs-12" > Business </button> </div>
                    <div class="col-md-8" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Science class="btn btn-primary col-md-12 col-sm-12 col-xs-12" > 
                    Science </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Sports class="btn btn-warning col-md-12 col-sm-12 col-xs-12" > Sports </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Health class="btn btn-warning col-md-12 col-sm-12 col-xs-12" > Health </button> </div>
                    <div class="col-md-8" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Marketing class="btn btn-success col-md-12 col-sm-12 col-xs-12" > Marketing </button> </div>
                    
                </div>
    
                
            </form>
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
       </div>
           <div class="col-xl-5"  >    
           
        <div id="title-id">
           <h3> Posts </h3>
           <hr>
       </div>
           
       <?php
       
        include "../db_connect.php";
        
      
        $query = "SELECT * FROM blog_posts ORDER BY id DESC ";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection));
        }
                
      
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $fetch_name = $row['uploader_name'];
            $content = $row['blog_content'];
            $photo_name = $row['photo_name'];
            $time = $row['post_time'];
            $id = $row['id'];
            $like_counter = $row['like_counter'];
            $comment = $row['comment'];
            $commenters = $row['commenters'];
            $post_category = $row['category'];
            
            
            
            
        ?>    
   
   
   
<!--    <div class="col-xl-5 offset-md-3 " >     -->
       
        <div class="card" id="card_id">
          <img class="card-img-top"   src="../images/<?php echo $photo_name; ?>"  style="height:100%;width:100%:" width=100px height="100%" alt="Image posted by <?php echo $fetch_name; ?>" >
          <div class="card-body">   
           <h5 style="text-align:right;" > <?php echo ucfirst($fetch_name); ?> <small style="font-size:9px;" > <?php echo "Posted On ".$time; ?> </small> </h5>
            <p class="card-text"> <?php echo $content; ?> </p>
          </div>
        
        
        <div class="row" style="margin-top: 4px;" >
        
        <?php
      
                    $fetch_query = "SELECT * FROM blog_posts WHERE id LIKE '%$id%'";

                    $fetch_result = mysqli_query($connection,$fetch_query);

                    if(!$fetch_result)
                    {
                        die('Query Failed'.mysqli_error($connection));
                    }
                    while($row   = mysqli_fetch_assoc($fetch_result))
                    {
                        $comment = $row['comment'];
                        $commenters = $row['commenters'];

//                        echo "<br>".$comment.$commenters."<br>";

            //            $comment = 
                        $comment_substr = substr($comment,3);
                        $commenters_substr = substr($commenters,3);

//                        echo "<br>".$comment_substr.$commenters_substr."<br>";

                        $comment_explode = explode(" $ ",$comment_substr);
                        $commenters_explode = explode(" $ ",$commenters_substr);

                        $comment_total = count($comment_explode);
                        $commenters_total = count($commenters_explode);

                        while($comment_total != 0)
                        {    

                        $commenters_display = $commenters_explode[$comment_total-1];
                        $comment_display = $comment_explode[$comment_total-1];                


                    ?>
        
        

            <div class="col-md-5"> <?php echo $commenters_display; ?> </div>
            <div class="col-md-7"> <?php echo $comment_display; ?></div>

        
        
        <?php 
                        $comment_total = $comment_total - 1; } }
            
        ?>
        
    </div> </div>
            
    <?php
            
        }   
      
    ?>  
          
        
    </div>    
   
<div class=" col-xl-4 ">
       <div id="title-id">
           <h3>Trending posts</h3>
           <hr>
       </div>
       
       <?php
              
                $trending_query = "SELECT * FROM blog_posts ORDER BY like_counter DESC";
        
                $trending_result = mysqli_query($connection,$trending_query);

                if(!$trending_result)
                {
                    die('Query Failed'.mysqli_error($connection));
                }
            
                $post_count = 2;
            
            
                while($row = mysqli_fetch_assoc($trending_result))
                {
                    $uploader_name = $row['uploader_name'];
                    $blog_content = $row['blog_content'];
                    $post_time = $row['post_time'];
                    $photo_name = $row['photo_name'];
                  
                    if($post_count > 0)
                    {    
                    
                    
              ?>
       
       <div class="card" id="card_id">
      <img class="card-img-top" src="../images/<?php echo $photo_name; ?>" alt="Card image cap">
      <div class="card-body">
       <h5 style="text-align:right;" > <?php echo ucfirst($fetch_name); ?> <small style="font-size:9px;" > <?php echo "Posted On ".$time; ?> </small> </h5>
        <p class="card-text"> <?php echo $blog_content; ?> </p>


      </div>
    </div>
    
    <?php } $post_count = $post_count - 1; } ?>  

</div>                                                                                      
    </div>    
       
     
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>