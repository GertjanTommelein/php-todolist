<?php

use MMORTS\Validators\RegisterValidator;

require_once('Data/UserDAO.php');
require_once('Entities/User.php');
require_once('Validators/RegisterValidator.php');

class UserService {
    public function addUser($username, $password, $repeatPassword) {
        $userDAO = new UserDAO();
        // check if there are errors in the validation
        if(count(RegisterValidator::validateRegisterForm($username, $password, $repeatPassword, $userDAO)) > 0) {
            $_SESSION["registerErrors"] = RegisterValidator::validateRegisterForm($username, $password, $repeatPassword, $userDAO);
            if(!empty($username)) {
                $_SESSION["register_username"] = $username;
            }
            return false;
        }// add user to database
        else {
            $_SESSION["registerErrors"] = RegisterValidator::validateRegisterForm($username, $password, $repeatPassword, $userDAO);
            $userDAO->create($username, $password);
            return true;
        }
    }

    public function getByUsername($username){
        $userDAO = new UserDAO();
        $user = $userDAO->getByUsername($username);
        return $user;
    }

    public function isLoginValid($username, $password){
        $userDAO = new UserDAO();
        if($userDAO->checkLogin($username, $password) == null) {
            return false;
            
        }
        else {
            return true;
        }
    }
}


?>