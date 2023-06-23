<?php

include('inc/header.php');
include('db.php');
error_reporting(0);
session_start();

?>
<body class="bg-dark-subtle">
    
</body>

<div class="bg-success-subtle " style="height:550px; width:500px;margin-left:450px; margin-top:80px;">

<div class="bg-danger text-center text-white py-3" >
    <h1>Login Form</h1>
</div>

    <form action="" method="POST" autocomplete="on">
        <div class="mb-3 mt-5 mx-5">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
        </div>

        <div class="mb-3 mt-3 mx-5">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="mb-3 mt-3 mx-5">
            <label class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
        </div>

        <div class="mb-3 mt-5 mx-5">
            <button type="submit" class="btn btn-outline-danger" name="loginbtn">Login</button>
        </div>

        <div class="mb-3 mt-2 mx-5">
            <a href="register.php">Don't have an account &rarr;</a>
        </div>
        
    </form>

</div>

<?php

$Username=$_POST['username'];
$Email=$_POST['email'];
$Password=$_POST['pass'];

if(isset($_POST['loginbtn']))
{
    if($Username=='' || $Email=='' || $Password=='')
    {
        echo "*fill all fields";
    }

    else
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['pass']);

        $_SESSION['username']=$username;

        $query="select * from `register` where Username='$username' or Email ='$email' and Password='$password'";

        $run_query=mysqli_query($conn,$query);
        if(mysqli_fetch_assoc($run_query)>0)
        {
            if(isset($_SESSION['username']))
            {
                header('location:dashboard.php');
            }
            else
            {
                header('location:login.php');
                echo "<h3>*Invalid Credentials</h3>";
            }
        }
        else
        {
            echo "*User not found";
        }
    }
}
?>

<?php

include('inc/footer.php');

?>