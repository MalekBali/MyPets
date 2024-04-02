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
        <td><input type="text" name="nom" size="20" /></td>
      </tr>
      <tr>
        <td>Prix :</td>
        <td><input type="text" name="prix" size="20" /></td>
      </tr>
      <tr>
        <td>Animal :</td>
        <td><input type="text" name="animal" size="20" /></td>
      </tr>
      <tr>
        <td>Type :</td>
        <td><input type="radio" name="tab" value="accessoires" /> accessoires
          <input type="radio" name="tab" value="alimentation" /> alimentation
          <input type="radio" name="tab" value="médicaments" /> médicaments
        </td>
      </tr>
      <tr>
        <td>Photo :</td>
        <td><input type="file" name="photo" /></td>
      </tr>
    </table>
    <input type="submit" value="Ajouter" /><br />
  </form>
</body>

</html>