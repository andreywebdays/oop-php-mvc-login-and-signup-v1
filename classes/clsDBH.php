<?php

class clsDBH {

    protected function connect(){
        try
        {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=oop_php_signup_login_ver_1', $username, $password);
            return $dbh;
        } catch(PDOException $e) {
            // Print out an error if can not connect to the database
            print "Error!: " . $e->getMessage() . "<br/>";
            die(); // Kill the connection
        }
    }

}