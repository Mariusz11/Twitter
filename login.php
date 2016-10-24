<?php

include 'library.php';

$nick = $_SESSION['email'];
    
    if(!$nick){
       header("Location: index.php"); 
    }

    $email = $_POST['email'];

    if(isset($_POST['login'])){
         $login = new User();

         $login->setEmail($_POST['email']);
         $login->setPassword($_POST['password']);
         $login->loadUserByEmail($connection, $_POST['email'], $_POST['password']);
    } else{
        echo "A Ty spryciulo, nie tak łatwo mnie zhakować ;) ";
    }


?>
    
    
    


