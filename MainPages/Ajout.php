<?php
if(isset($_SESSION['Psession'])){
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

  <div id="toutAj">

      <div class="hautAj">
          <?php include '../templates/header.php' ?>
      </div>

      <div id="milieuAj">
          <div class="toolbarAj">
              <?php include '../templates/toolbar.php' ?>

          </div>



          <div class="EnsembleAj">

                <div class="container-choix-creationAj">
                    <a href="Ajout.php?f=../Formulaires/createCours">Cours</a>
                    <a href="Ajout.php?f=../Formulaires/createEtudiant">Etudiant</a>
                    <a href="Ajout.php?f=../Formulaires/createEvenement">Evenement</a>
                    <a href="Ajout.php?f=../Formulaires/createLieu">Lieu</a>
                    <a href="Ajout.php?f=../Formulaires/createPersonnel">Personnel</a>
                    <a href="Ajout.php?f=../Formulaires/createProjetDeRecherche">ProjetDeRecherche</a>
                    <a href="Ajout.php?f=../Formulaires/createStageEnEntreprise">StageEntreprise</a>
                    <a href="Ajout.php?f=../Formulaires/createStageRecherche">StageRecherche</a>
                    <a href="Ajout.php?f=../Formulaires/createTFE">TFE</a>
                    <a href="Ajout.php?f=../Formulaires/createThese">These</a>
                </div>

                <div class="phpAj">
                    <?php
                    error_reporting(0);
                    if ($_GET['f']) {include ($_GET['f'].".php");}
                    ?>
                </div>
          </div>

      </div>

      <div class="basAj">
          <?php include '../templates/footer.php' ?>
      </div>

  </div>
 </body>
</html>
    <?php
}
else header("location: Accueil.php");
?>