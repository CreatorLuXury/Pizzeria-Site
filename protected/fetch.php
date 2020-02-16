<?php 
    $username = "login";
    $password = "haslo";
    $host = "localhost";
    $dbName = "baza";

    $polaczenie = mysqli_connect($host,$username,$password,$dbName);
    if(!$polaczenie){
        header('Location: 404.html');
        echo "unable to connect";
        exit;
    }
    else{
//        echo "";
        }
        
?>