 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

      <link rel="stylesheet" href="confirmemail.css">
   
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
   
    <?php
      
  include "db_connect.php";
      session_start();
      
      $name = $_SESSION['new_name'];
      
      
      if(isset($_SESSION['new_email']))
      {
          
          
//          echo "nice";
          
      }
      else
      {
          echo "<script>location.href='login.php'</script>";
          echo " session out ";
      }
      
      
    $em   = explode("@",$_SESSION['new_email']);
    $name = implode(array_slice($em, 0, count($em)-1), '@');
    $len  = floor(strlen($name)/2);

    $new_email =  substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
      
      if(isset($_POST['verify']))
      {
          
          $name = $_SESSION['new_name'];
      
          $potp = $_POST['otp'];

          $query = "SELECT * FROM user_login WHERE name  LIKE '%$name%' ";

            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($result))
            {
                $notp = $row['otp'];
                $year = $row['year'];

            }
          $err_count=0;
          echo $potp.$notp;

          if($potp == $notp)
          {
                header('Location: user_page1.php');    
             
              
          }
          else
          {
              $err_count = $err_count + 1;
              $error_message = " Please Enter The Correct Otp ";
              
          }
      }
        
      
  ?> 
    
<!--    THE HEADING -->
    
    <div class="container" id="cont1" > 
      <div class=row> 
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="heading1">
        
        <p class="para1" > <span class="c">C</span>onfirm <span class="t">T</span>he <span class="e">E</span>mail
        </div>
        </div>
        </div>
    </div>
    
<!--    HR-->
    
    
    <div class="container">
      <div class=row>
      <div class="col-md-12 col-sm-12 col-xs-12">
           <hr class=hr1>
          </div>
           </div>
      </div>       
    
    
<!--    MAIN SECTION 1-->
    
    <div class="row" id=row1>
        
        <div class="col-md-6 col-md-offset-3" id="col-md-6-1" >
<!--            CONTAINER START-->
            <div class="container" id=cont2 >
            <form action="confirmemail.php" method="post" >    
               
               <p class="error" > <?php if($err_count > 0 ) { echo $error_message; } else { echo "<style>.error{display:none};</style>"; } ?> </p>
                <br><br>
                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-12 col-xs-12 col-sm-offset-1">
                         <div class="input-group" id=ig1>
                            <span class="input-group-btn" id=ib1 >
                                <button type="button" class="btn btn-default" id=sb1 >@</button>
                            </span>
                             <input type="text" class="form-control" id="t1"  name="otp" placeholder="Enter the OTP">
                         </div>    
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="space" style="margin: 2% 0px;"></div>
                
                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-offset-1">
<!--                        <a href=index.html>-->
                        <button class="btn btn-default col-md-12" name=verify id=btn1 > Verify The Account </button>
<!--                            </a>-->
                    </div>
                             
                </div>
                    
                </form>    
                <br><br><br>
<!--CONTAINER OVER-->
                        
        </div>
    </div>
      </div>
      
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>