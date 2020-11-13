<?php
    require "../config.php";
    try{
        $bdd = new PDO($dsn, $username, $password);

        $sql = "SELECT * FROM These";
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
            <th>Titre</th>
            <th>Date de debut</th>
            <th>date de fin</th>
            <th>Description</th>
            <th>Collaboration academique</th>
            <th>Collaboration industrielle</th>
            <th>description</th>
            <th>Numero de contact</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>Date de defence</th>
            <th>IDPMatricule</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><?php echo $ligne['Titre'];?></td>
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['DateFin'];?></td>
                <td><?php echo $ligne['Description'];?></td>
                <td><?php echo $ligne['CollaborateurAcademique'];?></td>
                <td><?php echo $ligne['CollaborateurIndustrielle'];?></td>
                <td><?php echo $ligne['Description'];?></td>
                <td><?php echo $ligne['NumeroContact'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['DateDefence'];?></td>
                <td><?php echo $ligne['IDPMatricule'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
