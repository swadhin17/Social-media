<?php


        include "db_connect.php";
        
        if($_POST)
        {
            foreach($_POST as $id_name => $content) 
            {
               echo "The HTML name: $id_name <br>";
            }

            $query = "DELETE FROM blog_posts ";
            $query .= "WHERE id = '$id_name'";

            $result = mysqli_query($connection , $query);

            if(!$result)
            {
                die ("QUERY FAILED");
            }
            
            header('Location: admin.php'); 
            
        }
    


?>