<?php

include 'library.php';
    $nick = $_SESSION['email'];
    
    if(!$nick){
       header("Location: index.php"); 
    }

    if(isset($_POST['sendData'])){
    
        $setData = new User();
        $setData->setEmail($nick);
        $setData->setName(addslashes($_POST['name']));
        $setData->setSurname(addslashes($_POST['surname']));
        $setData->setAge(addslashes($_POST['age']));
        $setData->setCity(addslashes($_POST['city']));
        $setData->setHobby(addslashes($_POST['hobby']));
        $setData->setAboutMe(addslashes($_POST['aboutMe']));
        $setData->setData();
        header("Location: myProfile.php");
    }
    $loadData = new User();
    $i = $loadData->loadUserInfoByEmail($connection, $nick);


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
            <form class="form-horizontal" method="POST" action="myProfile.php">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Imię:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="name" value="<?php echo $i->getName(); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nazwisko:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="surname" value="<?php echo $i->getSurname(); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Wiek:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="age" value="<?php echo $i->getAge(); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Miasto:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="city" value="<?php echo $i->getCity(); ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Hobby:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="hobby" value="<?php echo $i->getHobby(); ?>">
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label class="col-sm-2 control-label">O mnie:</label>
                      <div class="col-sm-4">
                          <textarea name="aboutMe" class="form-control" rows="5" placeholder="<?php echo $i->getAboutMe(); ?>" value="<?php echo $i->getAboutMe(); ?>"></textarea>
                      </div>
                    </div>
                
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                            <input type="submit" name="sendData" class="btn btn-default" value="Wyślij">
                    </div>
              </form>
            <?php
                $loadTweet = new Tweets();
                $loadTweet->loadAllTweetsByEmail($connection, $nick);
            ?>
            
       </div>
        
        
        
    </body>
</html>

