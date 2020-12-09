<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Recherche</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="description">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <?php include '../templates/header.php' ?>
        <div class="PageR">
            <?php
            require "../config.php";
            $bdd = new PDO($dsn, $username, $password);
            ?>
            <div class="container-lienAffichageR">
                <div><a href="Recherche.php?f=../Formulaires/AffichageThese"><p class="lienAffichageR">These</p></a></div>
                <div><a href="Recherche.php?f=../Formulaires/AffichageProjetDeRecherche"><p class="lienAffichageR">ProjetRecherche</p></a></div>
                <div><a href="Recherche.php?f=../Formulaires/AffichageStageRecherche"><p class="lienAffichageR">Stage de recherche</p></a></div>
            </div>
            <?php
                error_reporting(0);
                if ($_GET['f']) {include ($_GET['f'].".php");}
            ?>

            <!--- Si on a selectionné une thèse -->
            <?php
            if ($_GET['table'] == 'These'){
                //recuperation de l id et des infos de cette these
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM These WHERE IDThese = '$ID'";
                $result = $bdd->query($sql);
            ?>
                <!-- possibilité de MODIF ET SUPPRIMER -->
                <a href="../Formulaires/modificationThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Modifier</p></a>
                <a href="../Formulaires/suppressionThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Supprimer</p></a>

                <!-- remplissage des données-->
                <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
            <div class="Donnees">

                        <!--remplissage de la table avec la base de donnée-->
                <div class="Ligne1">
                    <div><h1>Titre:</h1><h3><?php echo $ligne['Titre'];?></h3></div>
                </div>
                <div class="Ligne2">
                    <div class="tier"><h2>Auteur:</h2>
                        <?php
                        $Matricule = $ligne['IDPMatricule'];
                        $perso = $bdd->query("SELECT Nom, Prenom FROM PERSONNEL WHERE IDPMatricule = '$Matricule' ");
                        while($line = $perso->fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <h3><?php echo $line['Nom'];?> <?php echo $line['Prenom'];?></h3>
                            <?php
                        }
                        ?></div>
                    <div class="tier"><h2>Collaboration academique:</h2><h3><?php echo $ligne['CollaborateurAcademique'];?></h3></div>
                    <div class="tier"><h2>Collaboration industrielle:</h2><h3><?php echo $ligne['CollaorateurIndustrielle'];?></h3></div>
                </div>
                <div class="Ligne3">
                    <div class="tier"><h2>Date de debut:</h2><h3><?php echo $ligne['DateDebut'];?></h3></div>
                    <div class="tier"><h2>Date de fin:</h2><h3><?php echo $ligne['DateFin'];?></h3></div>
                    <div class="tier"><h2>Date de défense:</h2><h3><?php echo $ligne['DateDefence'];?></h3></div>
                </div>
                <div class="Ligne4">
                     <div><h2>Description:</h2><h3<?php echo $ligne['Description'];?></h5></div>
                </div>
                <div class="Ligne5">
                    <div class="tier"><h2>Mot cle 1:</h2><h3><?php echo $ligne['MotCle1'];?></h3></div>
                    <div class="tier"><h2>Mot cle 2:</h2><h3><?php echo $ligne['MotCle2'];?></h3></div>
                    <div class="tier"><h2>Numero de contact:</h2><h3><?php echo $ligne['NumeroContact'];?></h3></div>
                </div>


            </div>
            <?php } ?>

            <!--- Si on a selectionné un projet de recherche -->
            <?php
            if ($_GET['table'] == 'ProjetDeRecherche'){
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM ProjetDeRecherche WHERE IDProjet = '$ID'";
                $result = $bdd->query($sql);
                ?>

                <table>
                    <!-- PHP CODE pour remplir la table-->
                    <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>

                    <!--remplissage de la table avec la base de donnée-->
                    <tr><td>Titre:</td><td><?php echo $ligne['Titre'];?></td></tr>
                    <tr><td>Date de debut:</td><td><?php echo $ligne['DateDebut'];?></td></tr>
                    <tr><td>Date de fin:</td><td><?php echo $ligne['DateFin'];?></td></tr>
                    <tr><td>Description:</td><td><?php echo $ligne['Description'];?></td></tr>
                    <tr><td>Collaboration academique:</td><td><?php echo $ligne['CollaborateurAcademique'];?></td></tr>
                    <tr><td>Collaboration industrielle:</td><td><?php echo $ligne['CollaborateurIndustrielle'];?></td></tr>
                    <tr><td>Numero de contact:</td><td><?php echo $ligne['NumeroContact'];?></td></tr>
                    <tr><td>Mot cle 1:</td><td><?php echo $ligne['MotCle1'];?></td></tr>
                    <tr><td>Mot cle 2:</td><td><?php echo $ligne['MotCle2'];?></td></tr>
                        <?php
                        $Matricule = $ligne['IDPMatricule'];
                        $perso = $bdd->query("SELECT Nom, Prenom FROM PERSONNEL WHERE IDPMatricule = '$Matricule' ");
                        while($line = $perso->fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <td><?php echo $line['Nom'];?> <?php echo $line['Prenom'];?></td>
                            <?php
                        }
                        ?></tr>

                </table>
            <?php } ?>
        </div>
        <?php include '../templates/footer.php' ?>
    </body>
</html>
