<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
<!--    <link rel="stylesheet" href="user_page.css">   -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet"> 
    
    <script src="like_toggle.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="user_page1.css">   
    
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
      
      session_start();
      
      include "notification_count_main.php";
      include "follow_count_main.php";
      include "post_count_main.php";
      
      include "follow_count.php";
      
      
        
        $name = $_SESSION['new_name']; 
    ?> 
    
     <?php 

//  print_r($_POST);
              
    
      
    if($_POST)
    {
        foreach($_POST as $id_name => $content) 
        {
//           echo "The HTML name: $id_name <br>";
        }
        
        $content = $_POST['content'];
//        echo $content;
        
        include "db_connect.php";
        
        $query = "UPDATE blog_posts SET ";
        $query .= "blog_content = '$content'";
        $query .= "WHERE id = '$id_name'";
        
        $result = mysqli_query($connection , $query);
            
        if(!$result)
        {
            die ("QUERY FAILED");
        }
    }

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
       <li><a href="" id=l3 > Admin </a></li>
        <li class="dropdown" id=d2 >
          <a href="" class="dropdown-toggle" id=dl2 data-toggle="dropdown"> Hi <?php echo $name; ?> <span class="caret"></span></a>    
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

 
  <div class="col-md-6">
   
   <div class="page-header">
       
       <h3 id=posts > Posts </h3>
       
   </div>
<!--  THUMBNAIL STARTS -->   
  
  
  
   <?php
      
        $query = "SELECT * FROM blog_posts WHERE uploader_name LIKE '%$name%'  ORDER BY id DESC  ";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $name = $row['uploader_name'];
            $content = $row['blog_content'];
            $photo_name = $row['photo_name'];
            $time = $row['post_time'];
            
            $id = $row['id'];
            
        ?>    
        <div class="thumbnail">
              <img src="images/<?php echo $photo_name; ?>" alt="...">
            <div class="caption">
                    <h3 id=thheading > - <?php echo $name; ?> <small> <?php echo "Uploaded On ".$time; ?> </small> </h3>
                        <p class="thpara" ><?php echo $content; ?></p>    
                <div class="row" style="margin-top: 20px;" >
                <form action="delete.php" method="post"> 
                     <div class="col-md-6"> <button type="submit" name="<?php echo $id; ?>" class="btn btn-danger col-md-12" > Delete Post </button> </div>      
                </form>
                <div class="col-md-6"> 
                    <button data-toggle=modal data-target="<?php echo "#".$id; ?>" class="btn btn-primary col-md-12 " > Update Post </button> 
                </div>      
<!--                    </form>-->
                </div>
        
            </div>
            
        </div>    
        
<!--      MODAL STARTS  -->
     
      
      <div class="modal" id="<?php echo $id; ?>" >
          <div class="modal-dialog modal-md">

            <div class="modal-content">
            <form action="my_posts.php" method="post"> 
              <div class="modal-header">

                <div class="close" data-dismiss="modal">  &times; </div>
                <h3> <?php echo $name; ?> </h3>

              </div>

                        
                 
              <div class="modal-body">
                
                <input type="file" name="profile" enctype="multipart/form-data" >
                <br>
                <input type="text" name="content" class="form-control" contenteditable="true" value="<?php echo $content; ?>" >

              </div>

              <div class="modal-footer">
                <div class="text-right">
                    
                        <button type="submit" class="btn btn-primary" name="<?php echo $id; ?>" > UPDATE </button>                      
                        <button class="btn btn-danger" data-dismiss="modal" class="close"> Close </button>
                    
                </div>
              </div>
            </form>

            </div>

          </div>
      </div>
       
<!--       MODAL ENDS-->
        
    <?php
            
        }
      
    ?>  
       
       

        
        
        
        
<!--  THUMBNAIL ENDS -->
    </div>

      
  
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>