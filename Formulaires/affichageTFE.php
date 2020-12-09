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
            $ID = $ligne['IDTFE'];
            $Etudiant = $ligne['IDEMatricule'];
            $Personnel = $ligne['IDPMatricule']; ?>

            <?php
            $EtudiantSQL = $bdd->query("SELECT Nom, Prenom FROM Etudiant WHERE IDEMatricule = '$Etudiant' ");
            $PersonnelSQL = $bdd->query("SELECT Nom,Prenom FROM Personnel WHERE IDPMatricule :'$Personnel'");
            $lineEtudiant = $Etudiant->fetch(PDO::FETCH_ASSOC);
            $linePersonnel = $Personnel->fetch(PDO::FETCH_ASSOC);  ?>
            <tr>
                <td><a href="../MainPages/Enseignement.php?table=TFE&amp;ID=<?php echo($ID);?>"><p class="lienAffichage"><?php echo $ligne['Titre'];?></p></a></td>
                <td><?php echo $lineEtudiant['Nom'];?> <?php echo $lineEtudiant['Prenom'];?></td>
                <td><?php echo $linePersonnel['Nom'];?> <?php echo $linePersonnel['Prenom'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>

