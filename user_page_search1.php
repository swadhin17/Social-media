<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
    <link rel="stylesheet" href="user_page1.css">   
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet"> 
    
    <script src="like_toggle.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   <?php
   
      
      
    include "db_connect.php";
      
//      include "comment.php";
      
      session_start();
        
        $name = $_SESSION['new_name'];
      
//      if(isset($_POST['post_submit']))
//      {
//          $post_content = $_POST['post_content'];
//      
//              if(isset($_FILES['FILES']))
//              {
//                  $file_name = $_FILES['FILES']['name'];
//                  $file_tmp =$_FILES['FILES']['tmp_name'];
//                  $file_size =$_FILES['FILES']['size'];
//
//                  move_uploaded_file($file_tmp,"images/".$file_name);
//
//
//              }
//          
//            
////          echo $post_content;
//      
//                $insert_query = "INSERT INTO blog_posts(uploader_name,blog_content,photo_name)";
//                $insert_query .= "VALUES ('$name' , '$post_content' , '$file_name')";
//
//                $insert_result = mysqli_query($connection,$insert_query);
//
//                if(!$insert_result)
//                {
//                    die('Query Failed'.mysqli_error()); 
//                }
//      }
      
      
      ?>
      
    <nav class="navbar navbar-default navbar-fixed-top" id=navbar >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id=nh >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<!--        <span class="sr-only">Toggle navigation</span>-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" id=nb > Speaking Minds </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav">
      <li><a href="blog/index.php" id=l2 > Main Page </a></li>
       
<!--
        <li class="dropdown" id=d1 >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id=dl1> Dropdown <span class="caret"></span></a>
          <li><a href=#> Menu </a></li>
          <ul class="dropdown-menu" id=dm1 >
            <li><a href="#" id=dml1 >Action</a></li>
            <li><a href="#" id=dml2 >Another action</a></li>
            <li><a href="#" id=dml3 >Something else here</a></li>
          </ul>
        </li>
-->
      </ul>
      <form action="user_page_search.php" method="post" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name=search_name class="form-control " id=t1 placeholder="Search...">
        </div>
        <button type="submit" name=search class="btn btn-default" id=btn1 >Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php" id=l2 > Log In / Sign UP </a></li>
       <li><a href="#" id=l3 > Admin </a></li>
        <li class="dropdown" id=d2 >
          <ul class="dropdown-menu" id=dm2 >
            <li><a href="#" id=dm2l1 > My Blogs </a></li>
            <li><a href="#" id=dm2l2 > Profile </a></li>
            <li><a href="#" id=dm2l3 > Logout </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>    
   
   
<div class="row">
     
    <div class="col-md-3">
        
        <div class="row" id=row2 >
                
            
        </div>
        
    </div>     
 
  <div class="col-md-4">
   
   <div class="page-header">
       
       <h3 id=posts > Posts </h3>
       
   </div>
<!--  THUMBNAIL STARTS -->   
 
    <?php
  
      if(isset($_POST['search']))
      {
          $search = $_POST['search_name'];
          
//          echo $search;
          
          $_SESSION['search_name'] = $search;
          
//          $GLOBALS['search'];
          
          global $search;
          
//          echo $search;
          
          $query = "SELECT * FROM blog_posts WHERE uploader_name LIKE '%$search%'";
          $search_query = mysqli_query($connection , $query);
          
          if(!$search_query)
          {
              die("Query Failed".mysqli_error($connection));
          }
          
          $count = mysqli_num_rows($search_query);
          
          if($count == 0)
          {
              echo "No Result Found";
          }
          
          else
          {
              while($row = mysqli_fetch_assoc($search_query))
              {
                      $uploader_name = $row['uploader_name'];
                      $blog_content = $row['blog_content'];
                      $photo_name = $row['photo_name'];
                      $post_time = $row['post_time'];
                      $id = $row['id'];
           ?>                 
                    <div class="thumbnail">
              <img src="images/<?php echo $photo_name; ?>" alt="...">
              <div class="caption">
                <h3 id=thheading > - <?php echo $uploader_name; ?> <small> <?php echo "Uploaded On ".$post_time; ?> </small> </h3>
                    <p class="thpara" > <?php echo $blog_content; ?> </p>


              </div>
          </div>    
          
        <?php             
                      
              }
              
          }
      }
    ?>
    
      
<!--  THUMBNAIL ENDS -->
    </div>

  
  <div class="col-md-5" id=col-md-5 >
      
      
      <div class="row" id=row2 >
         
         <div class="page-header">
             
             <h3> Trending Posts </h3>
             
         </div>
          
          <div class="thumbnail">
              <img src="images/emp1.jpg" alt="...">
              <div class="caption">
                <h3 id=thheading > - Savan Jasani <small> posted before 3 days </small> </h3>
                <p class="thpara" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, aliquid, ullam! Optio aspernatur repellendus quidem beatae consequuntur voluptatibus quibusdam quo libero, necessitatibus eaque modi esse possimus rerum ab facilis accusantium?</p>


              </div>
          </div>
          
      </div>
      
  </div>     
  
</div>
    
    <?php
      
//      echo $search;
      
//      include "comment.php";
      
      ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>