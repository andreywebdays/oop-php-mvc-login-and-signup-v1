<?php

if(isset($_POST["submit"])){

    // grabbing the data
    $uid = $_POST["uid"];
    $pwd =  $_POST["pwd"];
    $pwdRepeat =  $_POST["pwd_repeat"];
    $email =  $_POST["email"];

    // instantiate clsSignupController class
    include "../classes/clsDBH.php";
    include "../classes/clsSignupModel.php";
    include "../classes/clsSignupController.php";

    $signup = new clsSignupController($uid, $pwd, $pwdRepeat, $email);

    // running error handlers and user signup
    $signup->signupUser();


    // going back to main page
    header("Location: ../index.php?error=signup-success");
}