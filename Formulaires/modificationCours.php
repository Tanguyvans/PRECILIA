<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style.css"/>
    <?php
    require "../config.php";
    require "../includes/functions.inc.php";
    $bdd = new PDO($dsn, $username, $password);
    ?>
    <?php
    if (isset($_POST['submit'])) {
        try {
            $IDCours  = $_GET['ID'];
            $NombreCredit = $_POST['NombreCredit'];
            $NombreHeure = $_POST['NombreHeure'];
            $Titulaire = $_POST['Titulaire'];
            $UE = $_POST['UE'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];

            if (ifModif($NombreCredit)) {
                $sql = "UPDATE Cours SET NombreCredit='$NombreCredit' WHERE IDCours='$IDCours'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($NombreHeure)) {
                $sql = "UPDATE Cours SET NombreHeure='$NombreHeure' WHERE IDCours='$IDCours'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Titulaire)) {
                $sql = "UPDATE Cours SET Titulaire='$Titulaire' WHERE IDCours='$IDCours'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($UE)) {
                $sql = "UPDATE Cours SET UE='$UE' WHERE $IDCours='IDCours'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE Cours SET MotCle1='$MotCle1' WHERE IDCours='$IDCours'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE Cours SET MotCle2='$MotCle2' WHERE IDCours='$IDCours'";
                $Resultat = $bdd->exec($sql);
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    include "../templates/header.php";
    try {
        $IDCours = $_GET['ID'];
        $Execution = $bdd->query ("SELECT * FROM Cours WHERE IDCours ='$IDCours' ");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    while($line = $Execution->fetch(PDO::FETCH_ASSOC)){
        ?>

        <form method="post">
            <label for="NombreCredit">Nombre de crédit</label>
            <input type="number" name="NombreCredit" id="NombreCredit" placeholder="<?php echo $line['NombreCredit']?>">

            <label for="NombreHeure">Nombre d'heure</label>
            <input type="number" name="NombreHeure" id="NombreHeure" placeholder="<?php echo $line['NombreHeure']?>">

            <label for="Titulaire">Titulaire</label>
            <input type="text" name="Titulaire" id="Titulaire" placeholder="<?php echo $line['Titulaire']?>">

            <label for="UE">Nom de l'UE</label>
            <input type="text" name="UE" id="UE" placeholder="<?php echo $line['UE']?>">

            <label for="MotCle1">Mot-clé 1</label>
            <input type="text" name="MotCle1" id="MotCle1" placeholder="<?php echo $line['MotCle1']?>">

            <label for="MotCle2">Mot-clé 2</label>
            <input type="text" name="MotCle2" id="MotCle2" placeholder="<?php echo $line['MotCle2']?>">

            <input type="submit" name="submit" value="Submit">
        </form>

        <!-- retour faire l affichage des theses -->
        <a href="../MainPages/Recherche.php?f=../Formulaires/AffichageThese"><p class="lienAffichage">Retour</p></a>

    <?php }
    include "../templates/footer.php";
    ?>
</html>
