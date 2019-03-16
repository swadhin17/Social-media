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
            
            $followers = $row['followers'];
            $following = $row['following'];
            
            $substr_followers = substr($followers,3);
            $substr_following = substr($following,3);
            
            $explode_followers = explode(" , ",$substr_followers);
            $explode_following = explode(" , ",$substr_following);
            
            $total_followers = count($explode_followers);
            $total_following = count($explode_following);
            
        }

?>