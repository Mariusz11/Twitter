<?php

include 'library.php';

$nick = $_SESSION['email'];
if(!$nick){
       header("Location: index.php"); 
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
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand">Twitter</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="mainPage.php">Home</a></li>
                <li><a href="userTweets.php">Wszyscy użytkownicy</a></li>
                <li><a href="myProfile.php">Mój profil</a></li>
                <li><a href="myMessages.php">Wiadomości</a></li>
                <li><a href="logOut.php">Wyloguj</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a>Witaj <?php echo $nick; ?></a></li>
              </ul>
            </div>
        </nav>
        <div class="container">
            .<br><br><br><br>
            

            
            <?php
               $userTweet = new User();
               $userTweet->loadAllUsers($connection);
            ?>

        </div>  
    </body>
</html>