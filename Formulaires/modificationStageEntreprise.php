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
            $IDStageEntreprise  = $_GET['ID'];
            $DateDebut = $_POST['DateDebut'];
            $DateFin = $_POST['DateFin'];
            $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
            $NumeroContact = $_POST['NumeroContact'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];

            if (ifModif($DateDebut)) {
                $sql = "UPDATE stageenentreprise SET DateDebut='$DateDebut' WHERE IDStageEntreprise='$IDStageEntreprise'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateFin)) {
                $sql = "UPDATE stageenentreprise SET DateFin='$DateFin' WHERE IDStageEntreprise='$IDStageEntreprise'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurIndustrielle)) {
                $sql = "UPDATE stageenentreprise SET CollaborateurIndustrielle='$CollaborateurIndustrielle' WHERE IDStageEntreprise='$IDStageEntreprise'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE stageenentreprise SET MotCle1='$MotCle1' WHERE IDStageEntreprise='$IDStageEntreprise'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE stageenentreprise SET MotCle2='$MotCle2' WHERE IDStageEntreprise='$IDStageEntreprise'";
                $Resultat = $bdd->exec($sql);
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    include "../templates/header.php";
    try {
        $IDStageEntreprise = $_GET['ID'];
        $Execution = $bdd->query ("SELECT * FROM stageenentreprise WHERE IDStageEntreprise ='$IDStageEntreprise' ");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    while($line = $Execution->fetch(PDO::FETCH_ASSOC)){

        ?>
        <form method="post">
            <label for="DateDebut">Date de début</label>
            <input type="date" name="DateDebut" id="DateDebut">

            <label for="DateFin">Date de fin</label>
            <input type="date" name="DateFin" id="DateFin">

            <label for="CollaborateurIndustrielle">Collaborateur industrielle</label>
            <input type="text" name="CollaborateurIndustrielle" id="CollaborateurIndustrielle" placeholder="<?php echo $line['CollaborateurIndustrielle']?>">

            <label for="NumeroContact">Numéro de contact</label>
            <input type="number" name="NumeroContact" id="NumeroContact" placeholder="<?php echo $line['NumeroContact']?>">

            <label for="MotCle1">Mot-clé 1</label>
            <input type="text" name="MotCle1" id="MotCle1" placeholder="<?php echo $line['MotCle1']?>">

            <label for="MotCle2">Mot-clé 2</label>
            <input type="text" name="MotCle2" id="MotCle2" placeholder="<?php echo $line['MotCle2']?>">

            <input type="submit" name="submit" value="Submit">
        </form>

        <a href="../MainPages/Enseignement.php?f=../Formulaires/affichageStageEnEntreprise"><p class="lienAffichage">Retour</p></a>

    <?php }
    include "../templates/footer.php";
    ?>
</html>
