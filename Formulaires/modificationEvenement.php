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
        $ID = $_GET['ID']; //recuperation de ID par url
        $Nom = $_POST['Nom']; //recuperation info du formulaire
        $Acronyme = $_POST['Acronyme'];
        $Duree = $_POST['Duree'];
        $Description = $_POST['Description'];
        $MotCle1 = $_POST['MotCle1'];
        $MotCle2 = $_POST['MotCle2'];
        $DateDebut = $_POST['DateDebut'];

        if (ifModif($Nom)) { //modification que des champs modifiés par l utilisateur
            $sql = "UPDATE evenement SET Nom='$Nom' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($Acronyme)) {
            $sql = "UPDATE evenement SET Acronyme='$Acronyme' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($Duree)) {
            $sql = "UPDATE evenement SET Duree='$Duree' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($Description)) {
            $sql = "UPDATE evenement SET Description='$Description' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($MotCle1)) {
            $sql = "UPDATE evenement SET MotCle1='$MotCle1' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($MotCle2)) {
            $sql = "UPDATE evenement SET MotCle2='$MotCle2' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }
        if (ifModif($DateDebut)) {
            $sql = "UPDATE evenement SET DateDebut='$DateDebut' WHERE IDEvenement='$ID'";
            $Resultat = $bdd->exec($sql);
        }

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>

<?php
//include du header
include "../templates/header.php";
try {
    //recuperation de l'id par l'url
    $ID = $_GET['ID'];
    //on cherche toutes les infos pour cette id
    $Execution = $bdd->query ("SELECT * FROM EVENEMENT WHERE IDEvenement ='$ID' ");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
while($line = $Execution->fetch(PDO::FETCH_ASSOC)){

    ?>
    <form method="post">
        <!-- formulaire de creation avec des placeholder pour montrer
         a l'utilisateur ce qui existe deja dans la table-->
        <label for="Nom">Nom</label>
        <input type="text" name="Nom" id="Nom" placeholder="<?php echo $line['Nom']?>">

        <label for="Acronyme">Nom</label>
        <input type="text" name="Acronyme" id="Acronyme" placeholder="<?php echo $line['Acronyme']?>">

        <label for="Duree">Duree</label>
        <input type="text" name="Duree" id="Duree" placeholder="<?php echo $line['Duree']?>">

        <label for="Description">Description</label>
        <input type="text" name="Description" id="Description" placeholder="<?php echo $line['Description']?>">

        <label for="MotCle1">Mot-clé 1</label>
        <input type="text" name="MotCle1" id="MotCle1" placeholder="<?php echo $line['MotCle1']?>">

        <label for="MotCle2">Mot-clé 2</label>
        <input type="text" name="MotCle2" id="MotCle2" placeholder="<?php echo $line['MotCle2']?>">

        <label for="DateDebut">Date de début</label>
        <input type="date" name="DateDebut" id="DateDebut">

        <input type="submit" name="submit" value="Submit">
    </form>

    <!-- retour faire l affichage des theses -->
    <a href="../MainPages/Evenements.php?"><p class="lienAffichage">Retour</p></a>

<?php }
//include du footer
include "../templates/footer.php";
?>
</html>
