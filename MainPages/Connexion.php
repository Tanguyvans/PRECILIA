<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=devicce-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Connexion</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>

    <body>
        <?php include '../templates/header.php' ?>
        <h1>Page de connexion</h1>

        <form action = 'Ajout.php' method = 'post'>
            <input type = 'submit' value = 'Connecte toi' name="connexion">
        </form>

        <?php include '../templates/footer.php' ?>
    </body>
</html>