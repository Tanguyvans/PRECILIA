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
            $sql = "DELETE FROM Cours WHERE IDCours='$ID'";
            $Resultat = $bdd->exec($sql);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    include '../templates/header.php';
    ?>

    <H4>
        Etês-vous sûr de vouloir supprimer ce cours?
    </H4>

    <form method="post">
        <input type="submit" name="submit" value="Supprimer">
    </form>

    <a href="../MainPages/Recherche.php?f=../Formulaires/AffichageCours"><p class="lienAffichage">Retour</p></a>

    <?php include '../templates/footer.php'; ?>
</html>