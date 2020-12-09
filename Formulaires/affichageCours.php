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
            <th>UE</th>
            <th>Titulaire</th>
        </tr>
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <?php $ID = $ligne['IDCours'];?>
            <tr>
                <td><a href="../MainPages/Enseignement.php?table=Cours&amp;ID=<?php echo($ID);?>"><p class="lienAffichage"> <?php echo $ligne['IDCours'];?> </p></a></td>
                <td><?php echo $ligne['UE'];?></td>
                <td><?php echo $ligne['Titulaire'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
