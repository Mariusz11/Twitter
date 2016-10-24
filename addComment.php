<?php
include 'library.php';

$nick = $_SESSION['email'];
if(!$nick){
       header("Location: index.php"); 
    }
$id = $_GET['id'];



if(isset($_POST['sendComment'])){
        
        $newComment = new Comments();
        $newComment->setDate(date('Y-m-d G-i-s'));
        $newComment->setComment($_POST['comment']);
        $newComment->setEmail($nick);
        $newComment->setTweetId($id);
        $newComment->saveToDb($connection);
        header("Location: addComment.php?id=$id");
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
                $tweetId = new Tweets();
                $tweetId->loadTweetsById($connection, $id);
            ?>
            <div class="col-sm-1"></div>
            <form method="POST" action="#" class="form-inline">
                
                <div class="form-group">
                    <input type="text" name="comment" value="Napisz komentarz" class="form-control">
                </div>    
                    
                <input type="submit" value="send Comment" name="sendComment"class="btn btn-default">           
            </form>
            
            <?php
                $showComments = new Comments();
                $showComments->loadAllCommentsByTweetId($connection, $id);
            ?>

        </div>  
    </body>
</html>