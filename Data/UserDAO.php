<?php
require_once('Config/DBConfig.php');
// Data Access Object - Performs the CRUD to the Database
class UserDAO {
        
    public function create($username, $password){
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO users (username, password) values (:username, :password)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':username' => $username, ':password' => $hashedPassword));


    }

    public function getAll(){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $resultSetUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userList = array();
        foreach($resultSetUsers as $user){
            $dbUser = new User($user["id"], $user["username"]);
            array_push($userList,$dbUser);
        }
        return $userList;
    }

    public function getByUsername($username){
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':username' => $username));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // check if username exists
        if(!$user){
            return null;
        }else {
            $User = new User($user["id"], $user["username"]);
            return $User;
        }
    }
    
    public function checkLogin($username, $password){
        
        $db = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':username' => $username));
        $loginUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$loginUser || !password_verify($password, $loginUser["password"])) {
            return null;
        }else {
            $user = new User($loginUser["id"], $loginUser["username"]);
            return $user;
        }
    }

    public function updateUser(){}
    
    public function deleteUser(){}

}

?>