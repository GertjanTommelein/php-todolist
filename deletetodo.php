<?php
session_start();
require_once('Business/TodoService.php');
require_once('Business/UserService.php');

$userSvc = new UserService();
$todoSvc = new TodoService();

if(isset($_GET["todo_id"]) && isset($_SESSION["loggedin"])){
    $userId = $userSvc->getByUsername($_SESSION["loggedin"])->getId();
    $todoSvc->deleteTodo($userId, $_GET["todo_id"]);
    header("location: index.php");
}


?>