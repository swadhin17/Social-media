<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet"> 
<!--    <link rel="stylesheet" href="user_page2.css">   -->
    <script src="like_toggle.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" href="user_page2.css">   
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
   <?php
      
      session_start();
   
      $name = $_SESSION['new_name'];
      
//      echo "name".$_SESSION['new_name'];
      
      global $name;
      
      include "db_connect.php";
      
//      include "like.php";
      include "comment.php";
      
      include "notification_count_main.php";
//      include "follow_count_main.php";
//      include "post_count_main.php";
      
      include "follow_count.php";
      
//      include "my_posts.php";
      
//      echo $total_following,$total_followers;
//      echo $name;
//      echo "dsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfs";
      if(isset($_POST['post_submit']))
      {
          echo "dsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfsdfsfsdfs";
          
          $post_content = $_POST['post_content'];
          $post_category = $_POST['category'];
      
              if(isset($_FILES['FILES']))
              {
                  $file_name = $_FILES['FILES']['name'];
                  $file_tmp =$_FILES['FILES']['tmp_name'];
                  $file_size =$_FILES['FILES']['size'];

                  move_uploaded_file($file_tmp,"images/".$file_name);


              }
          
            echo $post_content;
      
                $insert_query = "INSERT INTO blog_posts(uploader_name,blog_content,photo_name,category)";
                $insert_query .= "VALUES ('$name' , '$post_content' , '$file_name','$post_category')";

                $insert_result = mysqli_query($connection,$insert_query);

                if(!$insert_result)
                {
                    die('Query Failed'.mysqli_error()); 
                }
          
                $fetch_query = "SELECT * FROM blog_login WHERE name like '%$name%'";
        
                $fetch_result = mysqli_query($connection,$fetch_query);

                if(!$fetch_result)
                {
                    die('Query Failed'.mysqli_error());
                }
                while($row = mysqli_fetch_assoc($fetch_result))
                {
                    $followers = $row['followers'];
                    
        
                    
                    echo $followers;
                    
                    $substr = substr($followers,3);
//                    echo $substr."substr";
                    
                    if($substr != "")
                    {
                        $explode = explode(" , ",$substr);

                        $count = count($explode);
                        $num = $count;
//                        echo $num;
                        
                        echo "asdasdsadasd";
                        
                        while($num > 0 )
                        {   
//                            echo "new".$num."new";
//                            $main_explode = $explode['$count'];
                            $first = ucfirst($explode[$num-1]);
                            
                            echo "asdasd";
                            
                            $second_query = "SELECT * FROM blog_login WHERE name LIKE '%$first%'";
        
                            $second_result = mysqli_query($connection,$second_query);

                            if(!$second_result)
                            {
                                die('Query Failed'.mysqli_error());
                            }
                            while($row = mysqli_fetch_assoc($second_result))
                            {
                                $recent_post = $row['recent_post'];
                            }
                            
                            $main_recent_post = $recent_post." , ".$name;
                            
//                            echo $main_recent_post;
                            
//                            echo $first;
                            $query = "UPDATE blog_login SET ";
                            $query .= "recent_post = '$main_recent_post'";
                            $query .= "WHERE uploader_name = '$first'";       
                            
                            $result = mysqli_query($connection,$query);
//                            $count  = $count - 1;
                            $num = $num - 1;
                         }
                        
                        }
                    
//                    echo $count;
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
<!--       <li><a href="#" id=l2 > New Post </a></li>-->
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
<!--       <li><a href="" id=l3 > Admin </a></li>-->
       <li><a href="notification1.php" id=l4 > Notification <span class="badge" id=badge > <?php echo $unseen; ?> </span> </a></li>
       <li><a href="main_followers.php" id=l4 > Followers <span class="badge" id=badge id=badge> <?php echo $total_followers; ?> </span> </a></li>
       <li><a href="main_following.php" id=l5 > Following <span class="badge " id=badge id=badge> <?php echo $total_following; ?> </span> </a></li>
        <li class="dropdown" id=d2 >
          <a href="" class="dropdown-toggle" id=dl2 data-toggle="dropdown"> Hi <?php echo $name; ?> <span class="caret"></span></a>    
          <ul class="dropdown-menu" id=dm2 >
            <li><a href="my_posts.php" id=dm2l1 > My Blogs </a></li>
            <li><a href="#" id=dm2l2 > Profile </a></li>
            <li><a href="logout.php" id=dm2l3 > Logout </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>    
   
   
<div class="row">
     
    <div class="col-md-3">
       
       
        
        <div class="row" id=row2 style="margin-top:00px;" >
               
               <div class="page-header">
           
                <h3> Categories </h3>
           
               </div>
                
            <form action="category_page_search.php" method=post >
                
                <div class="row" style="" >
                    
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Education class="btn btn-warning col-md-12 col-sm-12 col-xs-12 " > Education </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Technology class="btn btn-primary col-md-12 col-sm-12 col-xs-12" > Technology </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Business class="btn btn-success col-md-12 col-sm-12 col-xs-12" > Business </button> </div>
                    <div class="col-md-8" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Science class="btn btn-primary col-md-12 col-sm-12 col-xs-12" > 
                    Science </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Sports class="btn btn-warning col-md-12 col-sm-12 col-xs-12" > Sports </button> </div>
                    <div class="col-md-4" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Health class="btn btn-warning col-md-12 col-sm-12 col-xs-12" > Health </button> </div>
                    <div class="col-md-8" style="margin:0px;padding:2px 2px;" > <button type="submit" name=Marketing class="btn btn-success col-md-12 col-sm-12 col-xs-12" > Marketing </button> </div>
                    
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
        <div class="thumbnail">
              <img src="images/<?php echo $photo_name; ?>" alt="...">
            <div class="caption">
                    <h3 id=thheading > - <?php echo $fetch_name; ?> <small> <?php echo "Uploaded On ".$time; ?> </small> </h3>
                        <p class="thpara" ><?php echo $content; ?></p>    
                <div class="row" style="margin-top: 20px;" >
                    <div class="col-md-5 col-xs-5 ">
                       <form action="like.php" method=post enctype="multipart/form-data">
                        <div class="col-md-6 col-xs-6" style="text-align:right;" ><button type="submit"     name="<?php echo $id; ?>" class=" btn btn-default fa fa-thumbs-up" id=fa></button></div>
                        </form>
                        <div class="col-md-6 col-xs-6 " style="letter-spacing: 2px;font-family: 'Niramit', sans-serif;;margin-left: -20px;margin-right: 4px;cursor: pointer;color: orangered;" ><span class=badge id=badge1 ><?php echo $like_counter; ?></span> </div>
                    </div>
                    <div class="col-md-3 col-xs-3 " style="font-family: 'Niramit', sans-serif;text-align: center;letter-spacing: 2px;color:orangered;" > Share </div>
                    <div class="col-md-4 col-xs-4 ">
                        <div class="col-md-6 col-xs-6 " style="margin-top: -5px;text-align: right;" ><img src="images/if_eye_preview_see_seen_view_392505.svg" alt=""></div>
                        <div class="col-md-6 col-xs-6 " style="font-family: 'Niramit', sans-serif;text-align: left;color:#f89764;margin-left: -15px;color: orangered" > 155 </div>
                    </div>

                </div>
                
                <div class="row" id=comment_row > 
                
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
 

<!--                            <div class="row">-->

                                <div class="col-md-5"> <?php echo $commenters_display; ?> </div>
                                <div class="col-md-7"> <?php echo $comment_display; ?></div>

<!--                            </div>    -->
<!--                            <br>-->

                   <?php 
                        $comment_total = $comment_total - 1; } } 
                    ?>                 
                </div>
        
                <div class="row" style="margin-top: 4px;" >

                    <div class="col-md-12">
                       <form action="comment.php" method=post>
                        <div class="col-md-7 col-sm-7 col-xs-7"><textarea id=textarea name="comments" id="" cols="" rows="" placeholder="Comments..."></textarea></div>    
                        <div class="col-md-4 col-sm-4 col-xs-4 "><button name="<?php echo $id." ".$name; ?>" class="btn btn-default" id="btn4" > Submit Comment </button></div>
                       </form>
                    </div>

                </div>
        
            </div>
        </div>  
             
    <?php
            
        }   
      
    ?>  
        
        
        
        
