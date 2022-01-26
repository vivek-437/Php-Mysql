<?php

session_start();
// session_destroy();
// if (isset($_SESSION["Username"])) {
//     echo "<script>window.location='./home.php'</script>";
// }
include './db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST["email"])) {
        $loginusername = $_POST["loginusername"];
        $loginpassword = $_POST["loginpassword"];
        $_SESSION['logusername']=$loginusername;
        $logecrtypassword = password_hash($loginpassword, PASSWORD_BCRYPT);
        $sql_order_query = "SELECT * FROM signup_system WHERE username='$loginusername'";
        $result = mysqli_query($conn, $sql_order_query);
        if (!mysqli_num_rows($result) < 1) {
            $row = mysqli_fetch_assoc($result);
            if ((password_verify($loginpassword, $row['spassword']))) {
                echo '<script>alert("Login successfully");</script>';
                echo '<script>window.location="./home.php";</script>';
            } else {
                echo '<script>alert("Incorrect Username/Password");</script>';
            }
        } else {
            echo '<script>alert("Not Registered");</script>';
            echo '<script>window.location="./Sign Up.php";</script>';
        }
    } else {
        $singusername = $_POST["signupUserName"];
        $signemail = $_POST["email"];
        $signpassword = $_POST["signupPassword"];
        $sql_order_query = "SELECT username FROM signup_system WHERE username='$singusername'";
        $result = mysqli_query($conn, $sql_order_query);
        if (mysqli_num_rows($result) < 1) {
            $ecrtypassword = password_hash($signpassword, PASSWORD_BCRYPT);
            echo "<script>console.log('.$ecrtypassword.')</script>";

            $sql = "INSERT INTO `signup_system` (`id`, `Email`, `username`, `spassword`, `currentTime`) VALUES (NULL, '$signemail', '$singusername', '$ecrtypassword', current_timestamp());";
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Sign up successfully");
                    </script>';
            } else {

                echo '<script>alert("Invalid")</script>';
            }
        } else {
            echo '<script>alert("Already Registered")</script>';
        }
        echo '<script>window.location="./Sign Up.php";</script>';
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
    <link rel="stylesheet" href="../css/login system.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="link">
            <div class="singup" id="signup">
                <h6>sign up</h6>
            </div>
            <div class="login" id="login">
                <h6>Log in</h6>
            </div>
        </div>

        <div>
            <div class="info">
                <input type="text" value="Please Signup or Login" disabled>
            </div>

            <div id="change">
                <form action="./Sign Up.php" method="post">
                    <div class="urname flex">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" class="username" id="sigupurname" name="signupUserName" placeholder="Enter Username">
                    </div>
                    <div class="email flex">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="email" id="signemail" name="email" placeholder="Enter Email">
                    </div>
                    <div class="passwrd flex">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="signupPassword" id="signpassword" placeholder="Enter Password">
                    </div>

                    <div class="accept">
                        <button type="submit" name="signupSubmit" id="signbtn">create an account</button>
                    </div>
                    <div class="connect">
                        <hr>
                        <h6>or connect with</h6>
                        <hr>
                    </div>
                    <div class="media">
                        <div><i class="fab fa-google"></i></div>
                        <div><i class="fab fa-facebook-square"></i></div>
                    </div>
                </form>
            </div>
            <form action="./Sign Up.php" method="post">
            <div id="remove">
                    <div class="urname flex">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" class="username" id="loginurname" name="loginusername" placeholder="Enter Username">
                    </div>

                    <div class="passwrd flex">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="loginpassword" id="loginpassword" placeholder="Enter Password">
                    </div>

                    <div class="accept">
                        <button type="submit" name="submitLogin">Login</button>
                    </div>
       </form>
            </div>

</body>
<script src="../javascript/main.js"></script>

</html>