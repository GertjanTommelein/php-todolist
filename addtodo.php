<?php
session_start();
require_once('Business/TodoService.php');
require_once('Business/UserService.php');

if(isset($_POST["add_button"])) {
    $userSvc = new UserService();
    $todoSvc = new TodoService();

    $userId = $userSvc->getByUsername($_SESSION["loggedin"])->getId();
    if(empty($_POST["todo_description"])) {
        header("location: index.php?error=valuerequired");
        exit();
    }else {
        $todoSvc->addTodo($userId, $_POST["todo_description"]);
        header("location: index.php");
        exit();
    }
    

}


?>