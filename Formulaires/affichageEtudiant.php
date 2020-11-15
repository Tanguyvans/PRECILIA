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
