<?php
session_start();
require_once('Business/TodoService.php');
require_once('Business/UserService.php');
$todoSvc = new TodoService();
$userSvc = new UserService();
if(isset($_POST["todo_id"]) && isset($_POST["todo_complete"]) && isset($_SESSION["loggedin"])) {
    $todoComplete = intval($_POST["todo_complete"]);
    $todoId = intval($_POST["todo_id"]);
    $userId = $userSvc->getByUsername($_SESSION["loggedin"])->getId();
    $todoSvc->updateTodoCompleted($userId, $todoId, $todoComplete);
    
}




?>