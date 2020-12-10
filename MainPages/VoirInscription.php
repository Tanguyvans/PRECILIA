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

<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);
?>
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


        <?php
        if(isset($_SESSION["Psession"])){
            $matricule = $_SESSION['Psession'];
            $CurrentDate = date("Y-m-d");
            try{
                $sql = "SELECT evenement.*, lieu.* FROM personnel_evenement,evenement, lieu 
                        WHERE personnel_evenement.IDEvenement = evenement.IDEvenement 
                        AND evenement.IDLieu = lieu.IDLieu
                        AND $CurrentDate < evenement.DateDebut";
                $resultat = $bdd->query($sql);
            }
            catch (Exception $e){
                die('Erreur : '.$e->getMessage());
            }


        }elseif(isset($_SESSION["Esession"])){
            $matricule = $_SESSION['Esession'];
            $CurrentDate = date("Y-m-d");
            try{
                $sql = "SELECT evenement.*, lieu.* FROM etudiant_evenement,evenement, lieu 
                        WHERE etudiant_evenement.IDEvenement = evenement.IDEvenement 
                        AND evenement.IDLieu = lieu.IDLieu
                        AND $CurrentDate < evenement.DateDebut";
                $resultat = $bdd->query($sql);
            }
            catch (Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        ?>

    <table>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Acronyme</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>DateDebut</th>
            <th>Lieu</th>
        </tr>
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <?php $nom = $ligne['IDEvenement'];?>
                <?php $DateDebut = $ligne['DateDebut'];?>
                <!--remplissage de la table avec la base de donnée-->
                <td><a href="Evenements.php?table=Evenement&amp;ID=<?php echo($nom);?>&amp;Date=<?php echo($DateDebut);?>"><p class="lienAffichage"> <?php echo $ligne['Nom'];?> </p></a></td>
                <td ><?php echo $ligne['Type'];?></td>
                <td><?php echo $ligne['Acronyme'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['Ville'];?> <?php echo $ligne['Ville'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>

    <div class="basP">
        <?php include '../templates/footer.php' ?>
    </div>

</div>
</body>
</html>


