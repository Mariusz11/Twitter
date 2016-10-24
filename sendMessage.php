<?php
include 'library.php';

$email = $_GET['id'];
$sender = $_SESSION['email'];
if(!$sender){
       header("Location: index.php"); 
    }


if(isset($_POST['sendMessage'])){
        
        $newMessage = new Messages();
        $newMessage->setDate(date('Y-m-d G-i-s'));
        $newMessage->setSender($sender);
        $newMessage->setEmail($email);
        $newMessage->setMessage($_POST['message']);
        $newMessage->setReaded(0);
        $newMessage->saveToDb($connection);
        header("Location: sendMessage.php?id=$sender");
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
                <li class="active"><a>Witaj <?php echo $sender; ?></a></li>
              </ul>
            </div>
        </nav>
        <div class="container">
            .<br><br><br><br>
            
            <form method="POST" action="#" class="form-inline">
                
                <div class="form-group">
                    <label>Wiadomość do: <?php echo $email; ?></label>
                    <input type="text" name="message" value="Napisz wiadomość" class="form-control">
                </div>    
                    
                <input type="submit" value="send message" name="sendMessage"class="btn btn-default">           
            </form>
 <?php
 echo '<h3>Wiadomości wysłane:</h3>';
$showMessage = new Messages();
$showMessage->loadAllMySendMessages($connection, $sender);
echo '<h3>Wiadomości odebrane</h3>';
$showMessage->loadAllMyMessages($connection, $sender);
 ?>

        </div>  
    </body>
</html>

