<!DOCTYPE html>
<html lang="fr">

<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM StageDeRecherche";
    $resultat = $bdd->query($sql);
    echo "le nombre de Stage de recherche dans la base de donnees est : ".$resultat->rowCount().'</strong>';

}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>

<section>
    <h1>Tableau</h1>

    <!-- Contruction de la table-->
    <table>
        <tr>
            <th>Date de debut</th>
            <th>date de fin</th>
            <th>Decription</th>
            <th>Collaborateur Academique</th>
            <th>Collaborateur Industrielle</th>
            <th>Numero de contact</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>IDPMatricule</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <!--Donnée de la base de donnée-->
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['DateFin'];?></td>
                <td><?php echo $ligne['Description'];?></td>
                <td><?php echo $ligne['CollaborateurAcademique'];?></td>
                <td><?php echo $ligne['CollaborateurIndustrielle'];?></td>
                <td><?php echo $ligne['NumeroContact'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['IDPMatricule'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
