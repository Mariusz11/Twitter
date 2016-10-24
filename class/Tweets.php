<?php


class Tweets {
    
    private $id;
    private $email;
    private $tweet;
    private $date;
 

    
    public function __construct() 
    {
        $this->id = -1;
        $this->email = "";
        $this->tweet = "";
        $this->date = ""; 
        
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setTweet($tweet)
    {
        $this->tweet = $tweet;
    }
    
    public function getTweet()
    {
        return $this->tweet;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function saveToDb(mysqli $connection)
    {
        if($this->id == -1){

            $sql = "INSERT INTO Tweets (email, tweet, date)
                        VALUES ('$this->email','$this->tweet','$this->date') ";
            
            $result = $connection->query($sql);

            if (!$result || $connection->error) {
                die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
            }return $result;
            
                        
            if($result == true){
                $this->id = $connection->insert_id;
                return true;
            }    
            
        }    return false;   
    }
    
    static public function loadAllTweetsByEmail(mysqli $connection, $email)
    {
        
        $sql = "SELECT * FROM Tweets WHERE email='$email'";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows > 0){
            echo '<div class="media">';
            foreach($result as $row){
            $loadedUser = new Tweets();
            $loadedUser->id = $row['id'];
            $loadedUser->email = $row['email'];
            $loadedUser->tweet = $row['tweet'];
            $loadedUser->date = $row['date'];
            $ret[] = $loadedUser;
            
            //skrypt do sprawdzania ilości komentarzy
                $numberOfComments = "SELECT * FROM Comments WHERE tweet_id={$row['id']}";
                $resultNumberOfComments = $connection->query($numberOfComments);
                
                if($resultNumberOfComments->num_rows >= 0){
                    $quantity = $resultNumberOfComments->num_rows;
                } 
            //skrypt
                echo <<<EOT
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href='showTweets.php?id={$row['email']}'>{$row['email']}</a>
                        <small><i> {$row['date']}</i></small>
                        <small> 
                            <a href="addComment.php?id={$row['id']}">
                                Comments <span class="badge">$quantity</span>
                            </a>
                        </small>
                    </h4>
                    <p>{$row['tweet']}</p>
                </div><br>
EOT;
            }
            echo '</div>';
            return $ret;
            
        } 
        
        echo "Brak tweetów";
        return null;
                        
    }
    
    static public function loadAllTweets(mysqli $connection)
    {
        
        $sql = "SELECT * FROM Tweets";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        
        
        if($result == true && $result->num_rows > 0){
            echo '<div class="media">';
            foreach($result as $row){
                $loadedUser = new Tweets();
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser->tweet = $row['tweet'];
                $loadedUser->date = $row['date'];
                $ret[] = $loadedUser;
                
                //skrypt do sprawdzania ilości komentarzy
                $numberOfComments = "SELECT * FROM Comments WHERE tweet_id={$row['id']}";
                $resultNumberOfComments = $connection->query($numberOfComments);
                
                if($resultNumberOfComments->num_rows >= 0){
                    $quantity = $resultNumberOfComments->num_rows;
                } 
                //skrypt
                
                echo <<<EOT
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href='showTweets.php?id={$row['email']}'>{$row['email']}</a>
                        <small><i> {$row['date']}</i></small>
                        <small> 
                            <a href="addComment.php?id={$row['id']}">
                                Comments <span class="badge">$quantity</span>
                            </a>
                        </small>
                    </h4>
                    <p>{$row['tweet']}</p>
                </div><br>
EOT;
            }
            echo '</div>';
            return $ret;
        } 
        
        echo "błąd";
        return null;
                        
    }
    
    static public function loadTweetsById(mysqli $connection, $id)
    {
        
        $sql = "SELECT * FROM Tweets WHERE id='$id'";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows == 1){
            echo '<div class="media">'; 
            foreach($result as $row){
            $loadedUser = new Tweets();
            $loadedUser->id = $row['id'];
            $loadedUser->email = $row['email'];
            $loadedUser->tweet = $row['tweet'];
            $loadedUser->date = $row['date'];
            $ret[] = $loadedUser;
                echo <<<EOT
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href='showTweets.php?id={$row['email']}'>{$row['email']}</a>
                            <small><i> {$row['date']}</i></small>
                        </h4>
                        <p>{$row['tweet']}</p>
                    </div><br>
EOT;

            }
            echo '</div>';
            return $ret;
            
        } 
        
        echo "Brak tweetów";
        return null;
                        
    }
    
    
    

    
}
