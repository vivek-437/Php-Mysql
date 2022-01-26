<!-- <?php
include './db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $loginusername = $_POST["loginusername"];
    $loginpassword = $_POST["loginpassword"];
    $ksql = "INSERT INTO `login_system` (`id`,`username`,`spassword`,`currentTime`) VALUES (NULL,'$loginusername','$loginpassword',current_timestamp())";
    if (mysqli_query($conn, $ksql)) {
        echo '<script>alert("Login successfully")';
    } else {
        echo '<script>alert("Not registered")';
    }
    echo '<script>window.location="./Sign Up.php";</script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/login system.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    <div class="container">
        <div class="link">
            <div class="singup" id="signup">
                <a href="./Sign Up.php" target="_blank">sign up</a>
            </div>
            <div class="login" id="login">
                <a href="">Log in</a>
            </div>
        </div>

        <div>
            <div class="info">
                <input type="text" value="Please Signup or Login" disabled>
            </div>

            <form action="./Sign Up.php" method="post">
                <div class="urname flex">
                    <i class="fas fa-user-circle"></i>
                    <input type="text" class="username" name="loginusername">
                </div>

                <div class="passwrd flex">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="loginpassword">
                </div>

                <div class="accept">
                    <button type="submit" name="submitLogin">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html> -->

$sdup = mysqli_query($conn, "SELECT username FROM signup_system WHERE username='$signusername'");
