<?php

include 'library.php';
$nick = $_SESSION['email'];
if(!$nick){
       header("Location: index.php"); 
    }
$id = $_GET['id'];

$loadData = new User();
$i = $loadData->loadUserInfoByEmail($connection, $id);


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
            <h3><?php echo $id . '&nbsp &nbsp'; 
                 echo "<a class='glyphicon glyphicon-envelope' style='color: #d6b706' "
                . "href='sendMessage.php?id=$id'></a>" ;  ?> 
                    </h3><br>
            <p>Imię: <?php echo $i->getName(); ?></p><br>
            <p>Nazwisko: <?php echo $i->getSurname(); ?></p><br>
            <p>Wiek: <?php echo $i->getAge(); ?></p><br>
            <p>Miasto: <?php echo $i->getCity(); ?></p><br>
            <p>Hobby: <?php echo $i->getHobby(); ?></p><br>
            <p>O mnie: <?php echo $i->getAboutMe(); ?></p><br>
            
            <?php
                $myTweets = new Tweets();
                $myTweets->loadAllTweetsByEmail($connection, $id);
            ?>

        </div>  
    </body>
</html>

