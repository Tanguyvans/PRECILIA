<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../../css/style.css"/>
    <?php
    require "../config.php";
    require "../includes/functions.inc.php";
    $bdd = new PDO($dsn, $username, $password);
    ?>

    <?php
    if (isset($_POST['submit'])) {
        try {
            $IDProjet = $_GET['ID']; //recuperation de ID par url
            $titre = $_POST['Titre']; //recuperation info du formulaire
            $DateDebut = $_POST['DateDebut'];
            $DateFin = $_POST['DateFin'];
            $Description = $_POST['Description'];
            $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
            $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
            $NumeroContact = $_POST['NumeroContact'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];
            $IDPMatricule = $_POST['IDPMatricule'];

            if (ifModif($titre)) {
                $sql = "UPDATE projetderecherche SET Titre='$titre' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateDebut)) {
                $sql = "UPDATE projetderecherche SET DateDebut='$DateDebut' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateFin)) {
                $sql = "UPDATE projetderecherche SET DateFin='$DateFin' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Description)) {
                $sql = "UPDATE projetderecherche SET Description='$Description' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurAcademique)) {
                $sql = "UPDATE projetderecherche SET CollaborateurAcademique='$CollaborateurAcademique' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurIndustrielle)) {
                $sql = "UPDATE projetderecherche SET CollaborateurIndustrielle='$CollaborateurIndustrielle' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($NumeroContact)) {
                $sql = "UPDATE projetderecherche SET NumeroContact='$NumeroContact' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE projetderecherche SET MotCle1='$MotCle1' WHERE IDProjet='$IDProjet'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE projetderecherche SET MotCle2='$MotCle2' WHERE IDProjet='$IDProjet'";
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
        $IDProjet = $_GET['ID'];
        $Execution = $bdd->query ("SELECT * FROM ProjetdeRecherche WHERE IDProjet ='$IDProjet' ");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    while($line = $Execution->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form method="post">
            <label for="Titre">Titre</label>
            <input type="text" name="Titre" id="Titre" placeholder="<?php echo $line['Titre']?>">

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

        <a href="../MainPages/Recherche.php?f=../Formulaires/AffichageProjetDeRecherche"><p class="lienAffichage">Retour</p></a>

    <?php }
    include "../templates/footer.php";
    ?>
</html>