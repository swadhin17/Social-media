<?php
   
    include "db_connect.php";
      
      $name = "swadhin";
      
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
            $substr = substr($followers,3);
            
            $explode = explode(" , ",$substr);
            
            $total = count($explode);
            
        }
        
        while($seen_row = mysqli_fetch_assoc($seen_result))
        {
            $seen = $seen_row['seen'];
//            $unseen = $row['unseen'];
        }

        $unseen = $total - $seen;
        
//        echo "total ".$total;
//        echo "seen ".$seen;
//        echo "unseen ".$unseen;
        
    
        global $unseen;
        
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