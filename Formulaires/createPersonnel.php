
<?php

if (isset($_POST['submit'])) {


  try {
      require "../config.php";
      $bdd = new PDO($dsn, $username, $password);

      $IDPMatricule = $_POST['IDPMatricule'];
      $Nom  = $_POST['Nom'];
      $Prenom = $_POST['Prenom'];
      $Email = $_POST['Email'];
      $Telephone = $_POST['Telephone'];
      $Grade = $_POST['Grade'];
      $MDP = $_POST['MDP'];
      $MDPR = $_POST['MDPR'];

      require "../Includes/functions.inc.php";

      if(emptyInputSignup($IDPMatricule, $Nom, $Prenom,$Email, $Grade, $MDP, $MDPR) !==false){
          echo("empty input");
      }

      if(invalidEmail($Email) !== false){
          echo("invalid email");
      }

      if(pwdMatch($MDP, $MDPR) !== false){
          echo(" mot de passe incorrect");
      }


      if(uidExist($conn, $IDPMatricule) !== false){
          echo"utilisateur deja exitant<br>";
      }


      createPersonnel($conn, $IDPMatricule, $Nom, $Prenom, $Email, $Telephone, $Grade, $MDP);
/*
      $sql = "INSERT INTO PERSONNEL (IDPMatricule, Nom, Prenom, Email, Telephone, Grade, MotDePasse)
		VALUES ('$IDPMatricule','$Nom','$Prenom','$Email','$Telephone', '$Grade', '$hashedMDP')";

      $Resultat = $bdd -> exec($sql);
      echo "Ajout reussie avec la base de donnée<br>";
*/
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

    <form method="post">

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
        <label for="MDP">Mot de passe</label>
        <input type="password" name="MDP" id="MDP">

        <label for="MDPR">confirmer le mot de passe</label>
        <input type="password" name="MDPR" id="MDPR">

        <input type="submit" name="submit" value="Submit">
    </form>
