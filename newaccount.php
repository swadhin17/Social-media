<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

      <link rel="stylesheet" href="newaccount.css">
   
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
      
//      if(isset($_POST['click1']))
//      { 
////      
//          $new_name = $_POST['new_username'];
//          $new_password = $_POST['new_password'];
//          $new_email = $_POST['new_email'];
//
            $new_name = $_SESSION['new_name'];
            $new_password = $_SESSION['new_password'];
            $new_email = $_SESSION['new_email'];
      
////              echo $new_name . $new_password . $new_email;
//      }
      
      if(isset($_SESSION['new_email']))
      {
//          echo "<script>location.href='login.php'</script>";
//          
//          echo "nice";

      
        echo $new_name . $new_password . $new_email;
      
          if(isset($_POST['click2']))
          {
              $new_university_name = $_POST['new_university_name'];
              $new_branch = $_POST['new_branch'];
              $new_year = $_POST['new_year'];
              $new_email = $_SESSION['new_email'];

                $i = 0;
                $pin = "";
                while($i < 4)
                {
                    $pin .= mt_rand(0, 9);
                    $i++;
                }

                echo $pin, '<br>';

                $_SESSION['otp'] = $pin;
//                            echo $new_name . $new_password . $new_email;
              
              
              
              
                $another_query = "INSERT INTO blog_login(name,email)";
                $another_query .= "VALUES('$new_name','$new_email')";
              
                $another_result = mysqli_query($connection,$another_query);
                
                if($another_result)
                    {
                        echo "nice work ";
//                       header('Location: confirmemail.php');            
                    }
                    else
                    {
                        die('Query Failed'.mysqli_error($connection)); 
                    }
              

                $to = $new_email;
                $subject = "Email Verification";
                $txt = "Your OTP is  : $pin "  ; 
                $headers = "From: savanjasanidot5@gmail.com" . "\r\n" ;

                $mail = mail($to,$subject,$txt,$headers);

    //		    return $mail;

                if($mail)
                {
                    echo "mail sent";

                     $query = "INSERT INTO user_login(name,password,email,university_name,branch,year,otp)";
                    $query .= "VALUES ('$new_name','$new_password','$new_email','$new_university_name','$new_branch','$new_year','$pin')";
                    
                    $result = mysqli_query($connection,$query);
                    

                    if($result)
                    {
                        echo "nice work ";
                       header('Location: confirmemail.php');            
                    }
                    else
                    {
                        die('Query Failed'.mysqli_error($connection)); 
                    }
                    
                    
                    


                }
              else
              {
                  echo "mail not sent";
                  
                  $query = "INSERT INTO user_login(name,password,email,university_name,branch,year,otp)";
                    $query .= "VALUES ('$new_name','$new_password','$new_email','$new_university_name','$new_branch','$new_year','$pin')";
                    
                    $result = mysqli_query($connection,$query);
                    

                    if($result)
                    {
                        echo "nice work ";
                       header('Location: confirmemail.php');            
                    }
                    else
                    {
                        die('Query Failed'.mysqli_error($connection)); 
                    }
                  
              }
          }
          
      }
      
            else
      {
                
          echo "<script>location.href='login.php'</script>";
          echo " session out ";
      }
      
    ?>  
     
<!--    THE HEADING -->
    
    <div class="container" id="cont1" >
      <div class=row>
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="heading1">
        
        <p class="para1" > <span class="fi">F</span>ill <span class="t">T</span>he <span class="f">F</span>ollwing <span class="d">D</span>etails.
        
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
            
            <form action="newaccount.php" method="post" >    
                <br><br>
                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-12 col-xs-12 col-sm-offset-1">
                         <div class="input-group" id=ig1>
                            <span class="input-group-btn" id=ib1 >
                                <button type="button" class="btn btn-default" id=sb1 >@</button>
                            </span>
                             <input type="text" class="form-control" id="t1" placeholder="Enter the University Name">
                         </div>    
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="space" style="margin: 2% 0px;"></div>

                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-offset-1">
                        <div class="input-group" id=ig1>
                            <span class="input-group-btn" id=ib1 >
                                <button type="button" class="btn btn-default" id=sb1 >@</button>
                            </span>
                         <input type="text" class="form-control" id="t1" placeholder="Branch Name">
                        </div>
                    </div>    
                </div>

                <div class="clearfix"></div>
                <div class="space" style="margin: 2% 0px;"></div>

                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-offset-1">
                       <div class="input-group" id=ig1>
                                <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                            <select  class="form-control" id=t1>
                              <option> Select The Year </option>
                              <option>1<superscript>st</superscript> Year</option>
                              <option>2<superscript>nd</superscript> Year</option>
                              <option>3<superscript>rd</superscript> Year</option>
                              <option>4<superscript>th</superscript> Year</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="space" style="margin: 2% 0px;"></div>
                
                <div class="form-group" id=fg1>
                    <div class="col-md-10 col-sm-offset-1">
<!--                        <a href="confirmemail.html">-->
                            <button class="btn btn-default col-md-12" name=click2 id=btn1 > Confirm The Account </button>
<!--                            </a> -->
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