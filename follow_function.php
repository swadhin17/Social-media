<?php

    include "db_connect.php";

    function follow()
    {
        
            $following_query = "UPDATE blog_login SET ";
            $following_query .= "following = '$search'";
            $following_query .= "WHERE name = '$name'";
              
              $following_result = mysqli_query($connection,$following_query);

                if(!$following_result)
                {
                    die('Query Failed'.mysqli_error($connection)); 
                }
              
                $followers_query = "UPDATE blog_login SET ";
                $followers_query .= "followers = '$name'";
                $followers_query .= "WHERE name = '$search'";
              
              $followers_result = mysqli_query($connection,$followers_query);

                if(!$followers_result)
                {
                    die('Query Failed'.mysqli_error($connection)); 
                }
        
    }


?>