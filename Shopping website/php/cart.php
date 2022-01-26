<?php
session_start();
$logusername=$_SESSION['logusername'];
$username = substr($logusername, 0, 1);
include './db.php';
if (isset($_POST['Cart'])) {
    if (!isset($_SESSION[$logusername])) {
        $_SESSION[$logusername][0] = array('id' => $_POST['cartid'], 'quantity' => $_POST['cartquantity']);
        echo "<script>alert('Item Added');
                window.location='./home.php';
             </script>";
    } else {
        $myitem = array_column($_SESSION[$logusername], 'id');
        if (in_array($_POST[$logusername], $myitem)) {
            echo "<script>alert('Item Already Added');
                window.location='./home.php';
            </script>";
        } else {
            $count = count($_SESSION[$logusername]);
            $_SESSION[$logusername][$count] = array('id' => $_POST['cartid'], 'quantity' => $_POST['cartquantity']);
            echo "<script>alert('Item Added');
                 window.location='./home.php';
                </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/home.css">
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




    <div class="cartcontainer">
        <div class="cartdetails">

            <?php
            if (isset($_SESSION[$logusername])) {
                foreach ($_SESSION[$logusername] as $key => $value) {
                    $intid = $value['id'];
                    $cartrecords = mysqli_query($conn, "SELECT * FROM cart WHERE id='$intid'");
                    $data = mysqli_fetch_assoc($cartrecords);
                    $prname = $data['productname'];
                    $prinfo = $data['productinfo'];
                    $prprice = $data['price'];
                    $primg = $data['img'];
                    $prquantity = $data['quantity'];
                    echo '
            <div class="data">
                <div class="img">
                    <img src="../img/' . $primg . '" alt="" srcset="">
                </div>
                <div class="info">
                    <h6>' . $prname . '</h6>
                    <!-- <span class="summ">' . $prinfo . '
                    </span> -->
                </div>

                <div class="incre">

                    <div class="decrease">
                        <i class="fas fa-minus" id="minus" onclick="decreaseValue()"></i>
                    </div>
                    <div class="count">
                        <input type="text" name="" class="val" value="' . $prquantity . '" disabled>
                    </div>
                    <div class="increase">
                        <i class="fas fa-plus" id="plus" onclick="increaseValue()"></i>
                    </div>

                </div>

                <div class="right">
                <form method="post" action="./cart.php">
                    <div class="cancel Cbtn" name="delete">
                <input type="hidden" name="remove_item" value="" ">
                        <i class="fas fa-window-close"></i>
                    </div>
                </form>
                <form method="post" action="./cart.php">
                    <div class="update Cbtn" name="edit">
                        <i class="fas fa-edit"></i>
                    </div>
</form>
                </div>
            </div>
            ';
                }
            }


            ?>

        </div>
        <div class="carttotalAm">

        </div>
    </div>
</body>
<script src="../javascript/cart.js"></script>
<script src="../javascript/home.js"></script>


</html>