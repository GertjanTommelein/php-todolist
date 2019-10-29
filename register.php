<?php

session_start();
require_once('Business/UserService.php');

$userSvc = new UserService();

if(isset($_POST["register_submit"])) {
    if($userSvc->addUser($_POST["register_username"], $_POST["register_password"], $_POST["register_repeatpassword"])){
        header("location: login.php?register=valid");
    }else { }
}
include('views/register_view.php');
?>