<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/affichagetables.css"/>
</html>
<?php
    require "../config.php";
    try{
        $bdd = new PDO($dsn, $username, $password);

        $sql = "SELECT * FROM StageEnEntreprise";
        $resultat = $bdd->query($sql);

    }
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>

<section>
     <!-- Contruction de la table-->
        <table>
            <tr>
                <th>Date de debut</th>
                <th>date de fin</th>
                <th>Collaboration industrielle</th>
                <th>Numero de contact</th>
                <th>Mot cle 1</th>
                <th>Mot cle 2</th>
                <th>IDPMatricule</th>
                <th>IDEMatricule</th>
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
                <td><?php echo $ligne['CollaborateurIndustrielle'];?></td>
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
