<?php
require_once "conn.php";
if(isset($_GET['id_etd'])&&isset($_GET['produit'])){
    $id_etd=$_GET['id_etd'];
    $tab=$_GET['produit'];
    $sql = "SELECT * FROM $tab where id='$id_etd'";
    $result = $conn->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    if (count($data)===1){
        $nom=$data[0]["nom"];
        $prix=$data[0]["prix"];
        $animal=$data[0]["animal"];
        $photo=$data[0]["photo"];
      }
    
}
?>
<?php
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

<!DOCTYPE html>
<html>

<head>
  <title>Partie administration</title>
</head>

<body>
  <h1>Partie administration</h1>

  <form action="enregistrer.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Nom :</td>
        <td><input type="text" name="nom" size="20" value="<?php echo($nom)?>" /></td>
      </tr>
      <tr>
        <td>Prix :</td>
        <td><input type="text" name="prix" size="20"  value="<?php echo($prix)?>" /></td>
      </tr>
      <tr>
        <td>Animal :</td>
        <td><input type="text" name="animal" size="20" value="<?php echo($animal)?>" /></td>
      </tr>
      <tr>
        <td>Type :</td>
        <td><input type="radio" name="tab" value="accessoires" value="<?php echo($tab)?>" /> accessoires
          <input type="radio" name="tab" value="alimentation"  value="<?php echo($tab)?>"/> alimentation
          <input type="radio" name="tab" value="médicaments"  value="<?php echo($tab)?>"/> médicaments
        </td>
      </tr>
      <tr>
        <td>Photo :</td>
        <td><input type="file" name="photo" value="<?php echo($photo)?>" /></td>
      </tr>
    </table>
    <input type="submit" value="Ajouter" /><br />
  </form>
</body>

</html>