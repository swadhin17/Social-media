<?php
    
        include "db_connect.php";
        
        $name = "swadhin";

        $seen_query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";     
        
        $seen_result = mysqli_query($connection,$seen_query);

        if(!$seen_result)
        {
            die('Query Failed'.mysqli_error());
        }

        while($row = mysqli_fetch_assoc($seen_result))
        {
            $num = 0;
            $followers = $row['followers'];
            $substr = substr($followers,3);
            
            $explode = explode(" , ",$substr);
            
            $total = count($explode);
            
            $unseen = $row['unseen'];
            $seen = $row['seen'];
            
            
        }

        $updated_seen = $total;

        $query = "UPDATE blog_login SET ";
        $query .= "unseen= '0' , ";
        $query .= "seen= '$updated_seen'";
        $query .= "WHERE name = '$name'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error()); 
        }


        

        

?>