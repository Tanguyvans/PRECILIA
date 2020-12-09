<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

session_start();

if (isset($_POST['submit'])) {
    try {

        $IDEvent = $_GET['ID'];
        if(isset($_SESSION["Psession"])){
            $IDMembre  = $_SESSION['Psession'];
            echo $IDMembre;
            $sql = "INSERT INTO personnel_evenement (IDPMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
            $Resultat = $bdd -> exec($sql);

        }

        if(isset($_SESSION["Esession"])){
            $IDMembre  = $_SESSION['Esession'];

            echo $IDMembre;
            $sql = "INSERT INTO etudiant_evenement (IDEMatricule, IDEvenement) VALUES ('$IDMembre', '$IDEvent')";
            $Resultat = $bdd -> exec($sql);
        }




        echo "Ajout reussie avec la base de donnée<br>";

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
