<?php


class User {
    
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $age;
    private $city;
    private $hobby;
    private $aboutMe;

    
    public function __construct() 
    {
        $this->id = -1;
        $this->email = "";
        $this->password = "";
        $this->name = "";
        $this->surname = -1;
        $this->age = "";
        $this->city = "";
        $this->hobby = "";
        $this->aboutMe = "";
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
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function setAge($age)
    {
        $this->age = $age;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;
    }
    
    public function getHobby()
    {
        return $this->hobby;
    }
    
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }
    
    public function getAboutMe()
    {
        return $this->aboutMe;
    }
    
    public function SaveToDb(mysqli $connection)
    {
        if($this->id == -1){

            $sql = "INSERT INTO Users(email, password, name)
                        VALUES ('$this->email', '$this->password', '$this->name')";
            $sql = $connection->real_escape_string($sql);

            $result = $connection->query($sql);

            if (!$result || $connection->error) {
                die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
            }return $result;
            
                        
            if($result == true){
                $this->id = $connection->insert_id;
                header("Location: index.php");
                return true;
            }    
            
        }    return false;   
    }
    
    static public function loadUserByEmail(mysqli $connection, $email, $password)
    {
        
        $sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
        $sql = $connection->real_escape_string($sql);

        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows == 1){
            
            $row = $result->fetch_assoc();
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->name = $row['name'];
            $loadedUser->password = $row['password'];
            $loadedUser->email = $row['email'];
            
            $_SESSION['email'] = $email;
            header("Location: mainPage.php");
            return $loadedUser;
            
        } 
        
        echo "błędny email lub hasło";
        return null;
                        
    }
    
    static public function loadAllUsers(mysqli $connection)
    {
        
        $sql = "SELECT * FROM Users";
        $sql = $connection->real_escape_string($sql);
        $ret = [];
        
        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows > 0){
            echo '<table>';
            foreach($result as $row){
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $ret[] = $loadedUser;
                echo '<tr>';
                echo "<td><a href='showTweets.php?id={$row['email']}'>{$row['email']}</a></td>";
                echo "<td>&nbsp &nbsp<a class='glyphicon glyphicon-envelope' style='color: #d6b706' "
                . "href='sendMessage.php?id={$row['email']}'>Wyślij</a></td>";
                echo '</tr>';
            }
            echo '</table>';
            return $ret;
            
        }
        
        echo "błąd";
        return null;
                        
    }
    
    public function setData(mysqli $connection)
    {
        if($this->id == -1){
            
            $sql = "UPDATE Users SET 
                    password='$this->password',
                    name='$this->name',
                    surname='$this->surname',
                    age='$this->age',
                    city='$this->city',
                    hobby='$this->hobby',
                    aboutMe='$this->aboutMe'
                    WHERE email='$this->email'";
            
            $result = $connection->query($sql);

            if (!$result || $connection->error) {
                die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
            }return $result;    
            
        }    return false;   
    }
    
    static public function loadUserInfoByEmail(mysqli $connection, $email)
    {
        
        $sql = "SELECT * FROM Users WHERE email='$email'";
        $sql = $connection->real_escape_string($sql);

        $result = $connection->query($sql);
        
        if (!$result || $connection->error) {
            die(sprintf("Połączenie nieudane. SQL: %s \n Bład: %s\n", $sql, $connection->error));
        }
        
        if($result == true && $result->num_rows == 1){
            
            $row = $result->fetch_assoc();
            $loadedUser = new User();
            $loadedUser->password = $row['password'];
            $loadedUser->name = $row['name'];
            $loadedUser->surname = $row['surname'];
            $loadedUser->age = $row['age'];
            $loadedUser->city = $row['city'];
            $loadedUser->hobby = $row['hobby'];
            $loadedUser->aboutMe = $row['aboutMe'];
            
            
            echo '<br><br><br>';
            
            
            return $loadedUser;
          
        } 
        
        echo "błędny email lub hasło";
        return null;
                        
    }
}
