<?php
function verifier_session(){
    if($_SESSION["connecte"]!=="1"){
        header("location:login.php");
        exit();
    }

}
?>