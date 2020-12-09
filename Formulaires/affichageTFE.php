<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM tfe";
    $resultat = $bdd->query($sql);
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>

<section>
    <table>
        <tr>
            <th>Titre</th>
            <th>IDEMatricule</th>
            <th>IDPMatricule</th>
        </tr>
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <?php $ID = $ligne['IDTFE'] ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><a href="../MainPages/Enseignement.php?table=TFE&amp;ID=<?php echo($ID);?>"><p class="lienAffichage"><?php echo $ligne['Titre'];?></p></a></td>
                <td><?php echo $ligne['IDEMatricule'];?></td>
                <td><?php echo $ligne['IDPMatricule'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>

