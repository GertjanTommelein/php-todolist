<?php
session_start();
use MMORTS\Validators\RegisterValidator;
require_once('Business/UserService.php');
require_once('Business/TodoService.php');
require_once('Data/UserDAO.php');
require_once('Validators/RegisterValidator.php');

$userDAO = new UserDAO();
$userSvc = NEW UserService();

if($userSvc->addUser("Booyah", "harka", "harka")) {
    echo "true";
    print_r($_SESSION["registerErrors"]);
}
else {
    echo "false";
    print_r($_SESSION["registerErrors"]);
}

$user =  $userSvc->getByUsername("Booyah");
print_r($user->getId());
echo $userSvc->getByUsername($_SESSION["loggedin"])->getId();

print("<br>");
$todoSvc = new TodoService();
$todos = $todoSvc->getTodos($user->getId());
print_r($todos); 


/*
if(count(RegisterValidator::validateRegisterForm("Booyah", "Harka", "Harka", $userDAO)) > 0) {
    echo "not empty";
    echo count(RegisterValidator::validateRegisterForm("Booyah", "Harka", "Harka", $userDAO));
    print_r(RegisterValidator::validateRegisterForm("Booyah", "Harka", "Harka", $userDAO));
}
else {
    echo "empty";
    echo count(RegisterValidator::validateRegisterForm("Booyah", "Harka", "Harka", $userDAO));
    print_r(RegisterValidator::validateRegisterForm("Booyah", "Harka", "Harka", $userDAO));
}
*/

?>