<?php
include './db.php';
session_start();
if (!isset($_SESSION["logusername"])) {
    echo "<script>window.location='./Sign Up.php'</script>";
}
$logusername=$_SESSION['logusername'];
$username = substr($logusername, 0, 1);
if(isset($_POST['Buy'])){
    $buyname=$_POST['bprid'];
    $productname="SELECT * FROM cart WHERE id='$buyname'";
    $res=mysqli_query($conn,$productname);
    $row=mysqli_fetch_assoc($res);
    $name=$row['productname'];
    echo "<script>alert('$name delivered');
    window.location='./home.php';
    </script>";
};
if(isset($_POST['removeuser'])){
    unset($logusername);
}
// window.loctaion='./home.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
            <input type="text" name="" id="getinput" onkeyup="searchProduct()">

        </div>

        <div id="imgsr">
            <h6 id="letter"><span id="key"><?php echo $username; ?></span></h6>
            <i class="fas fa-chevron-down" style="color: aliceblue;"></i>
        </div>
    </div>
    <div id="down">
        <div class="link" id="profile" name='profile'>
            <i class="fas fa-user"> </i> your profile
        </div>
        <div class="line">

        </div>
        <div class="link" id="cart" >
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
    <div class="flex">

        <?php
        $record = mysqli_query($conn, "SELECT * FROM cart");
        while ($data = mysqli_fetch_array($record)) {
            $prname = $data['productname'];
            $prinfo = $data['productinfo'];
            $prprice = $data['price'];
            $primg = $data['img'];
            echo ' 
   <div class="producthideshow">
        <div class="productdata">
            <!-- img -->
            <div class="proImg">
                <img src="../img/' . $primg . '" alt="" srcset="">
            </div>
            <!-- product details -->
            <div class="proname">
                <span>' . $prname . '</span>
            </div>
            <div class="Prodet">
                <span>' . $prinfo . '
                </span>
            </div>
            <!-- Buy -->
            <div class="btnflex">
            <form method="post" action="">
            <input type="hidden" name="bprid" value=' .$data['id']  .'">
                <div class="buyBtn btn" >
                    <button type="submit" name="Buy">buy</button>
                </div>
               
                </form>
                <!-- Add to cart -->
                <form method="post" action="./cart.php">
                <input type="hidden" name="cartid" value='. $data['id'] . '">
            <input type="hidden" name="cartquantity" value=' .$data['quantity']  .'">

                <div class="cartBtn btn" >
                    <button type="submit" name="Cart">add to cart</button>
                </div>
                </form>

            </div>
        </div>
       </div>
     ';
        } ?>
    
    </div>
</body>
<script src="../javascript/home.js"></script>

</html>


<!--  -->