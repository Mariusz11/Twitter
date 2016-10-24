<?php

include 'library.php';

    if(isset($_SESSION['email'])){
       header("Location: mainPage.php"); 
    } 

if(isset($_POST['register'])){
     $newUser = new User();
     
     $newUser->setEmail(addslashes($_POST['email']));
     $newUser->setPassword(addslashes($_POST['password']));
     $newUser->setRepeatPassword(addslashes($_POST['repeatPassword']));
     $newUser->setName(addslashes($_POST['name']));
     $newUser->SaveToDB($connection);
}

?>
<html>
    <head>
        <title>Twitter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
              crossorigin="anonymous">
    </head>
    <body>
    <div class="container"><br><br>
        <form class="col-sm-4" method="POST" action="login.php">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="email">
            </div>
            
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" name="password">
            </div>
            
            <input type="submit" class="btn btn-default" name="login" value="Zaloguj">
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php">Zarejestruj się!</a>            
        </form>
    </div>    
        
    </body>
</html>
