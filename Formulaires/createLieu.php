<?php

require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {

    try {

        $Ville  = $_POST['Ville'];
        $Pays = $_POST['Pays'];

        $sql = "INSERT INTO LIEU (IDLieu, Ville, Pays )
      VALUES (NULL,'$Ville','$Pays')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "../templates/header.php" ?>
<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="Ville">Ville</label>
    <input type="text" name="Ville" id="Ville">

    <label for="Pays">Pays</label>
    <input type="text" name="Pays" id="Pays">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="../index.php">Retour en arrière</a>

<?php include "../templates/footer.php" ?>
