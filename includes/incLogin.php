<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $uid =  $_POST["uid"];
    $pwd =  $_POST["pwd"];

    // Instantiate clsLoginController class
    include "../classes/clsDBH.php";
    include "../classes/clsLoginModel.php";
    include "../classes/clsLoginController.php";

    $login = new clsLoginController($uid, $pwd);

    // Running error handlers and user signup
    $login->loginUser();


    // Going back to main page
    header("Location: ../index.php?error=login-success");
}