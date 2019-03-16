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
      
//        echo $name;
      
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
       <li><a href="user_page1.php" id=l2 > Home </a></li>
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
        <li class="dropdown" id=d2 >
          <a href="#" class="dropdown-toggle" id=dl2 data-toggle="dropdown"> Hi <?php echo $name; ?> <span class="caret"></span></a>    
          <ul class="dropdown-menu" id=dm2 >
            <li><a href="#" id=dm2l1 > My Blogs </a></li>
            <li><a href="#" id=dm2l2 > Profile </a></li>
            <li><a href="logout.php" id=dm2l3 > Logout </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>    
   
   
<div class="row">
     
    <div class="col-md-3"  >
       
        
        <div class="row" id=row2 >
               
        <?php
            
                
//            
//            if($count == 1)
//            {   
//                $count = ['savan'];
                
                $search = $_POST['search_name'];
        
//                $_SESSION['search_name'] = $search;
                
//                $search = $_SESSION['search_name'];
            
//          echo "hhhhhhhhhhh".$_SESSION['search_name'];      
//                echo $search;
                
                  $fetch_query = "SELECT * FROM blog_login WHERE name LIKE '%$search%'";
                  $fetch_result = mysqli_query($connection , $fetch_query);
                    
                  while($row = mysqli_fetch_assoc($fetch_result))
                  {
                    
                      $uploader_name = $row['name'];
                      $email_name = $row['email'];
                      
                      
                      
                  }
            
            $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";
        
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
//            $i = $total_following-1;
            
                
    
                
                $photo_name = "";
                
                if($photo_name == "")
                {
                    $count = 1;
                }
                else
                {
                    $count = 0;
                }
            
            
            
//                    echo "Got Irix";
                
//                    echo "no";
                
            
            
        ?>    
                
            
            <form action="follow.php" method="post" class="navbar-form navbar-left">        
                <div class="thumbnail">
                  <img src="images/<?php if($count == 1 ) {echo "Desert.jpg";} else { echo "emp1.jpg"; } ?>" alt="...">
                  <div class="caption">
                    <h3> <?php echo ucfirst($uploader_name); ?> </h3>
                    <p> <?php echo $email_name; ?> </p>
                <?php     
                if (in_array($search, $explode_following)) 
                { 
                ?>    
                    <button type="submit" class="btn btn-success  " name=follow > + Un-Follow </button>         
                         
                <?php   } else { 
                    ?>
                        <button type="submit" class="btn btn-primary  " name=follow > + Follow </button>         
                
                <?php } ?>                   
                            
                  </div>
                </div>
            </form>        
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
          
//          $_SESSION['post'] = $_POST;
          
//          echo "hhhhhhhhhhh".$_SESSION['search_name'];
          
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

                <div class="row" style="margin-top: 20px;" >
                    <div class="col-md-5 col-xs-5 ">
                        <div class="col-md-6 col-xs-6 " style="text-align: right;" ><i onclick="myFunction(this)" class="fa fa-thumbs-up" id=fa></i></div>
                        <div class="col-md-6 col-xs-6 " style="text-align: left;letter-spacing: 2px;font-family: 'Niramit', sans-serif;;margin-left: -20px;margin-right: 4px;cursor: pointer;color: orangered;" > Like <span class=badge id=badge1 >1</span> </div>
                    </div>
                    <div class="col-md-3 col-xs-3 " style="font-family: 'Niramit', sans-serif;text-align: center;letter-spacing: 2px;color:orangered;" > Share </div>
                    <div class="col-md-4 col-xs-4 ">
                        <div class="col-md-6 col-xs-6 " style="margin-top: -5px;text-align: right;" ><img src="images/if_eye_preview_see_seen_view_392505.svg" alt=""></div>
                        <div class="col-md-6 col-xs-6 " style="font-family: 'Niramit', sans-serif;text-align: left;color:#f89764;margin-left: -15px;color: orangered" > 155 </div>
                    </div>

                </div>

                <div class="row" style="margin-top: 4px;" >

                    <div class="col-md-12">
                    <form action="comment.php" method="post" >
                        <div class="col-md-7 col-sm-7 col-xs-7"><textarea id=textarea name="comments" id="" cols="" rows="" placeholder="Comments..."></textarea></div>    
                        <div class="col-md-4 col-sm-4 col-xs-4 "><button name="<?php echo $id." ".$name; ?>" class="btn btn-default" id="btn4" > Submit Comment </button></div>
                    </form>
                    </div>

                </div>

              </div>
          </div>    
          
        <?php             
                      
              }
              
          }
      }
    ?>
    
      <?php
      
            include "follow.php";
      
