<?php
    require "../config.php";
    $bdd = new PDO($dsn, $username, $password);
?>

<?php
    try{
        $sql = "SELECT * FROM These";
        $resultat = $bdd->query($sql);

    }
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>

<form method="post">
    <!--========== Mot cle 1 ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT MotCle1 FROM These');
    foreach ($result as $row) {
        $MC1[] = array('MotCle1' => $row['MotCle1']);
    }
    ?>

    <label for="MotCle1">MotCle1</label>
    <select name="MotCle1" id="MotCle1">
        <option value="">Select one</option>
        <?php foreach ($MC1 as $test): ?>
            <option value="<?php print_r($test['MotCle1']); ?>"><?php print_r($test['MotCle1']);?></option>
        <?php endforeach; ?>
    </select>
    <!--========== Mot cle 2 ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT MotCle2 FROM These');
    foreach ($result as $row) {
        $MC2[] = array('MotCle2' => $row['MotCle2']);
    }
    ?>

    <label for="MotCle2">MotCle2</label>
    <select name="MotCle2" id="MotCle2">
        <option value="">Select one</option>
        <?php foreach ($MC2 as $test): ?>
            <option value="<?php print_r($test['MotCle2']); ?>"><?php print_r($test['MotCle2']);?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">

</form>


<!--========== Tableau ==============-->
<section>
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
