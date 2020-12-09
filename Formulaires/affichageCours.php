<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Cours";
    $resultat = $bdd->query($sql);
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>

<section>
    <table>
        <tr>
            <th>IDCours</th>
            <th>NombreCredit</th>
            <th>NombreHeure</th>
            <th>Titulaire</th>
            <th>UE</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>IDPMatricule</th>
        </tr>
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <?php $ID = $ligne['IDCours'];?>
            <tr>
                <td><a href="Recherche.php?table=Cours&amp;ID=<?php echo($ID);?>"><p class="lienAffichage"> <?php echo $ligne['IDCours'];?> </p></a></td>
                <td><?php echo $ligne['NombreCredit'];?></td>
                <td><?php echo $ligne['NombreHeure'];?></td>
                <td><?php echo $ligne['Titulaire'];?></td>
                <td><?php echo $ligne['UE'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['IDPMatricule'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
