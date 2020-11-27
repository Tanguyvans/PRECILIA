<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"> <!--adaptive response to the width of the device-->
    <title>PRESCILIA - Ajout</title>
    <meta content="" name="descriptison"> <!--Description du site lors de la recherche-->
    <meta content="" name="keywords">
    <link href="../css/ajout.css" rel="stylesheet" />
</head>
<!--==========================================
Description de la page
=============================================-->
<body>

<div id="tout">

    <div class="haut">
        <?php include '../templates/header.php' ?>
    </div>

    <div id="milieu">
        <div class="toolbar">
            <?php include '../templates/toolbar.php' ?>

        </div>

        Slaut
        <?php
        if(isset($_SESSION["Matricule"])){
            echo "bienvenue";
        }

        ?>



    </div>

    <div class="bas">
        <?php include '../templates/footer.php' ?>
    </div>

</div>
</body>
</html>


