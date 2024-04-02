<?php
session_start(); 

try{
    $conn= new PDO ('mysql:host=localhost;dbname=animaux','root','');
}
catch(PDOException $e){
    print "Erreur!:" .$e -> getMessage()  ;
}

?>