<!DOCTYPE html>
<html lang="fr">

    <head>

    </head>
    <body>
        <?php include '../templates/header.php' ?>

        <a href="Recherche.php?f=../Formulaires/AffichageThese">These</a>
        <a href="Recherche.php?f=../Formulaires/AffichageProjetDeRecherche">ProjetRecherche</a>
        <a href="Recherche.php?f=../Formulaires/AffichageStageEnEntreprise">Stage en entreprise</a>

        <?php
        error_reporting(0);
        if ($_GET['f']) {include ($_GET['f'].".php");}
        ?>

        <?php include '../templates/footer.php' ?>

        <?php include '../templates/footer.php' ?>
    </body>

</html>
