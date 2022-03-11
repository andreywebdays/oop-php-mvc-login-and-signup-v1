<?php 

session_start();
session_unset();
session_destroy();

// Going to back to home page
header("Location: ../index.php?error=logout-success");