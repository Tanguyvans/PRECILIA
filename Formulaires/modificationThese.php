<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../css/style.css"/>
    <?php
    require "../config.php";
    require "../includes/functions.inc.php";
    $bdd = new PDO($dsn, $username, $password);
    ?>

    <?php
    // quand l'utilisateur valide le formulaire
    if (isset($_POST['submit'])) {
        try {
            $IDThese = $_GET['ID']; //recuperation de ID par url
            $Titre = $_POST['Titre']; //recuperation info du formulaire
            $DateDebut = $_POST['DateDebut'];
            $DateFin = $_POST['DateFin'];
            $Description = $_POST['Description'];
            $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
            $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
            $NumeroContact = $_POST['NumeroContact'];
            $MotCle1 = $_POST['MotCle1'];
            $MotCle2 = $_POST['MotCle2'];
            $DateDefence = $_POST['DateDefence'];

            if (ifModif($Titre)) { //modification que des champs modifiés par l utilisateur
                $sql = "UPDATE these SET Titre='$Titre' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateDebut)) {
                $sql = "UPDATE these SET DateDebut='$DateDebut' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateFin)) {
                $sql = "UPDATE these SET DateFin='$DateFin' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Description)) {
                $sql = "UPDATE these SET Description='$Description' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurAcademique)) {
                $sql = "UPDATE these SET CollaborateurAcademique='$CollaborateurAcademique' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($CollaborateurIndustrielle)) {
                $sql = "UPDATE these SET CollaborateurIndustrielle='$CollaborateurIndustrielle' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle1)) {
                $sql = "UPDATE these SET MotCle1='$MotCle1' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MotCle2)) {
                $sql = "UPDATE these SET MotCle2='$MotCle2' WHERE IDThese='$IDThese'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($DateDefence)) {
                $sql = "UPDATE these SET DateDefence='$DateDefence' WHERE IDThese='$IDThese'";
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
        //recuperation de l'id par l'url
        $IDThese = $_GET['ID'];
        echo $IDThese;
        //on cherche toute les infos pour cette id
        $Execution = $bdd->query ("SELECT * FROM THESE WHERE IDThese ='$IDThese' ");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
        while($line = $Execution->fetch(PDO::FETCH_ASSOC)){

        ?>
            <form method="post">
                <!-- formulaire de creation avce des placeholder pour montrer
                 a l'utilisateur ce qui existe deja dans la table-->
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

                <label for="DateDefence">Date de défense</label>
                <input type="date" name="DateDefence" id="DateDefence" placeholder="<?php echo $line['DateDefence']?>">

                <input type="submit" name="submit" value="Submit">
            </form>

    <?php }
    include "../templates/footer.php";
    ?>
</html>
