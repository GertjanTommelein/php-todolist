<?php
session_start();
require_once('Business/UserService.php');
require_once('Business/TodoService.php');
$todoSvc = new TodoService();
$userSvc = new UserService();
if(isset($_SESSION["loggedin"])){
    $userId = $userSvc->getByUsername($_SESSION["loggedin"])->getId();
    $todos = $todoSvc->getTodos($userId);


    include('Views/index_view.php');
}
else {
    print("ERROR - You have to be logged in to view this page, please <a href='login.php'> login</a>.");
}

?>