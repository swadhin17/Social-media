<?php
   
    include "db_connect.php";
      
//      session_start();
        
        $name = $_SESSION['new_name'];
      
      $query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";

      $seen_query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";     
        
        $result = mysqli_query($connection,$query);
        $seen_result = mysqli_query($connection,$seen_query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error());
        }
        if(!$seen_result)
        {
            die('Query Failed'.mysqli_error()); 
        }

        while($row = mysqli_fetch_assoc($result))
        {
            $num = 0;
            $followers = $row['followers'];
            
//            echo "only followers".$followers;
            
            if($followers != "")
            {
                $substr = substr($followers,3);

                $explode = explode(" , ",$substr);

                $followers_total = count($explode);
            }
            else
            {
                $followers_total = 0;           
            }
            
            
        }
        
        while($seen_row = mysqli_fetch_assoc($seen_result))
        {
            $followers_seen = $seen_row['followers_seen'];
//            $unseen = $row['unseen'];
        } 

//        echo $followers_seen."<br>";

        $followers_unseen = $followers_total - $followers_seen;

//        echo "folowers total".$followers_total;
//echo "folowers seen".$followers_seen;
//echo "folowers unseen".$followers_unseen;
        
//        echo "total ".$total;
//        echo "seen ".$seen;
//        echo "unseen ".$unseen;
        
    
        global $followers_unseen , $followers_total , $followers_seen;
        
        $query = "UPDATE blog_login SET ";
        $query .= "followers_total = '$followers_total' , ";
        $query .= "followers_unseen = '$followers_unseen'";
        $query .= "WHERE name = '$name'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error()); 
        }

        ?>