<?php
    
        include "db_connect.php";

//        include "db_connect.php";
        
//        session_start();
        
        $name = $_SESSION['new_name'];

        $seen_query = "SELECT * FROM blog_login WHERE name LIKE '%$name%'";     
        
        $seen_result = mysqli_query($connection,$seen_query);

        if(!$seen_result)
        {
            die('Query Failed'.mysqli_error());
        }

        while($row = mysqli_fetch_assoc($seen_result))
        {
//            $num = 0;
//            $followers = $row['followers'];
//            $substr = substr($followers,3);
//            
//            $explode = explode(" , ",$substr);
            
            $total = $row['total'];
            $post_total = $row['post_total'];
            $follow_total = $row['followers_total'];
            $unseen = $row['unseen'];
            $seen = $row['seen'];
            $post_seen = $row['post_seen'];
            $follow_seen = $row['followers_seen'];
            $follow_unseen = $row['followers_unseen'];
            $post_unseen = $row['post_unseen'];
            
            
        }
        


        global $post_unseen, $follow_unseen;

        


        $updated_seen = $total;
        $updated_follow_seen = $follow_total;
        $updated_post_seen = $post_total;

//        echo "total".$total."<br>";
//echo "seen".$updated_seen."<br>";
//echo "unseen".$unseen."<br>";
//echo "post_total".$post_total."<br>";
//echo "post_seen".$updated_post_seen."<br>";
//echo "post_unseen".$post_unseen."<br>";
//echo "follow_total".$follow_total."<br>";
//echo "follow_seen".$updated_follow_seen."<br>";
//echo "follow_unseen".$follow_unseen."<br>";

        $query = "UPDATE blog_login SET ";
        $query .= "unseen = '0' , ";
        $query .= "seen = '$updated_seen' , ";
        $query .= "post_unseen = '0' , ";
        $query .= "post_seen = '$updated_post_seen' , ";
        $query .= "followers_unseen = '0' , ";
        $query .= "followers_seen = '$updated_follow_seen'";
        $query .= "WHERE name = '$name'";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection)); 
        }


        

        

?>