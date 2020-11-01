<?php

if (isset($_POST['submit'])) {
    //require "../config.php";

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=PRECILIA', 'root', 'root');
        echo "connection reussie avec la base de donnée<br>";
        //$bdd = new PDO($dsn, $username, $password);

        $IDTFE= $_POST['IDTFE'];
        $Titre  = $_POST['Titre'];
        $DateDebut = $_POST['DateDebut'];
        $CollabIndus = $_POST['CollabIndus'];
        $Contact = $_POST['Contact'];
        $MotCle=$_POST['MotCle'];

        $sql = "INSERT INTO TFE (IDTFE, Titre, DateDebut, CollabIndus, Contact, MotCle)
			VALUES (' $IDTFE','$Titre','$DateDebut','$CollabIndus','$Contact','$MotCle')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "templastes/header.php" ?>
<link rel="stylesheet" href="css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDTFE">TFE</label>
    <input type="number" name="IDTFE" id="IDTFE">

    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="CollabIndus">Collaboration industrielle</label>
    <input type="text" name="CollabIndus" id="CollabIndus">

    <label for="Contact">Contact</label>
    <input type="text" name="Contact" id="Contact">

    <label for="MotCle">Mot-clé</label>
    <input type="text" name="MotCle" id="MotCle">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Retour en arrière</a>

<?php include "templates/footer.php" ?>
