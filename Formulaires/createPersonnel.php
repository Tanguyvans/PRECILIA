
<?php

if (isset($_POST['submit'])) {

  try {
      require "../config.php";

      $IDPMatricule = $_POST['IDPMatricule'];
      $Nom  = $_POST['Nom'];
      $Prenom = $_POST['Prenom'];
      $Email = $_POST['Email'];
      $Telephone = $_POST['Telephone'];
      $Grade = $_POST['Grade'];
      $MDP = $_POST['MDP'];
      $MDPR = $_POST['MDPR'];

      require "../Includes/functions.inc.php";

      if(emptyInputPersonnel($IDPMatricule, $Nom, $Prenom,$Email, $Grade, $MDP, $MDPR) !==false){
          echo"<h2>empty input</h2>";

      }
      elseif(invalidEmail($Email) !== false){
          echo"<h2>invalid email</h2>";
      }
      elseif(pwdMatch($MDP, $MDPR) !== false){
          echo"<h2>mot de passe incorrect</h2>";
      }elseif(PersonnelExist($conn, $IDPMatricule) !== false){
          echo"<h2>utilisateur deja exitant</h2>";

      }
      else{
          createPersonnel($conn, $IDPMatricule, $Nom, $Prenom, $Email, $Telephone, $Grade, $MDP);
          echo"<h2>Ajout réussi</h2>";
      }

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
                <option value="Doctorant">Doctorant</option>
                <option value="Stagiaire">Stagiaire</option>
                <option value="Charge de cours">Chargé de cours</option>
                <option value="Assistant">Assistant</option>
                <option value="Chercheur">Chercheur</option>
                <option value="Technicien">Technicien</option>
            </select>
        </p>
        <label for="MDP">Mot de passe</label>
        <input type="password" name="MDP" id="MDP">

        <label for="MDPR">confirmer le mot de passe</label>
        <input type="password" name="MDPR" id="MDPR">

        <input type="submit" name="submit" value="Submit">
    </form>
