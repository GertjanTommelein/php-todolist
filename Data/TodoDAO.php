<?php
require_once('Entities/TodoItem.php');
require_once('Config/DBConfig.php');

class TodoDAO {

    public function addTodo($userId ,$description ){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into list_items (user_id, description) values (:userId, :description)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":userId" => $userId, ":description" => $description));

    }
    public function updateTodo(){

    }

    public function updateTodoCompleted($userId ,$todoId, $complete){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "UPDATE list_items SET complete = :complete WHERE user_id = :userId AND id = :todoId";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":complete" => $complete, ":userId" => $userId, ":todoId" => $todoId));
    }

    public function deleteTodo($userId, $todoId){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "DELETE FROM list_items where user_id = :userId AND id = :todoId";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":userId" => $userId, ":todoId" => $todoId));

    }

    public function getTodos($userId){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from list_items where user_id = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":userId" => $userId));
        $dbTodos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todos = array();
        foreach($dbTodos as $dbTodo){
            $todo = new TodoItem($dbTodo["id"], $dbTodo["description"], $dbTodo["complete"]);
            array_push($todos, $todo);
        }
        return $todos;
    }
}

?>