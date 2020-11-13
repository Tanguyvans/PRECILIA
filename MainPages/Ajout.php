<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"> <!--adaptive response to the width of the device-->

        <title>PRESCILIA - Ajout</title>
        <meta content="" name="descriptison"> <!--Description du site lors de la recherche-->
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/ajout.css"/>
    </head>
<!--==========================================
Description de la page
=============================================-->
    <body>
    <?php include '../templates/header.php' ?>
    <div class="container-choix-creation">

        <a href="Ajout.php?f=../Formulaires/createCours">Cours</a>
        <a href="Ajout.php?f=../Formulaires/createEtudiant">Etudiant</a>
        <a href="Ajout.php?f=../Formulaires/createEvenement">Evenement</a>
        <a href="Ajout.php?f=../Formulaires/createLieu">lieu</a>
        <a href="Ajout.php?f=../Formulaires/createPersonnel">Personnel</a>
        <a href="Ajout.php?f=../Formulaires/createProjetDeRecherche">ProjetDeRecherche</a>
        <a href="Ajout.php?f=../Formulaires/createStageEnEntreprise">StageEntreprise</a>
        <a href="Ajout.php?f=../Formulaires/createStageRecherche">StageRecherche</a>
        <a href="Ajout.php?f=../Formulaires/createTFE">TFE</a>
        <a href="Ajout.php?f=../Formulaires/createThese">These</a>

        <?php
        error_reporting(0);
        if ($_GET['f']) {include ($_GET['f'].".php");}
        ?>

    </div>

    <?php include '../templates/footer.php' ?>
    </body>
</html>