////        echo $search;
//          if(isset($_POST['follow']))
//          {
//              $search = $_SESSION['search_name'];
//              
////            -$following_query = "UPDATE blog_login SET following(ifnull(following,''),'$search') ";
////              update tablename set col1name = concat(ifnull(col1name,""), 'a,b,c');
////              
////            $following_query = "UPDATE blog_login SET following = '' where following is null; ";
//              
//              $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";
//        
//                $result = mysqli_query($connection,$query);
//
//                if(!$result)
//                {
//                    die('Query Failed'.mysqli_error());
//                }
//                while($row = mysqli_fetch_assoc($result))
//                {
//                    $following = $row['following'];
//                }
//              
//              $second_query = "SELECT * FROM blog_login WHERE name LIKE '%$search%'";
//        
//                $second_result = mysqli_query($connection,$second_query);
//
//                if(!$result)
//                {
//                    die('Query Failed'.mysqli_error());
//                }
//                while($row = mysqli_fetch_assoc($second_result))
//                {
//                    $followers = $row['followers'];
//                }
//              
//            
//                $main_following = $following." , ".$search;
////                $main_followers = $search;
//              
////              $search = swadhin ka data fecth karo + ajay
//                $search_followers = $followers." , ".$name;
//              
//              
////              echo $main_following." ".$main_followers;
//              
//            $following_query = "UPDATE blog_login SET ";
//            $following_query .= "following = '$main_following'";
//            $following_query .= "WHERE name = '$name'";   
//            
//              
//              
//            
//              
//              $following_result = mysqli_query($connection,$following_query);
//
//                if(!$following_result)  
//                {
//                    die('Query Failed'.mysqli_error($connection)); 
//                }
//              
//                $followers_query = "UPDATE blog_login SET ";
//                $followers_query .= "followers = '$search_followers'";
//                $followers_query .= "WHERE name = '$search'";
//              
//              $followers_result = mysqli_query($connection,$followers_query);
//
//                if(!$followers_result)
//                {
//                    die('Query Failed'.mysqli_error($connection)); 
//                }
//                           
//              
//          }
      
        ?>
   
<!--  THUMBNAIL ENDS -->
    </div>

  
  <div class="col-md-5" id=col-md-5 >
      
      <div class="row" id=row1 >
         
         <div class="page-header" id=ph >
             
             <h3 id=posth > New Post </h3>
             
         </div>
          
          <div class="col-md-11" id=col-md-4-1 >
              
              <form action="user_page.php" method=post enctype="multipart/form-data">
                <textarea class="form-control" name="post_content"  rows="3" placeholder="Enter Your Bio ..." ></textarea>       
              
              
              <div class="row" style="margin-top: 10px;" >
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                  
                  <div class="form-group">
                      <div class="col-md-6 col-sm-5 col-xs-4"  ><label for="exampleInputEmail1" style="text-align: left;font-size: 14px;margin: 0px;padding: 0px;" > Upload Photo </label></div>
                        <div class="col-md-6 col-sm-12 col-xs-8" ><input type="file" name="FILES" id="exampleInputEmail1"></div>
                
                  
                  </div>
              </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 " style="margin-top: 10px;" >
                  <button type="submit" name="post_submit" class="btn btn-warning col-md-12 col-sm-8 col-xs-12 " > Post </button>
              </div>
              </form>
          </div>
          
      </div>
      
  </div>     
  
</div>
    
    <?php
      
//      echo $search;
      
      include "comment.php";
      
      ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>