<!DOCTYPE html>
<html>
<head>
  <title>Partie administration</title>
</head>
<body>
  <h1>Partie administration</h1>

  <?php
 require_once "conn.php";
 //recuperation accessoires
 $sql1 = "SELECT * FROM accessoires";
$result1 = $conn->query($sql1);
$data1 = $result1->fetchAll(PDO::FETCH_ASSOC);
 //recuperation alimentation
$sql2 = "SELECT * FROM alimentation";
$result2 = $conn->query($sql2);
$data2=$result2->fetchAll(PDO::FETCH_ASSOC);
// recuperation medicaments
$sql3 = "SELECT * FROM médicaments";
$result3 = $conn->query($sql3);
$data3=$result3->fetchAll(PDO::FETCH_ASSOC);
?>
<table border ='1' >
    <tr> <td> Nom </td>
        <td> Animal </td>
        <td> Prix</td>
        <td> Photo </td>
        <td> Modifier </td>
    </tr>
<?php
foreach ($data1 as $row):
?>
 <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['animal']?></td>
        <td><?=$row['prix']?></td>
        <td>  <img src= "./images/<?=$row['photo']?>" width="50" height="50">  </td>
        <td><a href="delete.php?id_etd=<?php echo $row['id'];?> ">Supprimer</a>
            <a href="modifForm.php?id_etd=<?php echo $row['id'];?>&produit=accessoires ">Modifier</a>
        </td>
  </tr>
  <?php endforeach;?>
  <?php
foreach ($data2 as $row):
?>
 <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['animal']?></td>
        <td><?=$row['prix']?></td>
        <td>  <img src= "./images/<?=$row['photo']?>" width="50" height="50">  </td>
        <td><a href="delete.php?id_etd=<?php echo $row['id'];?> ">Supprimer</a>
            <a href="modifForm.php?id_etd=<?php echo $row['id'];?>&produit=alimentation ">Modifier</a>
        </td>
  </tr>
  <?php endforeach;?>
  <?php
foreach ($data3 as $row):
?>
 <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['animal']?></td>
        <td><?=$row['prix']?></td>
        <td>  <img src= "images/<?=$row['photo']?>" width="50" height="50">  </td>
        <td><a href="delete.php?id_etd=<?php echo $row['id'];?> ">Supprimer</a>
            <a href="modifForm.php?id_etd=<?php echo $row['id'];?>&produit=médicaments ">Modifier</a>
        </td>
  </tr>
  <?php endforeach;?>
  <a href="ajoutP.php">Ajouter un produit</a>
</body>
</html>
