<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!--adaptive response to the width of the device-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PRESCILIA - Evènements</title>
    <!--Description du site lors de la recherche-->
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<?php include '../templates/header.php' ?>

<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {
    try {

        $Personnel  = $_POST['Personnel'];
        $Cours = $_GET['ID'];

        $sql = "INSERT INTO personnel_cours (IDPMatricule, IDCours) VALUES ('$Personnel', '$Cours')";
        $Resultat = $bdd -> exec($sql);

        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['quitter'])) {
    header("location: ../MainPages/Ajout.php?f=../Formulaires/createCours");
}
?>

<form method="post">
    <!-- ======================== Personnel ======================= -->
    <?php

    $Cours = $_GET['ID'];

    $sql = "SELECT personnel.IDPMatricule, personnel.Nom, personnel.Prenom FROM personnel
                    WHERE NOT IDPMatricule IN
                    (SELECT personnel.IDPMatricule FROM personnel LEFT JOIN personnel_cours ON personnel.IDPMatricule = personnel_cours.IDPMatricule
                    WHERE personnel_cours.IDCours = '$Cours')";

    $result = $bdd->query($sql);

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

<?php include '../templates/footer.php' ?>
</body>
</html>
