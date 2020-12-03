<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {
    try {

        $IDMembre  = $_POST['IDMembre'];
        $IDEvent = $_POST['Event'];

        if($IDMembre[0] == 'P'){
            $IDMembre = substr($IDMembre, 1);;
            $sql = "INSERT INTO personnel_evenement (IDPMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
        }
        elseif ($IDMembre[0] == 'E'){
            $IDMembre = substr($IDMembre, 1);;
            $sql = "INSERT INTO etudiant_evenement (IDEMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
        }

        $Resultat = $bdd -> exec($sql);

        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<form method="post">
    <!-- ======================== MEMBRE ======================= -->
    <?php
    $resultpersonnel = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM personnel');
    foreach ($resultpersonnel as $row) {
        $IDPM[] = array('IDPMatricule' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
    }
    ?>
    <?php
    $resultetudiant = $bdd->query('SELECT IDEMatricule, Nom, Prenom FROM etudiant');
    foreach ($resultetudiant as $row) {
        $IDEM[] = array('IDEMatricule' => $row['IDEMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
    }
    ?>

    <label for="IDMembre">Membre</label>

    <select name="IDMembre" id="IDMembre">
        <option value="">Select one</option>
        <!-- ======================== Personnel ======================= -->
        <optgroup label="Personnel">
            <?php foreach ($IDPM as $test): ?>
                <option value="P<?php print_r($test['IDPMatricule']);?>"> <?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
            <?php endforeach; ?>
        </optgroup>
        <!-- ======================== Etudiant ======================= -->
        <optgroup label="Etudiant">
            <?php foreach ($IDEM as $test): ?>
                <option value="E<?php print_r($test['IDEMatricule']);?>"> <?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
            <?php endforeach; ?>
        </optgroup>
    </select>

    <!-- ======================== EVENT ======================= -->
    <?php
    $result = $bdd->query('SELECT IDEvenement, Type, Nom FROM evenement');
    foreach ($result as $row) {
        $IDE[] = array('IDEvenement' => $row['IDEvenement'],'Type' => $row['Type'], 'Nom' => $row['Nom']);
    }
    ?>

    <label for="Event">Evenement</label>

    <select name="Event" id="Event">
        <option
                value="">Select one
        </option>
        <?php foreach ($IDE as $test): ?>
            <option
                    value="<?php print_r($test['IDEvenement']); ?>"> <?php print_r($test['Type']);?> <?php print_r($test['Nom']);?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">

</form>