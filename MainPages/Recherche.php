<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <!--adaptive response to the width of the device-->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>PRESCILIA - Recherche</title>
        <!--Description du site lors de la recherche-->
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <?php
        require "../config.php";
        $bdd = new PDO($dsn, $username, $password);
        ?>

        <?php include '../templates/header.php' ?>

        <div class="container-lienAffichage">
            <a href="Recherche.php?f=../Formulaires/AffichageThese"><p class="lienAffichage">These</p></a>
            <a href="Recherche.php?f=../Formulaires/AffichageProjetDeRecherche"><p class="lienAffichage">ProjetRecherche</p></a>
            <a href="Recherche.php?f=../Formulaires/AffichageStageEnEntreprise"><p class="lienAffichage">Stage en entreprise</p></a>
        </div>
        <?php
            error_reporting(0);
            if ($_GET['f']) {include ($_GET['f'].".php");}
        ?>

        <!--- Si on a selectionné une thèse -->
        <?php
        if ($_GET['table'] == 'These'){
            $ID = $_GET['ID'];
            echo $ID;
            $sql = "SELECT * FROM These WHERE IDThese = '$ID'";
            $result = $bdd->query($sql);
        ?>

            <a href="../Formulaires/modificationThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Modifier</p></a>
            <a href="../Formulaires/modificationThese.php?ID=<?php echo $ID; ?>"><p class="lienAffichage"> Supprimer</p></a>
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
            <tr><td>Date de defence:</td><td><?php echo $ligne['DateDefence'];?></td></tr>
            <tr><td>Auteur:</td>
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

        <!--- Si on a selectionné une thèse -->
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

        <?php include '../templates/footer.php' ?>
    </body>
</html>
