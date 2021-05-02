<?php
session_start();
class ValidateReg
{

//    private $uploaddir = '/uploads/';
    private $pwd;
    private $email;

    public function __construct($pwd,$email)
    {
        $this->pwd= $pwd;
       $this->email=   $email;
    }

    public function checkPassword() {

        if (strlen($this->pwd) < 8) {
//            $errors[] = "Password too short!";
            $_SESSION['status'] = "Пароль слишком короткий";
            $_SESSION['msgType']="msg-bad";
            return false;
        }

        if (!preg_match("#[0-9]+#", $this->pwd)) {
//            $errors[] = "Password must include at least one number!";
            $_SESSION['status'] = "Пароль должен содержать число";
            $_SESSION['msgType']="msg-bad";
            return false;
        }

        if (!preg_match("#[a-zA-Z]+#", $this->pwd)) {
//            $errors[] = "Password must include at least one letter!";
            $_SESSION['status'] = "Пароль должен содержать одну букву";
            $_SESSION['msgType']="msg-bad";
            return false;
        }
        return true;

    }
    public function checkEmail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            return true;
        }
        else {
            $_SESSION['status'] = "Некорректный email";
            $_SESSION['msgType'] = "msg-bad";
            return false;
        }

    }

}