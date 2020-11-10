<!DOCTYPE html>
<html lang="fr">
    <head>

    </head>
    <body>
        <?php include '../templates/header.php' ?>

        <h2>1. Afficher tous les clients </h2>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'These' name='BtnThese'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'ProjetDeRecherche'>
        </form>
        <form action = '' method = 'post'>
            <input type = 'submit' value = 'StageEnEntreprise'>
        </form>

        <?php
            if (isset($_POST['BtnThese'])) {
                require "../config.php";
                include '../Formulaires/affichageThese.php';
            }
        ?>
        <?php include '../templates/footer.php' ?>
    </body>
</html>