<!--  THUMBNAIL ENDS -->
    </div>

  
  <div class="col-md-5" id=col-md-5 >
      
      <div class="row" id=row1 >
         
         <div class="page-header" id=ph >
             
             <h3 id=posth > New Post </h3>
             
         </div>
      
          <div class="col-md-12" id=col-md-4-1 >
              
              <form action="user_page2.php" method=post enctype="multipart/form-data">
                <textarea class="form-control " name="post_content"  rows="3" placeholder="Enter Your Bio ..." ></textarea>       
                
                <div class="row">
                  
<!--                    <div class="col-md-12 col-sm-offset-1">-->
                           
                            <select name=category class="form-control col=md-8 " id=t2>
                              <option> Select The Category </option>
                              <option> Science </option>
                              <option> Technology </option>
                              <option> Education </option>
                              <option> Business </option>
                              <option> Sports </option>
                              <option> Health </option>
                              <option> Marketing </option>
                                
                            </select>
<!--                    </div>-->
                
                  
              </div>
              
              
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
      
      <div class="row" id=row2 >
         
         <div class="page-header">
             
             <h3> Trending Posts </h3>
             
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
          <div class="thumbnail">   
              <img src="images/<?php echo $photo_name; ?>" alt="...">
              <div class="caption">
                <h3 id=thheading > - <?php echo $uploader_name; ?> <small> <?php echo $post_time; ?> </small> </h3>
                <p class="thpara" > <?php echo $blog_content; ?> </p>


              </div>
          </div>    
            <?php } $post_count = $post_count - 1; } ?>  
              
          
<!--          <br>-->
      </div>
      
  </div>     
  
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>