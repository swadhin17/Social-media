<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

      <link rel="stylesheet" href="login.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
   
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
   
      
      if(isset($_POST['click1']))
      {
          session_start();
          $new_name = $_POST['new_username'];
          $new_password = $_POST['new_password'];
          $new_email = $_POST['new_email'];
          
//          echo $new_name,$new_password,$new_email;
          
          
//          
          $_SESSION['new_name'] = $new_name;
          $_SESSION['new_password'] = $new_password;
          $_SESSION['new_email'] = $new_email;
          
//          echo $_SESSION['new_name'],$_SESSION['new_password'],$_SESSION['new_email'];
          
          header('Location: newaccount.php'); 
          
//        
      }
    
   
   ?>
   
   <?php
      
      
      include "db_connect.php";
//      session_start();
      
      if(isset($_POST['login']))
      {
          session_start();
          
          $login_name = $_POST['login_name'];
          $login_password = $_POST['login_password'];
        
//          $name = $
//          echo $login_name,$login_password;
          
          $search_query = "SELECT * FROM user_login WHERE name LIKE '%$login_name%'";
          
          $login_result = mysqli_query($connection,$search_query);
          
            if(!$login_result)
            {
                die('Query Failed'.mysqli_error());
            }
            
            $count = mysqli_num_rows($login_result);
          
          echo $count;
          
            $error_message = "hi";
            $err_count = 0;
          
            
                if($count>0)
                {
          
                    while($row = mysqli_fetch_assoc($login_result))
                    {


                            $fetch_name = $row['name'];
                            $_SESSION['new_name'] = $row['name'];
                            $fetch_password = $row['password'];
                            $fetch_year = $row['year'];

                    }
                    
                    if($login_password == $fetch_password && $login_name == $fetch_name)
                    {
                    
                        header('Location: user_page1.php');    
                    }
                    else
                    {
                        $err_count = $err_count + 1;
                        $error_message = " Please enter the correct username or passwords ";    
                    }
                    
                }
          
                
                    
                
                else
                {
//                    echo "noce";
                    
                    $err_count = $err_count + 1;
                    $error_message = " Please enter the correct username or password ";
                }
          
//          echo $fetch_name,$fetch_password,$fetch_year;
          
      }
      
      
      
      
      
      
    ?>
   
    
<!--    Heading -->
    <div class="container" id="cont1" >
      <div class=row>
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="heading1">
        
        <p class="para1" > <span class="d">W</span>elcome<span class="f">T</span>o <span class="b">B</span>logger <span class="h"></span><span class="e"></span>  </p>
        
        </div>
        </div>
        </div>
    </div>
    
<!--   Heading Over -->
       <div class="container">
      <div class=row>
      <div class="col-md-12 col-sm-12 col-xs-12">
           <hr class=hr1>
          </div>
           </div>
      </div>       
    
   
<!--   Section 2 ACCOUNTT-->
   
   <div class="row" id=row1 >
       
<!--       LEFT-->
       <div class="col-md-6" id=col-1 >
           <h1 class="heading" > Create A New Account <small class="smal" > It's Free And Always Be </small> </h1>
                   <br>   
              <div class="container-fluid" id=s-col-1>
                 <br>
                 <form action="login.php" method="post" >    
                  <div class="form-group" id =fg1>
                      <div class="col-md-12 col-sm-12 col-xs-12" id=col-md-9-1> 
                           
                            <div class="input-group" id=ig1>
                               <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                                <input type="text" name="new_username" id="t1" placeholder="Your Username" class="form-control" tabindex="1" >
                            </div>                           
                          
                      </div> 
                  </div>
                     <br><br><br>
                     
                  <div class="form-group" id =fg1> 
                      <div class="col-md-12 col-sm-12 col-xs-12" id=col-md-9-1> 
                           
                            <div class="input-group" id=ig1>
                               <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                                <input type="text" name="new_password" id="t1" placeholder="Your Password" class="form-control" tabindex="2" >
                            </div>                           
                          
                      </div> 
                  </div>
                  
                    <br><br><br>
                     
                  <div class="form-group" id =fg1> 
                      <div class="col-md-12 col-sm-12 col-xs-12" id=col-md-9-1> 
                           
                            <div class="input-group" id=ig1>
                               <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                                <input type="text" name="new_email" id="t1" placeholder="Your Email-Id" class="form-control"  tabindex="3" >
                            </div>                           
                          
                      </div>
                  </div>
                  <br><br><br>
<!--                  <div class="clearfix"></div>-->
                  <div class="form-group" id =fg1> 
                    <div class="container">
                      <div class="row">
                          
                          <div class="col-md-12 col-sm-12 col-xs-12">
<!--                              <a href=newaccount.html>-->
                                  <button class="btn btn-primary  col-md-5" name=click1 id=btn2 tabindex="4" >Click To Continue</button>
<!--                              </a>-->
                          </div>
                          
                      </div>
                    </div>
                  </div>
                  
                  </form>
               </div>
        </div>
        
<!--        LEFT OVER -->
        
<!--    Center  starts  -->
<!--
        
        <div class="col-md-1">
            
            <div class="line">
                
                
                
            </div>
            
        </div>
-->

<!--    Center ends  -->
       
<!--       RIGHT-->
       <div class="col-md-6" id=col-2>
          
<!--           <div class="container-fluid" id=s-col-2 >-->
               
                <h1 class="heading"> Login <small class="smal" > Into a Account </small> </h1>
                   <br>
              <div class="container-fluid" id=s-col-1>
                 <br>
                 
                 
                 <p class="error" style="" > <?php if($err_count > 0 ) { echo $error_message; } else { echo "<style>.error{display:none};</style>"; } ?> </p>
                 
                 <form action="login.php" method="post" >
                  <div class="form-group" id =fg1>
                      <div class="col-md-12 col-sm-12 col-xs-12" id=col-md-9-1> 
                           
                            <div class="input-group" id=ig1>
                               <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                                <input type="text" name="login_name" id="t1" placeholder="Your Username" class="form-control">
                            </div>                           
                          
                      </div> 
                  </div>
                     <br><br><br>
                     
                  <div class="form-group" id =fg1> 
                      <div class="col-md-12 col-sm-12 col-xs-12" id=col-md-9-1> 
                           
                            <div class="input-group" id=ig1>
                               <span class="input-group-btn" id=ib1 >
                                    <button type="button" class="btn btn-default" id=sb1 >@</button>
                                </span>
                                <input type="text" name="login_password" id="t1" placeholder="Your Password" class="form-control">
                            </div>                           
                          
                      </div> 
                  </div>
                  
                    <br><br><br>
                  <div class="form-group" id =fg1> 
                    <div class="container">
                      <div class="row">
                          
                          <div class="col-md-12 col-sm-12 col-xs-12">
<!--                              <a href=index.html>-->
                               <button class="btn btn-primary col-md-5" name=login id=btn2 value="Login"> Login </button>
<!--                              </a>-->
                          </div>
                          
                      </div>
                    </div>
                  </div>
                  </form>
           </div>
           
       </div>
       
<!--       RIGHT ENDSV -->
       
       
   </div>
   
   <!--   Section 2 ACCOUNTT OVER -->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>