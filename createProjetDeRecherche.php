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
		<input type="date" name="DateDebut" id="DateDebut" min="2018-01-01" max="2020-01-01">

    <label for="DateDebut">Date de début</label>
		<input type="date" name="DateDebut" id="DateDebut">

		<label for="Email">Adresse email</label>
		<input type="text" name="Email" id="Email">

		<p>
       <label for="Annee">Choisissez l'année d'étude</label><br />
       <select name="Annee" id="Annee">
           <option value="2e Master">2e Master</option>
           <option value="1er Master">1er Master</option>
           <option value="3e Bachelier">3e Bachelier</option>
       </select>
   </p>

    <input type="submit" name="submit" value="Submit">
  </form>

    <a href="index.php">Retour en arrière</a>

	<? php include "templates/footer.php" ?>
