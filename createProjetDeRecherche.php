<?php

	if (isset($_POST['submit'])) {
  require "../config.php";

  try {

		//$bdd = new PDO('mysql:host=localhost;dbname=PRECILIA', 'root', 'root');
		//echo "connection reussie avec la base de donnée<br>";
    $bdd = new PDO($dsn, $username, $password);

		  $IDProjet = $_POST['IDProjet'];
		  $Titre  = $_POST['Titre'];
		 	$DateDebut = $_POST['DateDebut'];
		  $DateFin = $_POST['DateFin'];
			$Description = $_POST['Description'];
      $CollaborationAcademique = $_POST['CollaborationAcademique'];
		  $CollaborationIndustrielle  = $_POST['CollaborationIndustrielle'];
		 	$NumeroContact = $_POST['NumeroContact'];
		  $MotCle1 = $_POST['Motcle1'];
			$Motcle2 = $_POST['MotCle2'];

			$sql = "INSERT INTO PROJET DE RECHERCHE (IDProjet, Titre, DateDebut, DateFin, Description,
        CollaborationAcademique, CollaborationIndustrielle, NumeroContact, MotCle1, MotCle2)
			VALUES (NULL, '$Titre', '$DateDebut', '$DateFin', '$Description',
        '$CollaborationAcademique','$CollaborationIndustrielle','$NumeroContact','$MotCle1', '$MotCle2')";

			$Resultat = $bdd -> exec($sql);
			echo "Ajout reussie avec la base de donnée<br>";

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

	}
?>

<? php include "templastes/header.php" ?>
<link rel="stylesheet" href="css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

	<form method="post">

		<label for="Titre">Titre</label>
		<input type="text" name="Titre" id="Titre">

		<label for="DateDebut">Date de début</label>
		<input type="date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
		<input type="date" name="DateFin" id="DateFin">

		<label for="Description">Description</label>
		<input type="text" name="Description" id="Description">

		<label for="CollaborationAcademique">Collaboration academique</label>
		<input type="text" name="CollaborationAcademique" id="CollaborationAcademique">

		<label for="CollaborationIndustrielle">Collaboration industrielle</label>
		<input type="text" name="CollaborationIndustrielle" id="CollaborationIndustrielle">

		<label for="NumeroContact">Numéro de la peronne de contact</label>
		<input type="number" name="NumeroContact" id="NumeroContact">

		<label for="MotCle1">Le mot clé principal de la publication</label>
		<input type="text" name="MotCle1" id="MotCle1">

		<label for="MotCle2">Mot clé secondaire de la publication</label>
		<input type="text" name="MotCle2" id="MotCle2">

    <input type="submit" name="submit" value="Submit">
  </form>

    <a href="index.php">Retour en arrière</a>

	<? php include "templates/footer.php" ?>
