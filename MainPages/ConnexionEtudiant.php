<?php

if (isset($_POST["submit"])){

    $IDEMatricule = $_POST["IDEMatricule"];
    $MDP = $_POST["MDP"];

    require "../config.php";
    require "../includes/functions.inc.php";

    if(emptyInputLogin($IDEMatricule, $MDP) !==false){
        echo"une case n'est pas completée";
    }

    loginEtudiant($conn, $IDEMatricule, $MDP);

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
        <div class="PageC">

            <h1>Connexion Etudiant</h1>
            <form method="post">
                <input type="text" name="IDEMatricule" placeholder="Matricule...">
                <input type="password" name="MDP" placeholder="Password...">
                <button type="submit" name="submit">Log in</button>
            </form>

        </div>
        <?php include '../templates/footer.php' ?>
    </body>
</html>