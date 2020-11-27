<?php

if (isset($_POST[submit])){

    $IDPMatricule = $_POST["IDPMatricule"];
    $MDP = $_POST["MDP"];

    require "../config.php";
    require "../includes/functions.inc.php";

    if(emptyInputLogin($IDPMatricule, $MDP) !==false){
        echo"une case n'est pas completée";
    }

    loginUser($conn, $IDPMatricule, $MDP);

}
?>

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

        <form method="post">
            <input type="text" name="IDPMatricule" placeholder="Matricule...">
            <input type="password" name="MDP" placeholder="Password...">
            <button type="submit" name="submit">Log in</button>
        </form>

        <?php include '../templates/footer.php' ?>
    </body>
</html>