<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $Titre = $_POST['Titre'];
        $DateDebut  = $_POST['DateDebut'];
        $DateFin = $_POST['DateFin'];
				$CollaborationAcademique = $_POST['CollaborationAcademique'];
        $CollaborationIndustrielle = $_POST['CollaborationIndustrielle'];
				$Description = $_POST['Description'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
	      $MotCle2=$_POST['MotCle2'];

        $sql = "INSERT INTO PROJET DE RECHERCHE (IDProjet ,Titre, DateDebut, DateFin, Description, CollaborationAcademique, CollaborationIndustrielle, NumeroContact, MotCle1, MotCle2)
			VALUES (NULL, '$Titre','$DateDebut','$DateFin','$Description','$CollaborationAcademique','$CollaborationIndustrielle','$NumeroContact','$MotCle1','$MotCle2')";

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

    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="Date" name="DateFin" id="DateFin">

		<label for="Desccription">Description</label>
    <input type="text" name="Description" id="Decription">

		<label for="CollaborationAcademique">Collaboration academique</label>
		<input type="text" name="CollaborationAcademique" id="CollaborationAcademique">

    <label for="CollaborationIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaborationIndustrielle" id="CollaborationIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="number" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="../index.php">Retour en arrière</a>

<?php include "../templates/footer.php" ?>
