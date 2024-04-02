<?php
require_once ("conn.php");
/* récupération des données du formulaire */

$name=$_POST['name'];
$pass=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql = "UPDATE customers SET FullName='$name', login='$email', password='$pass', PhoneNum='$phone', address='$address' WHERE id='{$_SESSION['user']}'";
//UPDATE `customers` SET `FullName`='$name',`login`='$email',`password`='$pass',`PhoneNum`='$phone',`address`='$address' WHERE 1
$conn->exec($sql);
header('location:espace_visiteur.php');
?>