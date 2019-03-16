<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    
    <link rel="stylesheet" href="admin.css">
   
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   
      <a href="index.html"><button class="btn btn-default" style="float: right;margin-right: 10px;width: 150px;" > Logout  </button></a>
     
    <div class="page-header">
      <p class="para1" >  Admin login </p>
      
    </div>

   
    
    <div class="container">
    <div class="table-responsive">
     <table class="table table-hover" >
        
        
        <thead>
            <th> Uploader Name </th>
            <th> Post </th>
            <th> uploaded Time </th>
            <th> category </th>
            <th> Delete </th>
        </thead>
        
        <tbody>
        
        <?php
            
            include "db_connect.php";
          
            $query = "SELECT * FROM blog_posts ORDER BY id DESC ";
        
            $result = mysqli_query($connection,$query);

            if(!$result)
            {
                die('Query Failed'.mysqli_error($connection));
            }
            echo "<br>";
            while($row = mysqli_fetch_assoc($result))
            {
                $uploader_name = $row['uploader_name'];
                $post_content = $row['blog_content'];
                $post_time = $row['post_time'];
                $category = $row['category'];
                $id = $row['id'];
            
            
        ?>    
        
        <form action="delete_post.php" method="post">
            <tr>
                <td> <?php echo $uploader_name; ?> </td>
                <td> <?php echo $post_content; ?> </td> 
                <td> <?php echo $post_time; ?> </td>
                <td> <?php echo $category; ?> </td>
                <td> <button class="btn btn-danger" name="<?php echo $id; ?>"> Delete  </button> </td>
            </tr>
        </form>
        
        <?php } ?>
        
        </tbody>
        
        
     </table>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>