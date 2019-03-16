<?php

//          session_start();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include "db_connect.php";

    include "post_count_main.php";
    include "follow_count_main.php";
      

        
        $name = $_SESSION['new_name'];
      
//      $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";
//
//      $seen_query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";     
//        
//        $result = mysqli_query($connection,$query);
//        $seen_result = mysqli_query($connection,$seen_query);
//        
//        if(!$result)
//        {
//            die('Query Failed'.mysqli_error());
//        }
//        if(!$seen_result)
//        {
//            die('Query Failed'.mysqli_error());
//        }
//
//        while($row = mysqli_fetch_assoc($result))
//        {
//            $num = 0;
//            $followers = $row['followers'];
//            $substr = substr($followers,3);
//            
//            $explode = explode(" , ",$substr);
//            
//            $total = count($explode);
//            
//        }
//        
//        while($seen_row = mysqli_fetch_assoc($seen_result))
//        {
//            $seen = $seen_row['seen'];
////            $unseen = $row['unseen'];
//        }

        $total = $post_total + $followers_total;
        $seen = $post_seen + $followers_seen;
        $unseen = $followers_unseen + $post_unseen;

        global $total,$seen , $unseen;

//        $unseen = $total - $seen;
        
//        echo "total ".$total;
//        echo "seen ".$seen;
//        echo "unseen ".$unseen;
        
//    
//        global $unseen;
        
        $query = "UPDATE blog_login SET ";
        $query .= "total = '$total' , ";
        $query .= "unseen = '$unseen'";
        $query .= "WHERE name = '$name'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error()); 
        }

        ?>