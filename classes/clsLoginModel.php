<?php

// User may login with username or email
class clsLoginModel extends clsDBH 
{

    protected function getUser($uid, $pwd) 
    {
        $statement = $this->connect()->prepare('SELECT user_pwd FROM users WHERE user_uid = ? OR user_email = ?;');
        
        if(!$statement->execute(array($uid, $uid)))
        {
            $statement = null;
            header("Location: ../index.php?error=login-statement-failed-1");
            exit();
        }

        if($statement->rowCount() == 0)
        {
            $statement = null;
            header("Location: ../index.php?error=login-user-not-found-1");
            exit();
        }

        $pwd_hashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $chk_pwd = password_verify($pwd, $pwd_hashed[0]["user_pwd"]);

        if($chk_pwd == false)
        {
            $statement = null;
            header("Location: ../index.php?error=wrong-password");
            exit();

        } elseif($chk_pwd == true) {

            $statement = $this->connect()->prepare('SELECT * FROM users WHERE (user_uid = ? OR user_email = ?) AND user_pwd = ?;');

            if(!$statement->execute(array($uid, $uid, $pwd_hashed[0]["user_pwd"])))
            {
                $statement = null;
                header("Location: ../index.php?error=login-statement-failed-2");
                exit();
            }

            if($statement->rowCount() == 0)
            {
                $statement = null;
                header("Location: ../index.php?error=login-user-not-found-2");
                exit();
            }

            $user = $statement->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["useruid"] = $user[0]["user_uid"];
            
        }

        $statement = null;
    }
}