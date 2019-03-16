<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
    <link rel="stylesheet" href="following.css"> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  session_start();
    
//    $active_name = $_SESSION['name'];
//    $active_name = 'savan';
    $active_name = $_SESSION['new_name'];


  ?>
  <body>
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
       <li><a href="user_page1.php" id=l2 > Home Page </a></li>
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
      <ul class="nav navbar-nav navbar-right">
       <li><a href="main_followers.php" id=l5 > Followers<span class="badge " id=badge >0</span> </a></li>
        <li class="dropdown" id=d2 >
          <a href="#" class="dropdown-toggle" id=dl2 data-toggle="dropdown"> Hi <?php echo $active_name; ?> <span class="caret"></span></a>    
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
    
<div class="container">
     <h2 id="heading-id">Following</h2>
     
       <?php
    
    include "db_connect.php";
    // session_start();
    
    $active_name = $_SESSION['new_name'];
//    $active_name = 'savan';
    
        $query = "SELECT * FROM blog_login WHERE name LIKE '%$active_name%'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error());
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $following = $row['following'];
        }
        
        $substr_following = substr($following,3);    
        $explode_following = explode(" , ",$substr_following);
        $total_following = count($explode_following);
    
//        echo $followers."<br>";
//        print_r($explode_followers);
        $i = $total_following-1;
    
        while($i >= 0)
        {
         
//            $photo_query = "SELECT * FROM blog_posts WHERE uploader_name LIKE '%$explode_followers[$i]%'";
//
//            $photo_result = mysqli_query($connection,$photo_query);
//
//            if(!$photo_result)
//            {
//                die('Query Failed'.mysqli_error($connection));
//            }
//            while($row = mysqli_fetch_assoc($photo_result))
//            {
//                $photo = $row['photo_name'];
//            }
//            
//            echo $photo;
     ?>   
     
  <div class="media">
    <div class="media-left">
      <img src="images/Jellyfish.jpg" class="media-object" id="image-id">
    </div>
    <div class="media-body">
      <h4 class="media-heading" id="name-id"> <?php echo ucfirst($explode_following[$i]); ?> </h4>
    </div>
    <div class="media-body">
      <button type="button" class="btn btn-warning" id="button-id">Unfollow</button>
    </div>
  </div>
  <hr>
  
  <?php      
    
    $i = $i - 1;        
         
    }
    
  ?>  

</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>