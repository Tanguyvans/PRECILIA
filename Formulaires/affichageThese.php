<?php
    require "../config.php";
    $bdd = new PDO($dsn, $username, $password);
?>

<form method="post">
    <!--========== Mot cle 1 ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT MotCle1 FROM These');
    foreach ($result as $row) {
        $MCA[] = array('MotCle1' => $row['MotCle1']);
    }
    $result = $bdd->query('SELECT DISTINCT MotCle2 FROM These');
    foreach ($result as $row) {
        $MCB[] = array('MotCle1' => $row['MotCle2']);
    }

    $MC1 = array_merge($MCA, $MCB);
    $MC1 = array_unique($MC1, SORT_REGULAR);
    ?>

    <label for="MotCle1">MotCle1</label>
    <select name="MotCle1" id="MotCle1">
        <option value="All">Select one</option>
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
        <option value="All">Select one</option>
        <?php foreach ($MC2 as $test): ?>
            <option value="<?php print_r($test['MotCle2']); ?>"><?php print_r($test['MotCle2']);?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="Recherche" value="Recherche">

</form>
<!--========== Il faut appuyer sur le boutton recherche ==============-->
<?php
if (isset($_POST['Recherche'])) {
    try{
        $MotCle1  = $_POST['MotCle1'];
        $MotCle2 = $_POST['MotCle2'];

        if($MotCle1 == "All" and $MotCle2 == "All"){
            $sql = "SELECT * FROM These";
            $resultat = $bdd->query($sql);
        }elseif ($MotCle1 != "All" and $MotCle2 == "All"){
            $sql = "SELECT * FROM These WHERE MotCle1= '$MotCle1'";
            $resultat = $bdd->query($sql);
        }elseif ($MotCle1 == 'All' and $MotCle2 != "All"){
            $sql = "SELECT * FROM These WHERE MotCle2= '$MotCle2'";
            $resultat = $bdd->query($sql);
        }else{
            $sql = "SELECT * FROM These 
                    WHERE MotCle1= '$MotCle1' 
                    AND MotCle2= '$MotCle2'";
            $resultat = $bdd->query($sql);
        }


    }
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>
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
<?php
}
?>