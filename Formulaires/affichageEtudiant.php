<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <!--adaptive response to the width of the device-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PRESCILIA - Accueil</title>
    <!--Description du site lors de la recherche-->
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="../css/affichagetables.css"/>
</head>

<body>
<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Etudiant";
    $resultat = $bdd->query($sql);

}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>
<section>
    <!-- contruction de la table-->
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Annee</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
          while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
          {
            ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><?php echo $ligne['Nom'];?></td>
                <td><?php echo $ligne['Prenom'];?></td>
                <td><?php echo $ligne['Email'];?></td>
                <td><?php echo $ligne['Annee'];?></td>
            </tr>
            <?php
          }
        ?>
    </table>
</section>
</body>
</html>