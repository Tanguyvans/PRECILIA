<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Membres</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>

    <body>
        <?php include '../templates/header.php' ?>
            <!-- <div class="wrapper">
            <div>Un</div>
            <div>Deux</div>
            <div>Trois</div>
            <div>Quatre</div>
            <div>Cinq</div>
            </div> -->
        <h2>Personnel</h2>
        <?php include '../Formulaires/affichagePersonnel.php'?>

        <h2>Etudiant</h2>
        <?php include '../Formulaires/affichageEtudiant.php'?>

        <?php include '../templates/footer.php' ?>
    </body>
</html>
