<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {
    try {

        $Personnel  = $_POST['Personnel'];
        $Cours = $_POST['Cours'];

        $sql = "INSERT INTO personnel_cours (IDPMatricule, IDCours) VALUES ('$Personnel', '$Cours')";
        $Resultat = $bdd -> exec($sql);

        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<form method="post">
    <!-- ======================== Personnel ======================= -->
    <?php
    $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM personnel');
    foreach ($result as $row) {
        $IDPM[] = array('Personnel' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
    }
    ?>

    <label for="Personnel">Personnel</label>

    <select name="Personnel" id="Personnel">
        <option value="">Select one</option>
        <?php foreach ($IDPM as $test): ?>
            <option value="<?php print_r($test['Personnel']);?>"> <?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
        <?php endforeach; ?>
    </select>

    <!-- ======================== Cours ======================= -->
    <?php
    $result = $bdd->query('SELECT IDCours, UE FROM Cours');
    foreach ($result as $row) {
        $IDC[] = array('Cours' => $row['IDCours'],'Titre' => $row['UE']);
    }
    ?>

    <label for="Cours">Cours</label>

    <select name="Cours" id="Cours">
        <option
            value="">Select one
        </option>
        <?php foreach ($IDC as $test): ?>
            <option
                value="<?php print_r($test['Cours']); ?>"><?php print_r($test['Titre']);?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">

</form>
