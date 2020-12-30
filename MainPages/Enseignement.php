<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Enseignement</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="stylesheet" href="../css/affichagetables.css"/>
    </head>
    <body>
        <?php
        require "../config.php";
        $bdd = new PDO($dsn, $username, $password);
        ?>
        <?php include '../templates/header.php' ?>
        <div class="PageEns">
            <div class="container-lienAffichageR">
                <a href="Enseignement.php?f=../Formulaires/AffichageCours"><p class="lienAffichage">Cours</p></a>
                <a href="Enseignement.php?f=../Formulaires/AffichageTFE"><p class="lienAffichage">TFE</p></a>
                <a href="Enseignement.php?f=../Formulaires/AffichageStageEnEntreprise"><p class="lienAffichage">Stage en entreprise</p></a>
            </div>
            <?php
            error_reporting(0);
            if ($_GET['f']) {include ($_GET['f'].".php");}
            ?>

            <!--- CHOIX I -->
            <?php
            if ($_GET['table'] == 'Cours'){
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM Cours WHERE IDCours = '$ID'";
                $result = $bdd->query($sql);
                ?>
                <a href="../Formulaires/modificationCours.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Modifier</p></a>
                <a href="../Formulaires/suppresionCours.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Supprimer</p></a>
                <table>
                    <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
                    <tr><td>ID:</td><td><?php echo $ligne['IDCours'];?></td></tr>
                    <tr><td>Nombre de crédit:</td><td><?php echo $ligne['NombreCredit'];?></td></tr>
                    <tr><td>Nombre d'heure:</td><td><?php echo $ligne['NombreHeure'];?></td></tr>
                    <tr><td>Titulaire:</td><td><?php echo $ligne['Titulaire'];?></td></tr>
                    <tr><td>UE:</td><td><?php echo $ligne['UE'];?></td></tr>
                    <tr><td>Mot clé 1:</td><td><?php echo $ligne['MotCle1'];?></td></tr>
                    <tr><td>Mot clé 2:</td><td><?php echo $ligne['MotCle2'];?></td></tr>
                </table>
            <?php } ?>

            <!--- CHOIX II -->
            <?php
            if ($_GET['table'] == 'StageEntreprise'){
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM stageenentreprise WHERE IDStageEntreprise  = '$ID'";
                $result = $bdd->query($sql);
                ?>
                <a href="../Formulaires/modificationStageEntreprise.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Modifier</p></a>
                <a href="../Formulaires/suppressionStageEntreprise.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Supprimer</p></a>

                <!-- Affichage complet de la these selectionnee -->

                <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
                <div class="DonneesR">
                    <div class="Ligne1R">
                        <div class="VideHautGauche"></div>
                        <div class="EnsembleDatesR">
                            <div class="DateR"><text>Début: <?php echo $ligne['DateDebut'];?></text></div>
                            <div class="DateR"><text>Fin: <?php echo $ligne['DateFin'];?></text></div>
                        </div>
                    </div>
                    <div class="Ligne2R">
                        <text>Stage réalisé par
                            <?php
                            $Matricule = $ligne['IDEMatricule'];
                            $perso = $bdd->query("SELECT Nom, Prenom FROM ETUDIANT WHERE IDEMatricule = '$Matricule' ");
                            while($line = $perso->fetch(PDO::FETCH_ASSOC))
                            {
                                ?>
                                <?php echo $line['Nom'];?> <?php echo $line['Prenom'];?>
                                <?php
                            }
                            ?>
                            , en collaboration avec <?php echo $ligne['CollaborateurIndustrielle'];?>.
                        </text>
                        <text>Responsable:
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
                        </text>
                    </div>
                    <div class="Ligne3R">
                    </div>

                    <div class="Ligne4R">
                        <div class="tierR"><text>Mot cle 1: <?php echo $ligne['MotCle1'];?></text></div>
                        <div class="tierR"><text>Mot cle 2: <?php echo $ligne['MotCle2'];?></text></div>
                        <div class="tierR"><text>Numero de contact: <?php echo $ligne['NumeroContact'];?></text></div>
                    </div>
                </div>
            <?php } ?>

            <!--- CHOIX III -->
            <?php
            if ($_GET['table'] == 'TFE'){
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM TFE WHERE IDTFE = '$ID'";
                $result = $bdd->query($sql);
                ?>
                <a href="../Formulaires/modificationTFE.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Modifier</p></a>
                <a href="../Formulaires/suppressionTFE.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Supprimer</p></a>
                <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
                <div class="DonneesR">
                    <div class="Ligne1R">
                        <div class="VideHautGauche"></div>
                        <div class="TitreR"><h2><?php echo $ligne['Titre'];?></h2></div>
                        <div class="EnsembleDatesR">
                            <div class="DateR"><text>Début: <?php echo $ligne['DateDebut'];?></text></div>
                            <div class="DateR"><text>Fin: <?php echo $ligne['DateFin'];?></text></div>
                        </div>
                    </div>
                    <div class="Ligne2R">
                        <text>Travail réalisé par
                            <?php
                            $Matricule = $ligne['IDEMatricule'];
                            $perso = $bdd->query("SELECT Nom, Prenom FROM ETUDIANT WHERE IDEMatricule = '$Matricule' ");
                            while($line = $perso->fetch(PDO::FETCH_ASSOC))
                            {
                                ?>
                                <?php echo $line['Nom'];?> <?php echo $line['Prenom'];?>
                                <?php
                            }
                            ?>
                            , en collaboration avec <?php echo $ligne['CollaborateurIndustrielle'];?>.
                        </text>
                        <text>Promotteur:
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

        </div>
        <div class="foot">
            <?php include '../templates/footer.php' ?>
        </div>

    </body>
</html>
