<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/affichagetables.css"/><?php
    require "../config.php";
    try{
        $bdd = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM Cours";
        $resultat = $bdd->query($sql);}
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());}
    ?>

    <form method="post">
        <!--========== Mot cle 1 ==============-->
        <?php
        $result = $bdd->query('SELECT DISTINCT MotCle1 FROM Cours');
        foreach ($result as $row) {
            $MCA[] = array('MotCleP' => $row['MotCle1']);
        }
        $result = $bdd->query('SELECT DISTINCT MotCle2 FROM Cours');
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
        $result = $bdd->query('SELECT DISTINCT MotCle1 FROM Cours');
        foreach ($result as $row) {
            $MCC[] = array('MotCleS' => $row['MotCle1']);
        }
        $result = $bdd->query('SELECT DISTINCT MotCle2 FROM Cours');
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
                $sql = "SELECT * FROM Cours";
                $resultat = $bdd->query($sql);
            } elseif ($MotCleP != "All" and $MotCleS == "All") {
                $sql = "SELECT * FROM Cours WHERE MotCle1='$MotCleP' OR MotCle2='$MotCleP'";
                $resultat = $bdd->query($sql);
            } elseif ($MotCleP == 'All' and $MotCleS != "All") {
                $sql = "SELECT * FROM Cours WHERE MotCle2= '$MotCleS' OR MotCle1= '$MotCleS'";
                $resultat = $bdd->query($sql);
            } else {
                $sql = "SELECT * FROM Cours 
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
        <table>
            <tr>
                <th>IDCours</th>
                <th>UE</th>
                <th>Titulaire</th>
                <th>Mot cle 1</th>
                <th>Mot cle 2</th>
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
                    <td><?php echo $ligne['MotCle1'];?></td>
                    <td><?php echo $ligne['MotCle2'];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </section>
</html>