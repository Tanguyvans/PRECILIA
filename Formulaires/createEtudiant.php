<?php

	if (isset($_POST['submit'])) {
  require "../config.php";

  try {

    $bdd = new PDO($dsn, $username, $password);

		  $IDEMatricule = $_POST['IDEMatricule'];
		  $Nom  = $_POST['Nom'];
		 	$Prenom = $_POST['Prenom'];
		  $Email = $_POST['Email'];
			$Annee = $_POST['Annee'];

			$sql = "INSERT INTO ETUDIANT (IDEMatricule, Nom, Prenom, Email, Annee)
			VALUES ('$IDEMatricule','$Nom','$Prenom','$Email','$Annee')";

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

		<label for="IDEMatricule">Matricule</label>
		<input type="number" name="IDEMatricule" id="IDEMatricule">

		<label for="Nom">Nom</label>
		<input type="text" name="Nom" id="Nom">

		<label for="Prenom">Prenom</label>
		<input type="text" name="Prenom" id="Prenom">

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

    <a href="../index.php">Retour en arrière</a>

	<?php include "../templates/footer.php" ?>
