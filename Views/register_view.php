<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>
</head>
<body>
    
    <h1>Todolist</h1>

    <form action="register.php" method="post">
        <?php if(isset($_SESSION["registerErrors"]["usernameError"])){ echo $_SESSION["registerErrors"]["usernameError"];} ?>
        <input type="text" placeholder="Username" name="register_username">
        <input type="password" placeholder="Password" name="register_password">
        <input type="password" placeholder="Repeat Password" name="register_repeatpassword">
        <button type="submit" name="register_submit">Register</button>
    </form>

</body>
</html>