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
        <?php include '../templates/header.php' ?>
        <div class="PageEv">
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
                <table>
                    <!-- PHP CODE pour remplir la table-->
                    <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>

                    <!--remplissage de la table avec la base de donnée-->
                    <tr><td>Nom:</td><td><?php echo $ligne['Nom'];?></td></tr>
                    <tr><td>type:</td><td><?php echo $ligne['Type'];?></td></tr>
                    <tr><td>Acronyme:</td><td><?php echo $ligne['Acronyme'];?></td></tr>
                    <tr><td>Duree:</td><td><?php echo $ligne['Duree'];?></td></tr>
                    <tr><td>Description:</td><td><?php echo $ligne['Description'];?></td></tr>
                    <tr><td>Mot cle 1:</td><td><?php echo $ligne['MotCle1'];?></td></tr>
                    <tr><td>Mot cle 2:</td><td><?php echo $ligne['MotCle2'];?></td></tr>
                    <tr><td>Date de debut:</td><td><?php echo $ligne['DateDebut'];?></td></tr>
                    <tr><td>Lieu:</td>
                        <?php
                        $IDLieu = $ligne['IDLieu'];
                        $perso = $bdd->query("SELECT Ville, Pays FROM LIEU WHERE IDLieu = '$IDLieu' ");
                        while($line = $perso->fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <td><?php echo $line['Ville'];?> <?php echo $line['Pays'];?></td>
                            <?php
                        }
                        ?></tr>

                </table>
            <?php } ?>

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



        </div>
        <?php include '../templates/footer.php' ?>
    </body>
</html>