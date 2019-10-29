<?php
session_start();
require_once('Business/UserService.php');

if(isset($_POST["login_submit"])) {
    $userSvc = new UserService();
    if($userSvc->isLoginValid($_POST["login_username"], $_POST["login_password"])) {
        $_SESSION["loggedin"] = $_POST["login_username"];
        unset($_SESSION["login_error"]);
        header("location: index.php");
        
    }
    else {
        $_SESSION["login_error"] = "Wrong login combination";
        header("location: login.php?error");
        exit();
        
    }
}

include('Views/login_view.php');
?>