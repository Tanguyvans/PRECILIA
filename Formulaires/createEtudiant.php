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
              $MDP = $_POST['MDP'];
              $MDPR = $_POST['MDPR'];

              require "../includes/functions.inc.php";

              if(emptyInputEtudiant($IDEMatricule, $Nom, $Prenom,$Email, $Annee, $MDP, $MDPR) !==false){
                  echo"<h2>empty input</h2>";

              }
              elseif(invalidEmail($Email) !== false){
                  echo"<h2>invalid email</h2>";
              }
              elseif(pwdMatch($MDP, $MDPR) !== false){
                  echo"<h2>mot de passe incorrect</h2>";
              }
              elseif(EtudiantExist($conn, $IDEMatricule) !== false){
                  echo"<h2>utilisateur deja exitant</h2>";
              }
              else{
                  createEtudiant($conn, $IDEMatricule, $Nom, $Prenom, $Email, $Annee, $MDP);
              }

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
	}
?>

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
        <label for="MDP">Mot de passe</label>
        <input type="password" name="MDP" id="MDP">

        <label for="MDPR">confirmer le mot de passe</label>
        <input type="password" name="MDPR" id="MDPR">

        <input type="submit" name="submit" value="Submit">
    </form>

