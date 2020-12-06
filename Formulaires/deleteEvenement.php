<html>
<link rel="stylesheet" href="../css/affichagetables.css"/>
</html>
<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Evenement";
    $resultat2 = $bdd->query($sql);

    echo "Nombre d'évènements dans la base de donnée : ".$resultat2->rowCount().'</strong>';
    echo "<br>";
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>
<form method="post">
    <!--========== Type ==============-->

    <label for="Type">Type d'évènement</label>
    <select name="Type" id="Type">
        <option value="All">Select one</option>
        <option value="Hackathon">Hackathon</option>
        <option value="Workshop">Workshop</option>
        <option value="Seminaire">Seminaire</option>
    </select>

    <!--========== Nom ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT Nom FROM evenement');
    foreach ($result as $row) {
        $MCN[] = array('Nom' => $row['Nom']);
    }
    ?>

    <label for="Nom">Nom</label>
    <select name="Nom" id="Nom">
        <option value="All">Select one</option>
        <?php foreach ($MCN as $test): ?>
            <option value="<?php print_r($test['Nom']); ?>"><?php print_r($test['Nom']);?></option>
        <?php endforeach; ?>
    </select>

    <!--========== Date début ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT DateDebut FROM evenement');
    foreach ($result as $row) {
        $MCD[] = array('Date' => $row['DateDebut']);
    }
    ?>

    <label for="Date">Date de début</label>
    <select name="Date" id="Date">
        <option value="All">Select one</option>
        <?php foreach ($MCD as $test): ?>
            <option value="<?php print_r($test['Date']); ?>"><?php print_r($test['Date']);?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="Supprimer" value="Supprimer">

</form>
<!--========== Il faut appuyer sur le boutton recherche ==============-->
<?php
if (isset($_POST['Supprimer'])) {
    try {
        $Type=$_POST['Type'];
        $Nom = $_POST['Nom'];
        $Date = $_POST['Date'];

        if ($Nom == "All" and $Type == "All" and $Date=="All") {
           echo "Veuillez sélectionner un évènement";
        } elseif ($Nom == "All" and $Type == "All" and $Date!= "All") {
            $sql = "DELETE FROM evenement WHERE DateDebut='$Date'";
            $resultat = $bdd->query($sql);
        } elseif ($Nom == "All" and $Type != "All" and $Date!= "All") {
            $sql = "DELETE FROM evenement WHERE Type= '$Type' AND DateDebut= '$Date'";
            $resultat = $bdd->query($sql);
        } elseif ($Nom == "All" and $Type != "All" and $Date== "All") {
            $sql = "DELETE FROM evenement WHERE Type= '$Type' ";
            $resultat = $bdd->query($sql);
        }elseif ($Nom != "All" and $Type == "All" and $Date== "All") {
            $sql = "DELETE FROM evenement WHERE Nom='$Nom'";
            $resultat = $bdd->query($sql);
        } elseif ($Nom != "All" and $Type != "All" and $Date== "All") {
            $sql = "DELETE FROM evenement WHERE Type= '$Type' AND Nom= '$Nom'";
            $resultat = $bdd->query($sql);
        } elseif ($Nom != "All" and $Type == "All" and $Date!= "All") {
            $sql = "DELETE FROM evenement WHERE Nom= '$Nom' AND DateDebut='Date'";
            $resultat = $bdd->query($sql);
        } elseif ($Nom != "All" and $Type != "All" and $Date!= "All") {
            $sql = "DELETE FROM evenement WHERE Type= '$Type' AND Nom= '$Nom' AND DateDebut='Date'";
            $resultat = $bdd->query($sql);
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $sql2 = "SELECT * FROM Evenement ";
    $resultat2 = $bdd->query($sql2);
}
?>

<section>
    <!-- contruction de la table-->
    <table>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Acronyme</th>
            <th>Duree</th>
            <th>description</th>
            <th>Mot cle 1</th>
            <th>Mot cle 2</th>
            <th>DateDebut</th>
            <th>IDLieu</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
        while($ligne = $resultat2->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td ><?php echo $ligne['Type'];?></td>
                <td><?php echo $ligne['Nom'];?></td>
                <td><?php echo $ligne['Acronyme'];?></td>
                <td><?php echo $ligne['Duree'];?></td>
                <td><?php echo $ligne['Description'];?></td>
                <td><?php echo $ligne['MotCle1'];?></td>
                <td><?php echo $ligne['MotCle2'];?></td>
                <td><?php echo $ligne['DateDebut'];?></td>
                <td><?php echo $ligne['IDLieu'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>