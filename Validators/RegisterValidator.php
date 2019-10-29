<?php
namespace MMORTS\Validators;
class RegisterValidator {

    public static function validateRegisterForm($username, $password, $repeatPassword, $userdao) {
        $errors = array();

        if(empty($username) || empty($password) || empty($repeatPassword)) {
            if(empty($username)){
            $errors["usernameError"] = "Value is required";
            }
            if(empty($password)) {
                $errors["passwordError"] = "Value is required";
            }
            if(empty($repeatPassword)){
                $errors["repeatPasswordError"] = "Value is required";
            }
            if(!is_null($userdao->getByUsername($username))){
                $errors["usernameError"] = "Username taken";
            }
        }
        else {
            if($password != $repeatPassword) {
                $errors["repeatPasswordError"] = "Passwords do not match";
            }
            if(!is_null($userdao->getByUsername($username))){
                $errors["usernameError"] = "Username taken";
            }
        }
        
        return $errors;

        
    }
}


?>