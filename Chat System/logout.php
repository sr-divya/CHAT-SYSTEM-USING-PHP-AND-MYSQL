
<?php

session_start();

if(isset($_POST['logoutbtn']))
{
    unset($_SESSION['username']);
    session_destroy();
    header('location:login.php');
}
?>

