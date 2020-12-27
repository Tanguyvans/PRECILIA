<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"> <!--adaptive response to the width of the device-->
    <title>PRESCILIA - Profil</title>
    <meta content="" name="descriptison"> <!--Description du site lors de la recherche-->
    <meta content="" name="keywords">
    <link href="../css/style.css" rel="stylesheet" />
</head>
<!--==========================================
Description de la page
=============================================-->
<body>

<div id="toutP">

    <div class="hautP">
        <?php include '../templates/header.php' ?>
    </div>

    <div id="milieuP">
        <div class="toolbarP">
            <?php include '../templates/toolbar.php' ?>

        </div>

        <div class="pageprincipaleP">
            <div class="texteP">
                <div class="VideP"></div>
                <div class="CentreP">

                    <?php
                    if(isset($_SESSION["Psession"])){
                        include '../includes/ProfilP.inc.php';


                    }elseif(isset($_SESSION["Esession"])){
                        include '../includes/ProfilE.inc.php';
                    }

                    ?>


                    <h2> Profil de <?php echo $Nom?> <?php echo $Prenom ?></h2>
                    <h2>  </h2>
                    <!-- Donnée-->

                    <h3>Matricule: <?php echo $Matricule?></h3>
                    <h3>Prenom: <?php echo $Prenom?></h3>
                    <h3>Nom: <?php echo $Nom?></h3>
                    <h3>Email: <?php echo $Email?></h3>

                    <?php if(isset($_SESSION["Psession"])){ ?>
                        <h3>Telephone: <?php echo $Telephone?></h3>
                        <h3>Grade: <?php echo $Grade?></h3>
                    <?php } ?>

                    <?php if(isset($_SESSION["Esession"])){ ?>
                        <h3>Annee: <?php echo $Annee?></h3>
                    <?php } ?>

                    <h3><a href="../Formulaires/modificationProfil.php"><p class="lienAffichageP">Modifier</p></a></h3>

                </div>
                <div class="VideP"></div>
            </div>
            <div class="ImageP">

                <!-- Image-->
                <?php if(isset($_SESSION["Psession"])){ ?>
                    <img src="../imageP/<?php echo $Matricule; ?>.png" />
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


        </div>

    </div>

    <div class="basP">
        <?php include '../templates/footer.php' ?>
    </div>

</div>
</body>
</html>


