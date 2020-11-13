<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Evenement";
    $resultat = $bdd->query($sql);

    echo "le nombre de these dans la base de donnees est : ".$resultat->rowCount().'</strong>';
    echo "<br>";
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>

<section>
    <h1>Tableau</h1>
    <!-- contruction de la table-->
    <table>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Acronyme</th>
            <th>Duree</th>
            <th>description</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>DateDebut</th>
            <th>IDLieu</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><?php echo $ligne['Type'];?></td>
                <td><?php echo $ligne['Nom'];?></td>
                <td><?php echo $ligne['Acronyme'];?></td>
                <td><?php echo $ligne['Duree'];?></td>
                <td><?php echo $ligne['Description'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['IDLieu'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
