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
<form method="post">
    <!--========== Mot cle 1 ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT MotCle1 FROM StageEnEntreprise');
    foreach ($result as $row) {
        $MCA[] = array('MotCleP' => $row['MotCle1']);
    }
    $result = $bdd->query('SELECT DISTINCT MotCle2 FROM StageEnEntreprise');
    foreach ($result as $row) {
        $MCB[] = array('MotCleP' => $row['MotCle2']);
    }

    $MCP = array_merge($MCA, $MCB);
    $MCP = array_unique($MCP, SORT_REGULAR);
    ?>

    <label for="MotCleP">MotCle principal</label>
    <select name="MotCleP" id="MotCleP">
        <option value="All">Select one</option>
        <?php foreach ($MCP as $test): ?>
            <option value="<?php print_r($test['MotCleP']); ?>"><?php print_r($test['MotCleP']);?></option>
        <?php endforeach; ?>
    </select>

    <!--========== Mot cle 2 ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT MotCle1 FROM StageEnEntreprise');
    foreach ($result as $row) {
        $MCC[] = array('MotCleS' => $row['MotCle1']);
    }
    $result = $bdd->query('SELECT DISTINCT MotCle2 FROM StageEnEntreprise');
    foreach ($result as $row) {
        $MCD[] = array('MotCleS' => $row['MotCle2']);
    }

    $MCS = array_merge($MCC, $MCD);
    $MCS = array_unique($MCS, SORT_REGULAR);
    ?>

    <label for="MotCleS">MotCle secondaire</label>
    <select name="MotCleS" id="MotCleS">
        <option value="All">Select one</option>
        <?php foreach ($MCS as $test): ?>
            <option value="<?php print_r($test['MotCleS']); ?>"><?php print_r($test['MotCleS']);?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="Recherche" value="Recherche">

</form>
<!--========== Il faut appuyer sur le boutton recherche ==============-->
<?php
if (isset($_POST['Recherche'])) {
    try {
        $MotCleP = $_POST['MotCleP'];
        $MotCleS = $_POST['MotCleS'];

        if ($MotCleP == "All" and $MotCleS == "All") {
            $sql = "SELECT * FROM StageEnEntreprise";
            $resultat = $bdd->query($sql);
        } elseif ($MotCleP != "All" and $MotCleS == "All") {
            $sql = "SELECT * FROM StageEnEntreprise WHERE MotCle1='$MotCleP' OR MotCle2='$MotCleP'";
            $resultat = $bdd->query($sql);
        } elseif ($MotCleP == 'All' and $MotCleS != "All") {
            $sql = "SELECT * FROM StageEnEntreprise WHERE MotCle2= '$MotCleS' OR MotCle1= '$MotCleS'";
            $resultat = $bdd->query($sql);
        } else {
            $sql = "SELECT * FROM StageEnEntreprise 
                    WHERE MotCle1= '$MotCleP' AND MotCle2= '$MotCleS' 
                    OR MotCle1 = '$MotCleS' AND MotCle2= '$MotCleP' ";
            $resultat = $bdd->query($sql);
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
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
