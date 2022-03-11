<?php

class clsSignupController extends clsSignupModel 
{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwd_repeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwd_repeat = $pwd_repeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            header("Location: ../index.php?error=signup-empty-input");
            exit();
        }

        if($this->invalidUid() == false)
        {
            header("Location: ../index.php?error=signup-invalid-uid");
            exit();
        }

        if($this->pwdMatch() == false)
        {
            header("Location: ../index.php?error=signup-password-match");
            exit();
        }

        if($this->invalidEmail() == false)
        {
            header("Location: ../index.php?error=signup-invalidemail");
            exit();
        }

        if($this->uidTaken() == false)
        {
            header("Location: ../index.php?error=signup-email-taken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwd_repeat) || empty($this->email))
        {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUid()
    {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch()
    {
        if($this->pwd !== $this->pwd_repeat)
        {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function uidTaken()
    {
        if(!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        } else {
            $result = true;
        }
        
        return $result;
    }
}