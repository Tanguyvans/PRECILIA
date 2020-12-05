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

        <?php
        $ID = $_GET['ID'];
        if ($_GET['type'] == 'These'){
            $sql = "SELECT * FROM these WHERE IDThese = '$ID'";
            $result = $bdd->query($sql);
        }

        if ($_GET['ID'] != null){
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
            <tr><td>Date de defence:</td><td><?php echo $ligne['DateDefence'];?></td></tr>
            <tr><td>IDPMatricule:</td><td><?php echo $ligne['IDPMatricule'];?></td></tr>

        </table>
        <?php } ?>

        <?php include '../templates/footer.php' ?>
    </body>
</html>
