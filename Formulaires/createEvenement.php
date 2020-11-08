<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $IDEvenement = $_POST['IDEvenement'];
        $Type  = $_POST['Type'];
        $Nom = $_POST['Nom'];
        $Acronyme = $_POST['Acronyme'];
        $Duree = $_POST['Duree'];
        $Description=$_POST['Description'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];

        $DateDebut=$_POST['DateDebut'];
        $DateDebut_new = date('Y-m-d', strtotime($DateDebut));

        $IDLieu=$_POST['IDLieu'];
        echo($IDEvenement);
        echo($Type);
        echo($Nom);
        echo($Acronyme);
        echo($Duree);
        echo($Description);
        echo($MotCle1);
        echo($MotCle2);
        echo($DateDebut_new);
        echo($IDLieu);


        $sql = "INSERT INTO EVENEMENT (IDEvenement, Type, Nom, Acronyme, Duree, Description, MotCle1, MotCle2, DateDebut, IDLieu)
  			VALUES (NULL, '$Type', '$Nom', '$Acronyme', '$Duree', '$Description', '$MotCle1', '$MotCle2', '$DateDebut_new','$IDLieu')";

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

    <label for="IDEvenement">Identifiant de l'évènement</label>
    <input type="number" name="IDEvenement" id="IDEvenement">

    <label for="Type">Type d'evenement</label>
    <input type="text" name="Type" id="Type">

    <label for="Nom">Nom</label>
    <input type="text" name="Nom" id="Nom">

    <label for="Acronyme">Acronyme</label>
    <input type="text" name="Acronyme" id="Acronyme">

    <label for="Duree">Duree</label>
    <input type="text" name="Duree" id="Duree">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="IDLieu">Identifiant du lieu de l'évènement</label>
    <input type="number" name="IDLieu" id="IDLieu">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="../index.php">Retour en arrière</a>

<?php include "../templates/footer.php" ?>
