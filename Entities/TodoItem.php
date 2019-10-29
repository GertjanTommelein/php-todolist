<?php

class TodoItem {
    private $id;
    private $description;
    private $complete;

    public function __construct($id, $description, $complete){
        $this->id = $id;
        $this->description = $description;
        $this->complete = $complete;
    }

    public function create($id, $description, $complete){
        $todoItem = new TodoItem($id, $description, $complete);
        return $todoItem;
    }

    public function getId(){ return $this->id; }
    public function getDescription(){ return $this->description; }
    public function getComplete(){ return $this->complete; }
}


?>