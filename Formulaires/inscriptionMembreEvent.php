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

                    $sql = "INSERT INTO personnel_evenement (IDPMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
                    $Resultat = $bdd -> exec($sql);
                    echo "Ajout reussie avec la base de donnée<br>";
                }

                if(isset($_SESSION["Esession"])){
                    $IDMembre  = $_SESSION['Esession'];

                    $sql = "INSERT INTO etudiant_evenement (IDEMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
                    $Resultat = $bdd -> exec($sql);
                    echo "Ajout reussie avec la base de donnée<br>";
                }

                header("location: ../MainPages/Evenements.php?table=INSuccess");

            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }

        if (isset($_POST['quitter'])) {
            header("location: ../MainPages/Evenements.php?table=none");
        }

        ?>

        <form method="post">
            <!-- ======================== MEMBRE ======================= -->
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="quitter" value="quitter">

        </form>
        <?php include '../templates/footer.php' ?>
    </body>
</html>
