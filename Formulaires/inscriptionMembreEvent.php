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

                $IDEvent = $_GET['ID'];
                if(isset($_SESSION["Psession"])){
                    $IDMembre  = $_SESSION['Psession'];

                    # On regarde si la personne est déjà inscrite
                    $sql = "SELECT * FROM PERSONNEL_EVENEMENT WHERE IDEvenement = '$IDEvent' AND IDPMatricule = '$IDMembre' ";
                    $result = $bdd->query($sql);
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);

                    # s'il est déjà inscrit, on informe l'utilisateur
                    if ($ligne['IDPMatricule'] != NULL ){
                        echo "Il est deja inscrit";
                    }
                    # s'il n'est pas inscrit, on l'inscrit
                    else {
                        $sql = "INSERT INTO personnel_evenement (IDPMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
                        $Resultat = $bdd -> exec($sql);
                        echo "Ajout reussie avec la base de donnée<br>";
                    }

                }

                if(isset($_SESSION["Esession"])){
                    $IDMembre  = $_SESSION['Esession'];

                    # On regarde si la personne est déjà inscrite
                    $sql = "SELECT * FROM ETUDIANT_EVENEMENT WHERE IDEvenement = '$IDEvent' AND IDEMatricule = '$IDMembre' ";
                    $result = $bdd->query($sql);
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);

                    # s'il est déjà inscrit, on informe l'utilisateur
                    if ($ligne['IDEMatricule'] != NULL ){
                        echo "Il est deja inscrit";
                    }
                    # s'il n'est pas inscrit, on l'inscrit
                    else {
                        $sql = "INSERT INTO etudiant_evenement (IDEMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
                        $Resultat = $bdd -> exec($sql);
                        echo "Ajout reussie avec la base de donnée<br>";
                    }


                }

            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }

        if (isset($_POST['quitter'])) {
            header("location: ../MainPages/Evenements.php");
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

            <input type="submit" name="submit" value="Submit">

            <input type="submit" name="quitter" value="quitter">

        </form>

        <?php include '../templates/footer.php' ?>
    </body>
</html>
