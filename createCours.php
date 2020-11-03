<?php

if (isset($_POST['submit'])) {
    require "config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $IDCours = $_POST['IDCours'];
        $NombreCredit = $_POST['NombreCredit'];
        $NombreHeure=$_POST['NombreHeure'];
        $Titulaire=$_POST['Titulaire'];
        $UE = $_POST['UE'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $IDPMatricule=$_POST['IDPMatricule'];


        $sql = "INSERT INTO COURS (IDCours, NombreCredit, NombreHeure , Titulaire, UE, MotCle1, MotCle2, IDPMatricule)
			VALUES ('$IDCours','$NombreCredit','$NombreHeure','$Titulaire','$UE','$MotCle1','$MotCle2','$IDPMatricule')";



        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "templastes/header.php" ?>
<link rel="stylesheet" href="css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDCours">Identifiant du cours</label>
    <input type="number" name="IDCours" id="IDCours">

    <label for="NombreCredit">Nombre de crédit</label>
    <input type="number" name="NombreCredit" id="NombreCredit">

    <label for="NombreHeure">Nombre d'heures</label>
    <input type="number" name="NombreHeure" id="NombreHeure">

    <label for="Titulaire">Titulaire</label>
    <input type="text" name="Titulaire" id="Titulaire">

    <label for="UE">Nom de l'UE</label>
    <input type="text" name="UE" id="UE">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="IDPMatricule">IDPMatricule</label>
    <input type="number" name="IDPMatricule" id="IDPMatricule">


    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Retour en arrière</a>

<?php include "templates/footer.php" ?>
