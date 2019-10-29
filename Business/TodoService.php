<?php
require_once('Data/TodoDAO.php');

class TodoService {

    public function addTodo($userId, $description){
        $todoDAO = new TodoDAO();
        $todoDAO->addTodo($userId, $description);
    }

    public function getTodos($userId){
        $todoDAO = new TodoDAO();
       $todos = $todoDAO->getTodos($userId);
       return $todos;
    }

    public function updateTodoCompleted($userId ,$todoId, $completeValue){
        $todoDAO = new TodoDAO();
        $todoDAO->updateTodoCompleted($userId, $todoId, $completeValue);
    }

    public function deleteTodo($userId, $todoId){
        $todoDAO = new TodoDAO();
        $todoDAO->deleteTodo($userId, $todoId);
    }
}
?>