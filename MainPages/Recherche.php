<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Recherche</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <?php include '../templates/header.php' ?>
        <div class="container-lienAffichage">
            <a href="Recherche.php?f=../Formulaires/AffichageThese"><p class="lienAffichage">These</p></a>
            <a href="Recherche.php?f=../Formulaires/AffichageProjetDeRecherche"><p class="lienAffichage">ProjetRecherche</p></a>
            <a href="Recherche.php?f=../Formulaires/AffichageStageEnEntreprise"><p class="lienAffichage">Stage en entreprise</p></a>
        </div>

        <?php
            error_reporting(0);
            if ($_GET['f']) {include ($_GET['f'].".php");}
        ?>

        <?php include '../templates/footer.php' ?>

        <?php
        require "../config.php";
        $bdd = new PDO($dsn, $username, $password);
        ?>

        <?php
        $ID = $_GET['ID'];
        if ($_GET['type'] == 'These'){
            $sql = "SELECT * FROM these WHERE IDThese = '$ID'";
            $result = $bdd->query($sql);
            $ligne = $result->fetch(PDO::FETCH_ASSOC);
            print_r($ligne);
        }

        ?>
    </body>

</html>
