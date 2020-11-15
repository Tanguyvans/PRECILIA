<!DOCTYPE html>
<html lang="fr">

    <head>
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
    </body>

</html>
