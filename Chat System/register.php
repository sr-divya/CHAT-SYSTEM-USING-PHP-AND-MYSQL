<?php

include('inc/header.php');
include('db.php');
error_reporting(0);

?>
<body class="bg-dark-subtle">
    
</body>

<div class="bg-primary-subtle " style="height:680px; width:500px;margin-left:480px; margin-top:20px;">

<div class="bg-primary text-center text-white py-3" >
    <h1>Register Form</h1>
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

        <div class="mb-3 mt-3 mx-5">
            <label class="form-label">Contact</label>
            <input type="digit" name="contact" class="form-control" placeholder="Enter Contact">
        </div>

        <div class="mb-3 mt-3 mx-5">
            <label class="form-label">Gender</label><br>
            <input type="radio" name="gender"  value="male"> &nbsp; Male &nbsp;
            <input type="radio" name="gender"  value="female">&nbsp; Female
        </div>

        <div class="mb-3 mt-5 mx-5">
            <button type="submit" class="btn btn-outline-primary" name="registerbtn">Register</button>
        </div>

        <div class="mb-3 mt-2 mx-5">
            <a href="login.php">Already have an account &rarr;</a>
        </div>
        
    </form>

</div>
<?php

$Username=$_POST['username'];
$Email=$_POST['email'];
$Password=$_POST['pass'];
$Contact=$_POST['contact'];
$Gender=$_POST['gender'];

if(isset($_POST['registerbtn']))
{
    if($Username=='' || $Email=='' || $Password=='' || $Contact=='' || $Gender=='')
    {
        echo "<h4>* fill all fields</h4>";
    }
    else
    {

        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['pass']);

        $q="select * from register where Username='$username' or Email='$email' and Password='$password'";

        $result=mysqli_query($conn,$q);
        if(mysqli_fetch_assoc($result)>0)
        {
            echo "<h3>*User already Registered</h3>";
        }
        else
        {
    
            $query="insert into register(Username,Email,Password,Contact,Gender) values ('$Username','$Email','$Password','$Contact','$Gender')";

            $run_query=mysqli_query($conn,$query);
            if($run_query)
            {
                echo "<h3>Registered Successfully!</h3>";
            }
            else
            {
                echo "<h3>*Error reported</h3>";
            }
        }
    }
}

?>

<?php

include('inc/footer.php');

?>