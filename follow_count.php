<?php
    
        include "db_connect.php";

//        session_start();
        
        $name = $_SESSION['new_name'];

//        echo $name;

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
            
            if($following != "")
            {
                $substr_following = substr($following,3);    
//                $substr_followers = substr($followers,3);
                $explode_following = explode(" , ",$substr_following);
//                $explode_followers = explode(" , ",$substr_followers);
                $total_following = count($explode_following);
//                $total_followers = count($explode_followers);
                
                global $total_following;
            }
            else 
            {
//                $total_followers = 0;
                $total_following = 0;
                global $total_following;
            }
            if($followers != "")
            {
//                $substr_following = substr($following,3);    
                $substr_followers = substr($followers,3);
//                $explode_following = explode(" , ",$substr_following);
                $explode_followers = explode(" , ",$substr_followers);
//                $total_following = count($explode_following);
                $total_followers = count($explode_followers);
                global $total_followers;
            }
            else
            {
                $total_followers = 0;
                global $total_followers;
//                $total_following = 0;
            }
            
            
            
            
        }

?>