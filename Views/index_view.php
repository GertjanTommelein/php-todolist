<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP todolist</title>

    <style>
        body {
            background-color:aquamarine;
            padding:0;
            margin:0;
        }
        .container {
            margin:0 auto;
            max-width:400px;
            min-height:350px;
            border: 1px solid #4780c1;
            border-radius:5px;
            margin-top:5rem;
            background-color:white;
        }
        input {
            width:80%;
            height:1.9rem;
            font-size:1.2rem;
            padding-left:0.3rem;
        }
        button {
            width:calc(20% - 0.31rem);
            padding:5px 0;
            padding-top:6px;
            margin-left:-8px;
            font-size:1.2rem;
            margin-top:-1px;
            background-color: #0f9bf7;
            color: #ffbf49;
            border-color:#0f9bf7;
            border-top-right-radius: 4px;
        }
        .logout {
            position:absolute;
            right:0rem;
            color:red;
            background-color:#333;
            padding:7px 15px;
            border-bottom-left-radius: 5px;

        }
        a {
            text-decoration:none;
            color:inherit;
        }
        .list-item {
            display:flex;
            position:relative;
            align-items:center;
            padding:0.7rem 0.3rem;
            font-size:1.2rem;
            border-bottom: 1px solid #c3bfbf;
            word-break: break-all;
            padding-right: 5rem;
        }
        input[type="checkbox"] {
            width:1.9rem;
            position:absolute;
            right:1.2rem;
        }
        input[type="checkbox"]:checked + span{
            text-decoration: line-through;
        }
        .delete {
            position: absolute;
            right: 3px;
            color: red;
            cursor: pointer;
        }
        input[type="checkbox"] ~ .delete {
            display:none;
        }
        input[type="checkbox"]:checked ~ .delete {
            display:block;
        }
        
    </style>
</head>
<body>
    <?php 
        print("<div>Welcome, ". $_SESSION["loggedin"]. "<a href='logout.php'><span class='logout'>logout</span></a></div>");
        
    ?>

    <div class="container">
        <div class="top">
            <form action="addtodo.php" method="post">
                <input type="text" name="todo_description" placeholder="Write your task here">
                <button name="add_button">Add</button>
            </form>
        </div>
        <div class="bottom">
            <?php if(!empty($todos)){
                foreach($todos as $todo){?>
                    
                    <div class="list-item" id="<?php echo $todo->getId(); ?>"><input class="checkbox" type="checkbox" <?php $todo->getComplete() == 0 ? print("") : print("checked") ?>><span><?php echo $todo->getDescription(); ?></span><span class="delete" title="delete this todo"><a href="deletetodo.php?todo_id=<?php echo $todo->getId(); ?>">X</a></span></div>
                    <!--print("<div class='list-item'>". $todo->getDescription(). "<input type='checkbox' checked=" ."</div>");-->
                <?php } 
            } ?>
        </div>
    </div>

    <script>
        const checkboxes = document.getElementsByClassName("checkbox");
        console.log(checkboxes);

        for(let i=0;i<checkboxes.length;i++){
            checkboxes[i].addEventListener("click", function(){
                console.log(this.parentElement.id ,this.checked);
                let complete;
                let formData = new FormData();
                if(this.checked){
                    complete = 1;
                }
                else {
                    complete = 0;
                }
                formData.append("todo_id", this.parentElement.id);
                formData.append("todo_complete", complete);
                httpRequest = new XMLHttpRequest();
                httpRequest.open('POST', 'updateCheckbox.php');
                httpRequest.send(formData);
                httpRequest.onreadystatechange = function(){
                    // Process the server response here.
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                        if (httpRequest.status === 200) {
                            //alert(httpRequest.responseText);
                        } else {
                            alert('There was a problem with the request.');
                        }
                    }
                }
                
            });
        }
    </script>
</body>
</html>