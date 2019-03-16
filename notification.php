<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">   
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet"> 
    
    <script src="close.js" ></script>
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
      
      $name = "swadhin";
      
      
      
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
      <form action="user_page_search.php" method="post" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name=search_name class="form-control " id=t1 placeholder="Search...">
        </div>
        <button type="submit" name=search class="btn btn-default" id=btn1 >Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="#" id=l3 > Admin </a></li>
       <li><a href="#" id=l4 > Notification <span class="badge" id=badge >0</span> </a></li>
       <li><a href="#" id=l4 > Following<span class="badge" id=badge >0</span> </a></li>
       <li><a href="#" id=l5 > Followers<span class="badge " id=badge >0</span> </a></li>
        <li class="dropdown" id=d2 >
          <a href="notification.php" class="dropdown-toggle" id=dl2 data-toggle="dropdown"> Hi <?php echo $name; ?><span class="caret"></span></a>    
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
    
       <?php
   
    include "db_connect.php";
        
    include "notification_count_sub.php";    
      
      $name = "swadhin";
      
      $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error());
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $num = 0;
            $followers = $row['followers'];
            $substr = substr($followers,3);
            
            $explode = explode(" , ",$substr);
            
            $count = count($explode);
            
            
            
            while($count != 0)
            {
                $first = ucfirst($explode[$num]);
            
//            echo $substr;
//            print_r($explode[$num]);
            
            
         ?>
                               
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?php print_r($first);; ?></strong> Started Following You.
            </div>        
    <?php   
        
        $count = $count - 1;        
        $num = $num + 1;    
            }
        }
        
        ?>
        
     
        
   
   </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>