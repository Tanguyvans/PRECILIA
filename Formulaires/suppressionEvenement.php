<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style.css"/>
<?php
require "../config.php";
require "../includes/functions.inc.php";
$bdd = new PDO($dsn, $username, $password);
if (isset($_POST['submit'])) {
    try {
        $ID = $_GET['ID'];
        $sql = "DELETE FROM evenement WHERE IDEvenement='$ID'";
        $Resultat = $bdd->exec($sql);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

if (isset($_POST['quitter'])) {
    header("location: ../MainPages/Evenements.php?table=none");
}

include '../templates/header.php';
?>

<H4>
    Etês-vous sûr de vouloir supprimer cette thèse?
</H4>

<form method="post">
    <input type="submit" name="submit" value="Supprimer">

    <input type="submit" name="quitter" value="quitter">
</form>

<?php include '../templates/footer.php'; ?>
</html>