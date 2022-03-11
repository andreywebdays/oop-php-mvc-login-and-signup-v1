<?php
    session_start(); // required on every page to know if there is a live session with a user
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<!-- Header -->
<header>
    <nav>
        <div>
            <h3>ANDREY WEBDAYS</h3>
            <ul class="menu-main">
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">PRODUCTS</a></li>
                <li><a href="#">SALES</a></li>
                <li><a href="#">MEMBER+</a></li>
            </ul>
        </div>
        <div>
            <ul class="menu-member">
                <?php
                    if(isset($_SESSION["userid"])){
                ?>
                    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                    <li><a href="includes/incLogout.php" class="header-login-a">LOGOUT</a></li>
                <?php
                    }else{
                ?>
                    <li><a href="#">SIGN UP</a></li>
                    <li><a href="#" class="header-login-a">LOGIN</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>

<!-- Login & SignUp Forms -->
<section class="signup-and-login">
    <div class="wrapper">
        <div class="signup-form">
            <h4>SIGN UP</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/incSignup.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd_repeat" placeholder="Repeat Password">
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
        <div class="login-form">
            <h4>LOGIN</h4>
            <p>Log in into your account.</p>
            <form action="includes/incLogin.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>