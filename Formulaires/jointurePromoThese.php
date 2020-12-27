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

                $Promo  = $_POST['Promo'];
                $These = $_GET['ID'];

                $sql = "INSERT INTO promoteur_these (IDPMatricule, IDThese) VALUES ('$Promo', '$These')";
                $Resultat = $bdd -> exec($sql);

                echo "Ajout reussie avec la base de donnée<br>";

            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }

        if (isset($_POST['quitter'])) {
            header("location: ../MainPages/Ajout.php?f=../Formulaires/createThese");
        }
    ?>

    <form method="post">
        <!-- ======================== PROMOTEUR ======================= -->
        <?php
        $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM personnel');
        foreach ($result as $row) {
            $IDPM[] = array('Promo' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
        }
        ?>

        <label for="Promo">Promoteur</label>

        <select name="Promo" id="Promo">
            <option value="">Select one</option>
            <?php foreach ($IDPM as $test): ?>
                <option value="<?php print_r($test['Promo']);?>"> <?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
            <?php endforeach; ?>
        </select>

        <!-- ======================== THESE ======================= -->

        <input type="submit" name="submit" value="Submit">

        <input type="submit" name="quitter" value="quitter">
    </form>

    <?php include '../templates/footer.php' ?>
    </body>
</html>
