
<?php

	if (isset($_POST['submit'])) {
  //require "../config.php";

  try {

		$bdd = new PDO('mysql:host=localhost;dbname=PRECILIA', 'root', 'root');
		echo "connection reussie avec la base de donnée<br>";
    //$bdd = new PDO($dsn, $username, $password);

		  $IDPMatricule = $_POST['IDPMatricule'];
		  $Nom  = $_POST['Nom'];
		 	$Prenom = $_POST['Prenom'];
		  $Email = $_POST['Email'];
		  $Telephone = $_POST['Telephone'];
			$Grade = $_POST['Grade'];

			$sql = "INSERT INTO PERSONNEL (IDPMatricule, Nom, Prenom, Email, Telephone, Grade)
			VALUES ('$IDPMatricule','$Nom','$Prenom','$Email','$Telephone', '$Grade')";

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

	<form method="post" action="createPersonnel.php">

    <label for="IDPMatricule">Matricule</label>
		<input type="number" name="IDPMatricule" id="IDPMatricule">

		<label for="Nom">Nom</label>
		<input type="text" name="Nom" id="Nom">

		<label for="Prenom">Prenom</label>
		<input type="text" name="Prenom" id="Prenom">

		<label for="Email">Adresse email</label>
		<input type="text" name="Email" id="Email">

		<label for="Telephone">Numéro de téléphone</label>
    <input type="number" name="Telephone" id="Telephone">

		<p>
       <label for="Grade">Choisissez le Grade</label><br />
       <select name="Grade" id="Grade">
           <option value="Chef de service">Chef de service</option>
           <option value="Professeur">Professeur</option>
           <option value="Post Doctorant">Post Doctorant</option>
           <option value="Doctorant">Doctorant</option>
           <option value="Stagiaire">Stagiaire</option>
       </select>
   </p>

    <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

	<? php include "templates/footer.php" ?>
