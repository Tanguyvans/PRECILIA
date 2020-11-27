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
            <tr>
                <th>Titre</th>
                <th>Date de debut</th>
                <th>date de fin</th>
                <th>Description</th>
                <th>Collaboration academique</th>
                <th>Collaboration industrielle</th>
                <th>Numero de contact</th>
                <th>Mot cle 1</th>
                <th>Mot cle 2</th>
                <th>Date de defence</th>
                <th>IDPMatricule</th>
            </tr>
            <!-- PHP CODE pour remplir la table-->
            <?php $ligne = $result->fetch(PDO::FETCH_ASSOC); ?>
                <tr>
                    <!--remplissage de la table avec la base de donnée-->
                    <td><?php echo $ligne['Titre'];?></td>
                    <td><?php echo $ligne['DateDebut'];?></td>
                    <td><?php echo $ligne['DateFin'];?></td>
                    <td><?php echo $ligne['Description'];?></td>
                    <td><?php echo $ligne['CollaborateurAcademique'];?></td>
                    <td><?php echo $ligne['CollaborateurIndustrielle'];?></td>
                    <td><?php echo $ligne['NumeroContact'];?></td>
                    <td><?php echo $ligne['MotCle1'];?></td>
                    <td><?php echo $ligne['MotCle2'];?></td>
                    <td><?php echo $ligne['DateDefence'];?></td>
                    <td><?php echo $ligne['IDPMatricule'];?></td>
                </tr>
        </table>
        <?php } ?>

        <?php include '../templates/footer.php' ?>
    </body>
</html>
