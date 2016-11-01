<?php

 
class Comments{
    
    private $id;
    private $email;
    private $tweet_id;
    private $date;
    private $comment;
    

    
    public function __construct() 
    {
        $this->id = -1;
        $this->email = "";
        $this->tweet_id = "";
        $this->date = ""; 
        $this->comment = "";
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
    
    public function setTweetId($tweet_id)
    {
        $this->tweet_id = $tweet_id;
    }
    
    public function getTweetId()
    {
        return $this->tweet_id;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    public function getComment()
    {
        return $this->comment;
    }
    
    public function saveToDb(mysqli $connection)
    {
        if($this->id == -1){

            $sql = "INSERT INTO Comments (email, tweet_id, date, comment)
                        VALUES ('$this->email','$this->tweet_id','$this->date', '$this->comment') ";
            $sql = $connection->real_escape_string($sql);
            
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
    
    static public function loadAllCommentsByTweetId(mysqli $connection, $tweet_id)
    {
        $tweet_id = $connection->real_escape_string($tweet_id);
        $sql = "SELECT * FROM Comments WHERE tweet_id='$tweet_id'";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows > 0){
            
            echo '<div class="media">';            
            foreach($result as $row){
                $loadedUser = new Comments();
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser->tweet_id = $row['tweet_id'];
                $loadedUser->date = $row['date'];
                $loadedUser->comment = $row['comment'];
                $ret[] = $loadedUser;
                echo '<div class="col-sm-1"></div>';
                echo <<<EOT
                    <div class="media-body">
                        <h5 class="media-heading">
                            <a href='showTweets.php?id={$row['email']}'>{$row['email']}</a>
                            <small><i> {$row['date']}</i></small>
                        </h5>
                        <p>{$row['comment']}</p>
                    </div><br>
EOT;

            }
            echo '</div>';
            return $ret;
            
        } 
        
        echo "Brak komentarzy";
        return null;
                        
    }

}
