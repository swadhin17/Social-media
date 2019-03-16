<?php

        include "db_connect.php";
        
        session_start();

        $name = $_SESSION['new_name'];

          if(isset($_POST['follow']))
          {
              $search = $_SESSION['search_name'];
              
//            -$following_query = "UPDATE blog_login SET following(ifnull(following,''),'$search') ";
//              update tablename set col1name = concat(ifnull(col1name,""), 'a,b,c');
//              
//            $following_query = "UPDATE blog_login SET following = '' where following is null; ";
              
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
              
              $second_query = "SELECT * FROM blog_login WHERE name LIKE '%$search%'";
        
                $second_result = mysqli_query($connection,$second_query);

                if(!$result)
                {
                    die('Query Failed'.mysqli_error());
                }
                while($row = mysqli_fetch_assoc($second_result))
                {
                    $followers = $row['followers'];
                }
              
            
                $main_following = $following." , ".$search;
//                $main_followers = $search;
              
//              $search = swadhin ka data fecth karo + ajay
                $search_followers = $followers." , ".$name;
              
              
//              echo $main_following." ".$main_followers;
              
            $following_query = "UPDATE blog_login SET ";
            $following_query .= "following = '$main_following'";
            $following_query .= "WHERE name = '$name'";   
            
              
              
            
              
              $following_result = mysqli_query($connection,$following_query);

                if(!$following_result)  
                {
                    die('Query Failed'.mysqli_error($connection)); 
                }
              
                $followers_query = "UPDATE blog_login SET ";
                $followers_query .= "followers = '$search_followers'";
                $followers_query .= "WHERE name = '$search'";
              
              $followers_result = mysqli_query($connection,$followers_query);

                if(!$followers_result)
                {
                    die('Query Failed'.mysqli_error($connection)); 
                }
                           
            
              header('Location: user_page1.php');
          }

    
      
        ?>