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
            $sql = "DELETE FROM stageenentreprise WHERE IDStageEntreprise  ='$ID'";
            $Resultat = $bdd->exec($sql);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    include '../templates/header.php';
    ?>
    <H4>
        Etês-vous sûr de vouloir supprimer ce stage en entreprise?
    </H4>
    <form method="post">
        <input type="submit" name="submit" value="Supprimer">
    </form>
    <a href="../MainPages/Enseignement.php?f=../Formulaires/affichageStageEnEntreprise"><p class="lienAffichage">Retour</p></a>
    <?php include '../templates/footer.php'; ?>
</html>