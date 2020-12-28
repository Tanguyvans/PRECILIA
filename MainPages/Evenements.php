<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Evènements</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>

<body>
    <div class="Page">
        <?php include '../templates/header.php' ?>

        <h2>Événements </h2>
        <?php include '../Formulaires/affichageEvenement.php'?>

        <?php
        if ($_GET['table'] == 'Evenement'){
            $ID = $_GET['ID'];
            $sql = "SELECT * FROM evenement WHERE IDEvenement = '$ID'";
            $result = $bdd->query($sql);
            ?>
            <?php

            if(isset($_SESSION['Psession'])){
                ?>
                <a href="../Formulaires/modificationEvenement.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Modifier</p></a>
                <a href="../Formulaires/suppressionEvenement.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR"> Supprimer</p></a>
                <?php
            }
            ?>

            <?php
            if(isset($_SESSION['Psession'])){
                // si l'evenement est a venir
                $CurrentDate = date("Y-m-d");
                if($_GET['Date'] > $CurrentDate){
                    $IDMembre = $_SESSION['Psession'];
                    $sql = "SELECT * FROM personnel_evenement WHERE IDEvenement = '$ID' AND IDPMatricule= $IDMembre";
                    $result = $bdd->query($sql);
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);

                    if( $ligne['IDPMatricule'] == NULL){
                        ?>
                        <a href="../Formulaires/inscriptionMembreEvent.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR">inscrire</p></a>
                        <?php
                    }else {
                        ?>
                        <a href="../Formulaires/desinscriptionMembreEvent.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR">Désinscrire</p></a>
                        <?php
                    }

                }
            }
            ?>

            <?php
            if(isset($_SESSION['Esession'])){
                // si l'evenement est a venir
                $CurrentDate = date("Y-m-d");
                if($_GET['Date'] > $CurrentDate){
                    $IDMembre = $_SESSION['Esession'];
                    $sql = "SELECT * FROM etudiant_evenement WHERE IDEvenement = '$ID' AND IDEMatricule= $IDMembre";
                    $result = $bdd->query($sql);
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);

                    if( $ligne['IDEMatricule'] == NULL){
                        ?>
                        <a href="../Formulaires/inscriptionMembreEvent.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR">inscrire</p></a>
                        <?php
                    }else {
                        ?>
                        <a href="../Formulaires/desinscriptionMembreEvent.php?ID=<?php echo $ID; ?>"><p class="lienAffichageR">Désinscrire</p></a>
                        <?php
                    }

                }
            }
            ?>

                <!-- PHP CODE pour remplir la table-->
        <div class="DonneesR">
            <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
            <div class="Ligne1R">
                <div class="VideHautGauche">
                    <text>Acronyme:<?php echo $ligne['Acronyme'];?></text>
                </div>
                <div class="TitreR"><h2><?php echo $ligne['Type'];?> : <?php echo $ligne['Nom'];?></h2></div>
                <div class="EnsembleDatesR">
                    <div class="DateR"><text>Début: <?php echo $ligne['DateDebut'];?></text></div>
                    <div class="DateR"><text><?php echo $ligne['Duree'];?></text></div>
                    <div class="DateR"><text>
                        <?php
                        $IDLieu = $ligne['IDLieu'];
                        $perso = $bdd->query("SELECT Ville, Pays FROM LIEU WHERE IDLieu = '$IDLieu' ");
                        while($line = $perso->fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <td><?php echo $line['Ville'];?> <?php echo $line['Pays'];?></td>
                        </text>
                            <?php
                        }

                        ?></div>
                </div>
            </div>
            <div class="Ligne3R">
                <text><?php echo $ligne['Description'];?></text>
            </div>
            <div class="Ligne4R">
                <div class="demiEv"><text>Mot cle 1 : <?php echo $ligne['MotCle1'];?></text></div>
                <div class="demiEv"><text>Mot cle 2:<?php echo $ligne['MotCle2'];?></text></div>
            </div>
                <?php } ?>
        </div>

        <?php
        if($_GET['table'] == 'INSuccess'){
            ?>
            <h2>L'ajout a été un succès</h2>
        <?php
        }
        ?>

        <?php
        if($_GET['table'] == 'OUTSuccess'){
            ?>
            <h2>La désinscription a été un succès</h2>
            <?php
        }
        ?>

        <?php
        if($_GET['table'] == 'SuppSuccess'){
            ?>
            <h2>La suppression a été un succès</h2>
            <?php
        }
        ?>
        <div class="foot">
            <?php include '../templates/footer.php' ?>
        </div>

    </div>
</body>
</html>