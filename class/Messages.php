<?php

class Messages {
    
    private $id;
    private $email;
    private $sender;
    private $message;
    private $date;
    private $readed;
    

    
    public function __construct() 
    {
        $this->id = -1;
        $this->email = "";
        $this->sender = "";
        $this->message = ""; 
        $this->date = ""; 
        $this->readed = ""; 
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
    
    public function setSender($sender)
    {
        $this->sender = $sender;
    }
    
    public function getSender()
    {
        return $this->sender;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setReaded($readed)
    {
        $this->readed = $readed;
    }
    
    public function getReaded()
    {
        return $this->readed;
    }
    
    public function saveToDb(mysqli $connection)
    {
        if($this->id == -1){

            if($this->email==$this->sender){
                die ('Nie możesz wysłać do siebie wiadomości');
            }
            
            $sql = "INSERT INTO Messages (email, sender, message, date, readed)
                        VALUES ('$this->email','$this->sender', '$this->message', '$this->date', '$this->readed') ";
            
            $result = $connection->query($sql);
            var_dump($sql);

            if (!$result || $connection->error) {
                die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
            }return $result;
            
                        
            if($result == true){
                $this->id = $connection->insert_id;
                return true;
            }    
            
        }    return false;   
    }
    
    static public function loadAllMySendMessages(mysqli $connection, $sender)
    {

        $sql = "SELECT * FROM Messages WHERE sender='$sender'";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows > 0){
            echo '<div class="media">';
            foreach($result as $row){
            $loadedUser = new Messages();
            $loadedUser->id = $row['id'];
            $loadedUser->email = $row['email'];
            $loadedUser->sender = $row['sender'];
            $loadedUser->message = $row['message'];
            $loadedUser->date = $row['date'];
            $loadedUser->readed = $row['readed'];
            $ret[] = $loadedUser;

                echo <<<EOT
                <div class="media-body">
                    <h5 class="media-heading">Message to 
                        <a href='showTweets.php?id={$row['email']}'>{$row['email']}</a>
                        <small><i> {$row['date']}</i></small>
                    </h5>
                    <p>{$row['message']}</p>
                </div><br>
EOT;
            }
            echo '</div>';
            return $ret;
            
        } 
        
        echo "Brak tweetów";
        return null;
                        
    }
    
    static public function loadAllMyMessages(mysqli $connection, $email)
    {
        
        $sql = "SELECT * FROM Messages WHERE email='$email'";
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows > 0){
            echo '<div class="media">';
            foreach($result as $row){
            $loadedUser = new Messages();
            $loadedUser->id = $row['id'];
            $loadedUser->email = $row['email'];
            $loadedUser->sender = $row['sender'];
            $loadedUser->message = $row['message'];
            $loadedUser->date = $row['date'];
            $loadedUser->readed = $row['readed'];
            $ret[] = $loadedUser;

                echo <<<EOT
                <div class="media-body">
                    <h5 class="media-heading">Message from 
                        <a href='showTweets.php?id={$row['sender']}'>{$row['sender']}</a>
                        <small><i> {$row['date']}</i></small>
                    </h5>
                    <p>{$row['message']}</p>
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
