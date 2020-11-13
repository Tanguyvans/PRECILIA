<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Personnel";
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
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Grade</th>
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
                <td><?php echo $ligne['Telephone'];?></td>
                <td><?php echo $ligne['Grade'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
