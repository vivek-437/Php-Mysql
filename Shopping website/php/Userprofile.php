<?php
session_start();
include './db.php';

$logusername=$_SESSION['logusername'];
$username=substr($logusername,0,1);
$fullusername=$logusername;
$find_user=mysqli_query($conn,"SELECT * FROM signup_system WHERE username='$fullusername'");
if(isset($_POST['profilesave'])){

}
if(isset($_POST['profilecart'])){
    echo"<script>window.loctaion='./Userprofile.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/all.css">

    <link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/user.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <span>
                V-tech
            </span>
        </div>
        <div class="search-bar">
            <div id="size">
                <i class="fas fa-search"></i>
            </div>
            <input type="text" name="" id="getinput">

        </div>

        <div id="imgsr">
            <h6 id="letter"><span id="key"><?php echo $username;?></span></h6>
            <i class="fas fa-chevron-down" style="color: aliceblue;"></i>
        </div>
    </div>
    <div id="down">
        <div class="link" id="profile">
            <i class="fas fa-user"> </i> your profile
        </div>
        <div class="line">

        </div>
        <div class="link" id="cart">
            <i class="fas fa-shopping-cart"> </i> cart
        </div>
        <div class="line">

        </div>
        <form action="./home.php" method="post">
        <div class="link" id="back" name="removeuser">
            <i class="fas fa-sign-out-alt"> </i> sign out
        </div>
        </form>
        <div class="line">

        </div>
    </div>
    <div class="grid">
        <div class="container">
            <div class="usredata">
                <div class="proimg">
                    <div id="proimgsr">
                        <h6 id="imglet"><span id="key">V</span></h6>
                    </div>
                </div>
              
                    <?php 
                    if (!mysqli_num_rows($find_user) < 1) {
                        $row = mysqli_fetch_assoc($find_user);
                        // 
                        if ($fullusername === $row['username']) {
                           $newusername=$row['username'];
                           $email=$row['Email'];
                        }
                    }
                    echo'
                    <form method="post" action="./Userprofile">
                    <div class="usrprodata">
                    <div class="dscol">
                        <div class="prusername">
                            <i class="fas fa-user-circle"></i>
                            <input type="text" value=" '.$newusername.'" placeholder="Username" name="usernewname">
                        </div>
                        <div class="premail">
                            <i class="fas fa-envelope"></i>
                            <input type="text" value="'. $email.'" placeholder="Email" name="usernewemail">
                        </div>
                        <div class="prbirth">
                            <i class="fas fa-birthday-cake"></i>
                            <input type="text" value="" placeholder="dd/mm/yyyy" name="userbirthdate">
                        </div>
                        <div class="prhobby">
                            <i class="fas fa-gamepad"></i>
                            <input type="text" value="" placeholder="Hobby" name="userhobby">
                        </div>
                    </div>
                    <div class="pbtn">
                   
                    <button type="submit" id="profilesave" name="profilesave">save</button>
        
                    <button type="submit" id="profilecart" name="profilecart">cart</button>
                    </form>
                </div>
                    ';
           
            ?>
                   
                </div>
            </div>
        </div>


</body>
<script src="../javascript/home.js"></script>

</html>