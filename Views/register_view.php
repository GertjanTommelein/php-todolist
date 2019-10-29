<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | todolist</title>

    <style>
        body {
            background-color:aquamarine;
        }
        h1 {
            color:crimson;
            padding-top:3rem;
            text-align:center;
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
            margin-top:0.7rem;
        }

    </style>
</head>
<body>
    
    <h1>Register</h1>

    <form action="register.php" method="post">
        <?php if(isset($_SESSION["registerErrors"]["usernameError"])){ echo $_SESSION["registerErrors"]["usernameError"];} ?>
        <input type="text" placeholder="Username" name="register_username">
        <input type="password" placeholder="Password" name="register_password">
        <input type="password" placeholder="Repeat Password" name="register_repeatpassword">
        <button type="submit" name="register_submit">Register</button>
    </form>

</body>
</html>