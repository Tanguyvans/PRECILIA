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

                $IDMembre  = $_POST['IDMembre'];
                $IDEvent = $_GET['ID'];

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

        if (isset($_POST['quitter'])) {
            header("location: ../MainPages/Ajout.php?f=../Formulaires/createEvenement");
        }

        ?>

        <form method="post">
            <!-- ======================== MEMBRE ======================= -->
            <?php

            $IDEvent = $_GET['ID'];

            $sql = "SELECT personnel.IDPMatricule, personnel.Nom, personnel.Prenom FROM personnel
                    WHERE NOT IDPMatricule IN
                    (SELECT personnel.IDPMatricule FROM personnel LEFT JOIN personnel_evenement ON personnel.IDPMatricule = personnel_evenement.IDPMatricule
                    WHERE personnel_evenement.IDEvenement = '$IDEvent')";

            $resultpersonnel = $bdd->query($sql);

            foreach ($resultpersonnel as $row) {
                $IDPM[] = array('IDPMatricule' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
            }
            ?>
            <?php

            $IDEvent = $_GET['ID'];

            $sql = "SELECT etudiant.IDEMatricule, etudiant.Nom, etudiant.Prenom FROM etudiant
                    WHERE NOT IDEMatricule IN
                    (SELECT etudiant.IDEMatricule FROM etudiant LEFT JOIN etudiant_evenement ON etudiant.IDEMatricule = etudiant_evenement.IDEMatricule
                    WHERE etudiant_evenement.IDEvenement = '$IDEvent')";

            $resultetudiant = $bdd->query($sql);
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

            <input type="submit" name="submit" value="Submit">

            <input type="submit" name="quitter" value="quitter">

        </form>

        <form method="POST" enctype="multipart/form-data">
            <?php require '../includes/upload.inc.php' ?>
            <input type="file" name="file">
            <button type="submit" name="submitEvent">UPLOAD</button>
        </form>
        <?php include '../templates/footer.php' ?>
    </body>
</html>

