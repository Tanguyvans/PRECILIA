<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $IDStageEtnreprise = $_POST['IDStageEntreprise'];
        $DateDebut  = $_POST['DateDebut'];
        $DateFin = $_POST['DateFin'];
        $CollaborationIndustrielle = $_POST['CollaborationIndustrielle'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
	$MotCle2=$_POST['MotCle2'];
	$IDPMatricule=$_POST['IDPMatricule'];
	$IDEMatricule=$_POST['IDEMatricule'];
<
        $sql = "INSERT INTO STAGE EN ENTREPRISE (IDStageEntreprise, DateDebut, DateFin, CollaborationIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule )
			VALUES ('$IDStageEntreprise','$DateDebut','$DateFin','$CollaborationIndustrielle','$NumeroContact','$MotCle1','MotCle2','IDPMatricule','IDEMatricule')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "../templates/header.php" ?>
<link rel="stylesheet" href="../css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDStageEntreprise">Identifiant du stage en entreprise</label>
    <input type="number" name="IDStageEntreprise" id="IDStageEntreprise">

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="Date" name="DateFin" id="DateFin">

    <label for="CollaborationIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaborationIndustrielle" id="CollaborationIndustrielle">

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

<a href="../index.php">Retour en arrière</a>

<?php include "../templates/footer.php" ?>
