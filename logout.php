<?php

session_start();

if(isset($_SESSION['new_name']))
{
    session_destroy();
    
    echo "<script>alert('You are Logged Out Successfully')</script>";
    echo "<script>location.href='blog/index.php'</script>";
    
}
else
{
    echo "<script>location.href='blog/index.php'</script>";
}

?>