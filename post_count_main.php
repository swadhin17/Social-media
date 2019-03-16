<?php
   
    include "db_connect.php";
      
//      session_start();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

        
        $name = $_SESSION['new_name'];

//        echo $name;
      
      $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";

      $seen_query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";     
        
        $result = mysqli_query($connection,$query);
        $seen_result = mysqli_query($connection,$seen_query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection));
        }
        if(!$seen_result)
        {
            die('Query Failed'.mysqli_error());
        }
//echo $name;

        while($row = mysqli_fetch_assoc($result))
        {
            $num = 0;
            $followers = $row['recent_post'];
            
//            echo "posttotal".$followers;
            
            if($followers != "")
            {
                $substr = substr($followers,3);
            
                $explode = explode(" , ",$substr);    
                $post_total = count($explode);
                
//                echo "posttotal".$post_total;
            }
            else
            {
                $post_total = 0;
//              echo "posttotal".$post_total;
            }
            
            
            
            
        }
        
        while($seen_row = mysqli_fetch_assoc($seen_result))
        {
            $post_seen = $seen_row['post_seen'];
//            $unseen = $row['unseen'];
            
            if($post_seen == "")
            {
                $post_seen = 0;
            }
                
            
        } 

        $post_unseen = $post_total - $post_seen;
        
//        echo "total ".$total;
//        echo "seen ".$seen;
//        echo "unseen ".$unseen;
        
    
        global $post_unseen , $post_total , $post_seen;
        
        $query = "UPDATE blog_login SET ";
        $query .= "post_total = '$post_total' , ";
        $query .= "post_unseen = '$post_unseen'";
        $query .= "WHERE name = '$name'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error()); 
        }

        ?>