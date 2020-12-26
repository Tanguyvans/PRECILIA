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
            $IDStageRecherche  = $_GET['ID'];
            $DateDebut = $_POST['DateDebut'];
            $DateFin = $_POST['DateFin'];
            $Description = $_POST['Description'];
            $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
            $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
            $NumeroContact = $_POST['NumeroContact'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];

            if (ifModif($DateDebut)) {
                $sql = "UPDATE stagederecherche SET DateDebut='$DateDebut' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateFin)) {
                $sql = "UPDATE stagederecherche SET DateFin='$DateFin' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Description)) {
                $sql = "UPDATE stagederecherche SET Description='$Description' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurAcademique)) {
                $sql = "UPDATE stagederecherche SET CollaborateurAcademique='$CollaborateurAcademique' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurIndustrielle)) {
                $sql = "UPDATE stagederecherche SET CollaborateurIndustrielle='$CollaborateurIndustrielle' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($NumeroContact)) {
                $sql = "UPDATE stagederecherche SET NumeroContact='$NumeroContact' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE stagederecherche SET MotCle1='$MotCle1' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE stagederecherche SET MotCle2='$MotCle2' WHERE IDStageRecherche='$IDStageRecherche'";
                $Resultat = $bdd->exec($sql);
            }

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    ?>

    <?php
    include "../templates/header.php";
    try {
        $IDStageRecherche = $_GET['ID'];
        $Execution = $bdd->query ("SELECT * FROM stagederecherche WHERE IDStageRecherche ='$IDStageRecherche' ");
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

            <label for="Description">Description</label>
            <input type="text" name="Description" id="Description" placeholder="<?php echo $line['Description']?>">

            <label for="CollaborateurAcademique">Collababorateur académique</label>
            <input type="text" name="CollaborateurAcademique" id="CollaborateurAcademique" placeholder="<?php echo $line['CollaborateurAcademique']?>">

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

        <a href="../MainPages/Recherche.php?f=../Formulaires/affichageStageRecherche"><p class="lienAffichage">Retour</p></a>

    <?php }
    include "../templates/footer.php";
    ?>
</html>
