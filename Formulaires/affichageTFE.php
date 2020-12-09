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
            <th>Date de debut</th>
            <th>date de fin</th>
            <th>Collaboration academique</th>
            <th>Numero de contact</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>IDPMatricule</th>
            <th>IDEMatricule</th>
        </tr>
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <?php $ID = $ligne['IDTFE'] ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><a href="Recherche.php?table=Cours&amp;ID=<?php echo($ID);?>"><p class="lienAffichage"><?php echo $ligne['Titre'];?></p></a></td>
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['DateFin'];?></td>
                <td><?php echo $ligne['CollaborateurAcademique'];?></td>
                <td><?php echo $ligne['NumeroContact'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['IDPMatricule'];?></td>
                <td><?php echo $ligne['IDEMatricule'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>

