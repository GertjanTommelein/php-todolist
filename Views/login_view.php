<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | todolist</title>

    <style>
        body {
            padding:0;
            margin:0;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .register-success {
            
            top: 6.7rem;
            width: 100%;
            z-index: 1000;
            height: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: green;
            color: ghostwhite;
            transition: height 3s ease;
        }
        .login-error {
            
            top:6.7rem;
            width:100%;
            z-index:1000;
            height:3rem;
            display:flex;
            justify-content:center;
            align-items:center;
            background-color:red;
            color:ghostwhite;
            transition:height 3s ease;
        }
        form {
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            margin:0 auto;
            
        }
        input {
            margin-top:0.3rem;
            margin-bottom:0.3rem;
            padding: 5px 2px;
            border: 1px solid #d4cbcb;
            border-radius: 2px;
        }
        button {
            padding: 5px 15px;
            font-size: 1.2rem;
            background-color: crimson;
            color: white;
            border-color: crimson;
            border-radius: 4px;
            cursor:pointer;
        }
        h1 {
            padding-top: 3rem;
            color: crimson;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION["login_error"])){ print( "<div class='login-error' >" .$_SESSION["login_error"]. "</div>");unset($_SESSION["login_error"]); } 
        if(isset($_GET["register"]) && $_GET["register"] == "valid"){
            print("<div class='register-success'> Thank you for registering! You can now login</div>");
        }
    ?>
    <h1>Login</h1>

    <form action="login.php" method="post">
        <input type="text" name="login_username" placeholder="Username">
        <input type="password" name="login_password" placeholder="Password">
        <button type="submit" name="login_submit">login</button>
    </form>
    <span class="register-button"><a href="register.php">no account?</a></span>
</body>
</html>