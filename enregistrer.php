<?php
require_once "conn.php";
if (isset($_POST['nom']) && isset($_POST['animal']) && isset($_POST['prix']) && isset($_POST['tab']) && isset($_FILES['photo'])) {
    $nom = $_POST['nom'];
    $animal = $_POST['animal'];
    $prix = $_POST['prix'];
    $type = $_POST['tab'];
    $photo = $_FILES['photo']['tmp_name'];

    if (empty($nom) || empty($animal) || empty($prix) || empty($type)) {
        echo "You gotta fill in required fields";
    } else {
        $photo=$_FILES['photo']['name'];
        move_uploaded_file($fichierTemp, 'images/'.$_FILES['photo']['name']);

        $req = "INSERT INTO $type (`nom`, `animal`, `photo`, `prix`) VALUES ('$nom', '$animal', '$photo', '$prix')";
        $conn->exec($req);
        header('location: admin.php');
    }
} else {
    echo "You gotta fill in required fields";
}
?>
