<!DOCTYPE html>
<html lang="en">    
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
 
  <?php 

//  print_r($_POST); 
      
      include "db_connect.php";
      
//     session_start();
      
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        
        $name = $_SESSION['new_name'];
      
    if($_POST)
    {
        foreach($_POST as $id_name => $content) 
        {
//           echo "The HTML name: $id_name <br>";
        }
//        echo $id_name;
        
            $comments_user = $_POST['comments'];

    //        global $id_name;

    //        $id_comb_substr = substr($id_name,3);
            $id_comb_explode = explode("_",$id_name);

            echo ($id_comb_explode[0].$id_comb_explode[1]);

            $id_name = $id_comb_explode[1];
            $id_no = $id_comb_explode[0];

            if (is_numeric($id_no))
            {

                global $id_no;

                $query = "SELECT * FROM blog_posts WHERE id LIKE '%$id_no%'";

                $result = mysqli_query($connection,$query);

                if(!$result)
                {
                    die('Query Failed'.mysqli_error());
                }
                while($row = mysqli_fetch_assoc($result))
                {
                    $comment = $row['comment'];
                    $commenters = $row['commenters'];
                    $uploader_name = $row['uploader_name'];

        //            echo "only followers".$followers;

                    if($comment != "")
                    {
                        $comment_substr = substr($comment,0);
                        $commenters_substr = substr($commenters,0);
        //                $commenters_substr = substr($uploader_name,3);

                        echo "before comment".$comment_substr;

                        $comment_explode = explode(" $ ",$comment_substr);
                        $commenters_explode = explode(" $ ",$commenters_substr);

                        $comment_total = count($comment_explode);
                        $commenters_total = count($commenters_explode);

                        $comments = $comment_substr." $ ".$comments_user;
                        $commenters = $commenters_substr." $ ".$id_name;

                        echo "after comment".$comments;
                    }
                    else
                    {
                        $comments = " $ ".$comments_user;
                        $commenters = " $ ".$id_name;


                    }

                }

                $query = "UPDATE blog_posts SET ";
                $query .= "commenters = '$commenters' , ";
                $query .= "comment = '$comments'";
                $query .= "WHERE id = '$id_no'";

                $result = mysqli_query($connection , $query);

                if(!$result)
                {
                    die ("QUERY FAILED");
                }



            }
            header('Location: user_page1.php');    

        
    }

  ?>
 
 
 
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>