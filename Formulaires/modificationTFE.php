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
            $IDTFE = $_GET['ID']; //recuperation de ID par url
            $Titre = $_POST['Titre']; //recuperation info du formulaire
            $DateDebut = $_POST['DateDebut'];
            $DateFin = $_POST['DateFin'];
            $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
            $NumeroContact = $_POST['NumeroContact'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];

            if (ifModif($Titre)) {
                $sql = "UPDATE TFE SET Titre='$Titre' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateDebut)) {
                $sql = "UPDATE TFE SET DateDebut='$DateDebut' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateFin)) {
                $sql = "UPDATE TFE SET DateFin='$DateFin' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurIndustrielle)) {
                $sql = "UPDATE TFE SET CollaborateurIndustrielle='$CollaborateurIndustrielle' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE TFE SET MotCle1='$MotCle1' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE TFE SET MotCle2='$MotCle2' WHERE IDTFE='$IDTFE'";
                $Resultat = $bdd->exec($sql);
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    include "../templates/header.php";
    try {
        $IDTFE = $_GET['ID'];
        $Execution = $bdd->query ("SELECT * FROM TFE WHERE IDTFE ='$IDTFE' ");
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

        <!-- retour faire l affichage des theses -->
        <a href="../MainPages/Enseignement.php?f=../Formulaires/affichageTFE"><p class="lienAffichage">Retour</p></a>

    <?php }
    include "../templates/footer.php";
    ?>
</html>
