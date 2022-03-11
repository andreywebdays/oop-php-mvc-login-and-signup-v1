<?php

class clsSignupModel extends clsDBH {

    protected function setUser($uid, $pwd, $email) 
    {
        $statement = $this->connect()->prepare('INSERT INTO users (user_uid, user_pwd, user_email) VALUES (?, ?, ?);');

        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        if(!$statement->execute(array($uid, $hashed_pwd, $email)))
        {
            $statement = null;
            header("Location: ../index.php?error=signup-statement-failed-1");
            exit();
        }

        $statement = null;
    }
    
    // Read this: https://www.php.net/manual/en/pdostatement.execute.php
    protected function checkUser($uid, $email) 
    {
        $statement = $this->connect()->prepare('SELECT user_email FROM users WHERE user_uid = ? OR user_email = ?;');

        if(!$statement->execute(array($uid, $email)))
        {
            $statement = null;
            header("Location: ../index.php?error=signup-statement-failed-2");
            exit();
        }

        if($statement->rowCount() > 0)
        {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}