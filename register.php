<?php

include 'library.php';

if(isset($_SESSION['email'])){
       header("Location: mainPage.php"); 
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
            <form class="col-sm-4" method="POST" action="index.php">
                    <div class="form-group">
                      <label for="email">Email address:</label>
                      <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                      <label for="email">Repeat password:</label>
                      <input type="password" class="form-control" name="repeatPassword">
                    </div>

                    <div class="form-group">
                      <label for="email">Name:</label>
                      <input type="email" class="form-control" name="name">
                    </div>

                    <input type="submit" class="btn btn-default" name="register" value="Zarejestruj się">
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Zaloguj</a>            
            </form>
       </div>
        
        
        
    </body>
</html>
