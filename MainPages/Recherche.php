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
    <link rel="stylesheet" href="../css/affichagetables.css"/>
</head>
<body>

    <div class="PageR">
        <?php include '../templates/header.php' ?>
        <?php
            require "../config.php";
            $bdd = new PDO($dsn, $username, $password);
        ?>
        <!-- Choix entre les 3 travaux de recherche : These, Projet de recherche, Stage de recherche-->
        <div class="container-lienAffichageR">
            <div><a href="Recherche.php?f=../Formulaires/AffichageThese"><p class="lienAffichageR">These</p></a></div>
            <div><a href="Recherche.php?f=../Formulaires/AffichageProjetDeRecherche"><p class="lienAffichageR">ProjetRecherche</p></a></div>
            <div><a href="Recherche.php?f=../Formulaires/AffichageStageRecherche"><p class="lienAffichageR">Stage de recherche</p></a></div>
        </div>
        <?php
            error_reporting(0);
            if ($_GET['f']) {include ($_GET['f'].".php");}
        ?>

        <!-- CHOIX I-->

        <!--- Si on selectionne une these en particulier dans la liste
         on fait un href vers cette page qui va afficher les informations
         sur la these choisie (&ID) -->
        <?php
            if ($_GET['table'] == 'These'){
                // On recupere l'id dans le href et on recherche toutes ses infos
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM These WHERE IDThese = '$ID'";
                $result = $bdd->query($sql);
                ?>
            <!-- Si on est connecté sur une session de personnel alors
            on peut modifier et supprimer une these-->
            <?php
                if(isset($_SESSION['Psession'])){
                ?>
                    <div class="EditR">
                        <a href="../Formulaires/modificationThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Modifier</p></a>
                        <a href="../Formulaires/suppressionThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Supprimer</p></a>
                    </div>
                    <?php
            }
            ?>

            <!-- Affichage complet de la these selectionnee -->
            <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
            <div class="DonneesR">
                <div class="Ligne1R">
                    <div class="VideHautGauche"></div>
                    <div class="TitreR"><h2><?php echo $ligne['Titre'];?></h2></div>
                    <div class="EnsembleDatesR">
                        <div class="DateR"><text>Début: <?php echo $ligne['DateDebut'];?></text></div>
                        <div class="DateR"><text>Fin: <?php echo $ligne['DateFin'];?></text></div>
                        <div class="DateR"><text>Défense: <?php echo $ligne['DateDefence'];?></text></div>
                    </div>
                </div>
                <div class="Ligne2R">
                    <text>Réalisé par
                        <?php
                        $Matricule = $ligne['IDPMatricule'];
                        $perso = $bdd->query("SELECT Nom, Prenom FROM PERSONNEL WHERE IDPMatricule = '$Matricule' ");
                        while($line = $perso->fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <?php echo $line['Nom'];?> <?php echo $line['Prenom'];?>
                            <?php
                        }
                        ?>
                        , en collaboration avec <?php echo $ligne['CollaborateurAcademique'];?>
                        et <?php echo $ligne['CollaorateurIndustrielle'];?>
                    </text>
                </div>
                <div class="Ligne3R">
                    <text> <?php echo $ligne['Description'];?></text>
                </div>
                <div class="Ligne4R">
                    <div class="tierR"><text>Mot cle 1: <?php echo $ligne['MotCle1'];?></text></div>
                    <div class="tierR"><text>Mot cle 2: <?php echo $ligne['MotCle2'];?></text></div>
                    <div class="tierR"><text>Numero de contact: <?php echo $ligne['NumeroContact'];?></text></div>
                </div>
            </div>
        <?php } ?>

        <!-- CHOIX II-->

        <!--- Si on a selectionné un projet de recherche en particulier -->
        <?php
        if ($_GET['table'] == 'ProjetDeRecherche'){
            $ID = $_GET['ID'];
            $sql = "SELECT * FROM ProjetDeRecherche WHERE IDProjet = '$ID'";
            $result = $bdd->query($sql);
            ?>

            <!-- Si on est connecté sur une session de personnel alors
            on peut modifier et supprimer un Projet de recherche-->
            <?php
            if(isset($_SESSION['Psession'])){
                ?>
                <div class="EditR">
                    <a href="../Formulaires/modificationProjetDeRecherche.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Modifier</p></a>
                    <a href="../Formulaires/supressionProjetDeRecherche.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Supprimer</p></a>
                </div>
                <?php
            }
            ?>

            <!--<div class="Ligne1R">
                <div class="VideHautGauche"></div>
                <div class="TitreR"><h1><?php echo $ligne['Titre'];?></h1></div>
                <div class="EnsembleDatesR">
                    <div class="DateR"><h3>Début: <?php echo $ligne['DateDebut'];?></h3></div>
                    <div class="DateR"><h3>Fin: <?php echo $ligne['DateFin'];?></h3></div>
                </div>
            </div>
            -->

            <table>
                <!-- PHP CODE pour remplir la table -->
                <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>

                <!--remplissage de la table avec la base de donnée-->
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

        <!-- CHOIX III-->
        <?php
        if ($_GET['table'] == 'StageRecherche'){
            $ID = $_GET['ID'];
            $sql = "SELECT * FROM stagederecherche WHERE IDStageRecherche = '$ID'";
            $result = $bdd->query($sql);
            ?>
            <?php
            if(isset($_SESSION['Psession'])){
                ?>
                <div class="EditR">
                    <a href="../Formulaires/modificationStageRecherche.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Modifier</p></a>
                    <a href="../Formulaires/suppressionStageDeRecherche.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Supprimer</p></a>
                </div>
                <?php
            }
            ?>
            <table>
                <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
                <tr><td>Date de debut:</td><td><?php echo $ligne['DateDebut'];?></td></tr>
                <tr><td>Date de fin:</td><td><?php echo $ligne['DateFin'];?></td></tr>
                <tr><td>Description:</td><td><?php echo $ligne['Description'];?></td></tr>
                <tr><td>Collaboration academique:</td><td><?php echo $ligne['CollaborateurAcademique'];?></td></tr>
                <tr><td>Collaboration industrielle:</td><td><?php echo $ligne['CollaborateurIndustrielle'];?></td></tr>
                <tr><td>Numero de contact:</td><td><?php echo $ligne['NumeroContact'];?></td></tr>
                <tr><td>Mot cle 1:</td><td><?php echo $ligne['MotCle1'];?></td></tr>
                <tr><td>Mot cle 2:</td><td><?php echo $ligne['MotCle2'];?></td></tr>
            </table>
        <?php } ?>
        <?php include '../templates/footer.php' ?>
    </div>

</body>
</html>