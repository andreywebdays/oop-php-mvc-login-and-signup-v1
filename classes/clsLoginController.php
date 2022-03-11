<?php

class clsLoginController extends clsLoginModel 
{

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false)
        {
            header("Location: ../index.php?error=login-empty-input");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput()
    {
        $result = "";
        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}