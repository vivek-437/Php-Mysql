<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "V-log";
$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("connection : " . mysqli_connect_error());
}
?>



<!-- $snum=mysqli_num_rows($sresult);    
    if($snum==1){
    if($conn->query($sql)===TRUE){
        $sql = "INSERT INTO `signup_system` (`id`, `Email`, `username`, `spassword`, `currentTime`) VALUES (NULL, $signemail, $singusername, $signpassword, current_timestamp());";
            echo'<script>alert("Sign up successfully")</script>';
    }else{
        
        echo'<script>alert("Invalid")</script>';
    }
    }
    else{
        echo'<script>alert("Already Registered")</script>';
    } -->