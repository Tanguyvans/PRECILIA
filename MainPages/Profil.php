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

        <?php
        if(isset($_SESSION["Psession"])){
            include '../includes/ProfilP.inc.php';


        }elseif(isset($_SESSION["Esession"])){
            include '../includes/ProfilE.inc.php';
        }

        ?>


        <h2> Profile de <?php echo $Nom?> <?php echo $Prenom ?></h2>
        <!-- Donnée-->
        <table>
            <tr><td>Matricule:</td><td><?php echo $Matricule?></td></tr>
            <tr><td>Prenom:</td><td><?php echo $Prenom?></td></tr>
            <tr><td>Nom:</td><td><?php echo $Nom?></td></tr>
            <tr><td>Email:</td><td><?php echo $Email?></td></tr>

            <?php if(isset($_SESSION["Psession"])){ ?>
                <tr><td>Telephone:</td><td><?php echo $Telephone?></td></tr>
                <tr><td>Grade:</td><td><?php echo $Grade?></td></tr>
            <?php } ?>

            <?php if(isset($_SESSION["Esession"])){ ?>
                <tr><td>Annee:</td><td><?php echo $Annee?></td></tr>
            <?php } ?>

        </table>

        <!-- Image-->
        <?php if(isset($_SESSION["Psession"])){ ?>
            <img src="../imageP/<?php echo $Matricule; ?>.jpg" />
            <form method="POST" enctype="multipart/form-data">
                <?php require '../includes/upload.inc.php' ?>
                <input type="file" name="file">
                <button type="submit" name="submitP">UPLOAD</button>
            </form>
        <?php } ?>

        <?php if(isset($_SESSION["Esession"])){ ?>
            <img src="../imageE/<?php echo $Matricule; ?>.jpg" />
            <form method="POST" enctype="multipart/form-data">
                <?php require '../includes/upload.inc.php' ?>
                <input type="file" name="file">
                <button type="submit" name="submitE">UPLOAD</button>
            </form>
        <?php } ?>

    </div>

    <div class="bas">
        <?php include '../templates/footer.php' ?>
    </div>

</div>
</body>
</html>


