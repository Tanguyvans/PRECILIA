<!DOCTYPE html>
<html lang="fr">

    <head>

    </head>
    <body>
        <?php include '../templates/header.php' ?>

        <form action = '' method = 'post'>
            <input type = 'submit' value = 'These' name='BtnThese'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'ProjetDeRecherche' name='ProjetDeRecherche'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'StageEnEntreprise' name='StageEnEntreprise'>
        </form>

        <?php
            if (isset($_POST['BtnThese'])) {
              include '../Formulaires/affichageThese.php';
            }
        ?>
        <?php
            if (isset($_POST['ProjetDeRecherche'])) {
              include '../Formulaires/affichageProjetDeRecherche.php';
            }
        ?>
        <?php
            if (isset($_POST['StageEnEntreprise'])) {
              include '../Formulaires/affichageStageEnEntreprise.php';
            }
        ?>

        <?php include '../templates/footer.php' ?>
    </body>

</html>
