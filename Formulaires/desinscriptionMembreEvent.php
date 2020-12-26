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
                    echo $IDMembre;

                    $sql = "DELETE FROM personnel_evenement WHERE IDPMatricule = '$IDMembre' AND IDEvenement ='$IDEvent'";
                    $Resultat = $bdd -> exec($sql);

                }

                if(isset($_SESSION["Esession"])){
                    $IDMembre  = $_SESSION['Esession'];

                    echo $IDMembre;
                    $sql = "DELETE FROM etudiant_evenement WHERE IDEMatricule =  '$IDMembre' AND IDEvenement ='$IDEvent'";
                    $Resultat = $bdd -> exec($sql);
                }

                header("location: ../MainPages/Evenements.php?table=OUTSuccess");

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
            <input type="submit" name="submit" value="Submit">

            <input type="submit" name="quitter" value="quitter">

        </form>


    <?php include '../templates/footer.php' ?>
    </body>
</html>