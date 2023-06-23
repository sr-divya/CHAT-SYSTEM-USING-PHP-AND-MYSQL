<?php

include('inc/header.php');
include('db.php');
include('logout.php');


if(!isset($_SESSION['username']))
{
    header('location:login.php');
}

?>

<div class="bg-primary-subtle" style="height:745px; width:1535px; ">
    <div class="bg-dark d-flex text-left text-white py-3" style="position:sticky;">
        <h2><?php echo "@".$_SESSION['username']; ?></h2>
        <form action="" method="POST">
            <button type="submit" name="logoutbtn" class="btn btn-danger" style="margin-left:1200px;" >Logout</button>
        </form>
    </div>

    <div class="bg-dark-subtle text-dark" style="height:600px; overflow-y:auto; overflow-x:hidden;">
        <div style="float:left; width:1535px;">
            <?php
                $user=$_SESSION['username'];
                $q1="select * from msgs where Username!= '$user' order by Time asc";

                $result=mysqli_query($conn,$q1);
                if((mysqli_num_rows($result))>0)
                {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <div class="bg-white text-black text-center d-block" style="width: 300px;  border-radius:10px; font-size:20px; margin-bottom:3px; margin-left:100px;">
                            <?php echo $row['Message']; ?>
                            <?php echo "@".$row['Username']; ?>
                            
                        </div>
                        
                        <?php
                    }
                }
            ?>
        </div>
        

        <div style="float:right; margin-right:20px;">
        <?php
                $user=$_SESSION['username'];
                $q1="select * from msgs where Username = '$user' order by Time asc";

                $result=mysqli_query($conn,$q1);
                if((mysqli_num_rows($result))>0)
                {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <div class="bg-primary text-white text-center d-block" style="width: 300px;  border-radius:10px; font-size:20px; margin-bottom:3px; margin-left:50px;">
                            <?php echo $row['Message']; ?>     
                        </div>
                        
                        <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="bg-dark" style="height:67px;">
        <form action="" method="POST" autocomplete="off">
            <div class=" d-flex" style="margin-left:200px; padding-top:10px; position:sticky;">
                <input type="text" name="msg" style="width:1000px; " class="form-control" placeholder="Type message here...">
                <button type="submit" name="sendbtn" class="btn-lg btn btn-primary mx-3">Send</button>
            </div>
        </form>
    </div>
    

</div>

<?php

if(isset($_POST['sendbtn']))
{
    $msg=$_POST['msg'];
    $username=$_SESSION['username'];

    $query="insert into msgs(Username,Message) values ('$username','$msg')";

    $run_query=mysqli_query($conn,$query);
    if($run_query)
    {
        echo "<h5>msg sent!</h5>";
    }
    else
    {
        echo "<h5>msg not sent!</h5>";
    }
}
?>




<?php

include('inc/footer.php');

?>