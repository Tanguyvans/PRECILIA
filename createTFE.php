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
        $CollaborationIndustrielle = $_POST['CollaboratinIndustrielle'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
	$MotCle2=$_POST['MotCle2'];
        $IDPMatricule=$_POST['IDPMatricule'];
	$IDEMatricule=$_POST['IDEMatricule'];

        $sql = "INSERT INTO TFE (IDTFE, Titre, DateDebut, CollaboratinIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule)
			VALUES (' $IDTFE','$Titre','$DateDebut','$CollaborationIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$IDPMatricule','IDEMatricule')";

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

    <label for="CollaboratinIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaboratinIndustrielle" id="CollaboratinIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="text" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">
	
    <label for="IDPMatricule">IDPMatricule</label>
    <input type="number" name="IDPMatricule" id="IDPMatricule">

    <label for="IDEMatricule">IDEMatricule</label>
    <input type="number" name="IDEMatricule" id="IDEMatricule">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Retour en arrière</a>

<?php include "templates/footer.php" ?>
