<?php

include('inc/header.php');
include('db.php');

if(isset($_POST['loginbtn']))
{
    header('location:login.php');
}

if(isset($_POST['registerbtn']))
{
  header('location:register.php');
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family:;"><b>A Simple ChatBox</b></a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
          
          
      <form class="d-flex" role="search" style="margin-left:1100px;" method="POST">
        
        <button class="btn btn-outline-success" type="submit" name="loginbtn">Login</button>
        <button class="btn btn-outline-primary mx-3" type="submit" name="registerbtn">Register</button>
      </form>
    </div>
  </div>
</nav>

<?php

include('inc/footer.php');

?>

