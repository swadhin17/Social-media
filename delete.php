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
      
    if($_POST)
    {
        foreach($_POST as $name => $content) 
        {
           echo "The HTML name: $name <br>";
        }
        
        include "db_connect.php";
        
        $query = "DELETE FROM blog_posts ";
        $query .= "WHERE id = '$name'";
        
        $result = mysqli_query($connection , $query);
            
        if(!$result)
        {
            echo "hi";
            die ("QUERY FAILED");
        }
        else
        {
            echo "hi";
            header('Location: my_posts.php'); 
        }
    }

  ?>
 
 
 
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>