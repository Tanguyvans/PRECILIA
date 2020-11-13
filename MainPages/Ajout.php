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
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Cours' name='BtnCours'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Etudiant' name='BtnEtudiant'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Evenement' name='BtnEvenement'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Lieu' name='BtnLieu'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Personnel' name='BtnPersonnel'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Projet de recherche' name='BtnProjetderecherche'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Stage en entreprise' name='BtnStageenentreprise'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'Stage de recherche' name='BtnStagederecherche'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'TFE' name='BtnTFE'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'These' name='BtnThese'>
        </form>
    </div>
    <?php
    if (isset($_POST['BtnCours'])) {
        require "../config.php";
        include '../Formulaires/createCours.php';
    }
    if (isset($_POST['BtnEtudiant'])) {
        require "../config.php";
        include '../Formulaires/createEtudiant.php';
    }
    if (isset($_POST['BtnEvenement'])) {
        require "../config.php";
        include '../Formulaires/BtnEvenement.php';
    }
    if (isset($_POST['BtnLieu'])) {
        require "../config.php";
        include '../Formulaires/createLieu.php';
    }
    if (isset($_POST['BtnPersonnel'])) {
        require "../config.php";
        include '../Formulaires/createPersonnel.php';
    }
    if (isset($_POST['BtnProjetderecherche'])) {
        require "../config.php";
        include '../Formulaires/createProjetDeRecherche.php';
    }
    if (isset($_POST['BtnStageenentreprise'])) {
        require "../config.php";
        include '../Formulaires/createStageEnEntreprise.php';
    }
    if (isset($_POST['BtnStagederecherche'])) {
        require "../config.php";
        include '../Formulaires/createStageRecherche.php';
    }
    if (isset($_POST['BtnTFE'])) {
        require "../config.php";
        include '../Formulaires/createTFE.php';
    }
    if (isset($_POST['BtnThese'])) {
        require "../config.php";
        include '../Formulaires/createThese.php';
    }

    ?>
    <?php include '../templates/footer.php' ?>
    </body>
</html>