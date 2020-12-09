<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {
    try {

        $Personnel  = $_POST['Personnel'];
        $Projet = $_GET['ID'];

        $sql = "INSERT INTO personnel_projetderecherche (IDPMatricule, IDProjet) VALUES ('$Personnel', '$Projet')";
        $Resultat = $bdd -> exec($sql);

        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['quitter'])) {
    header("location: ../MainPages/Ajout.php?f=../Formulaires/createProjetDeRecherche");
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

    <input type="submit" name="submit" value="Submit">

    <input type="submit" name="quitter" value="quitter">

</form>
