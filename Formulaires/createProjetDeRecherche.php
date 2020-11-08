<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $IDProjet =$_POST['IDProjet'];
        $Titre = $_POST['Titre'];

        $DateDebut  = $_POST['DateDebut'];
        $DateDebut_new = date('Y-m-d', strtotime($DateDebut));

        $DateFin = $_POST['DateFin'];
        $DateFin_new = date('Y-m-d', strtotime($DateFin));

				$CollaborateurAcademique = $_POST['CollaborateurAcademique'];
        $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
				$Description = $_POST['Description'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
	      $MotCle2=$_POST['MotCle2'];

        $sql = "INSERT INTO PROJETDERECHERCHE (IDProjet ,Titre, DateDebut, DateFin, Description, CollaborateurAcademique, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2)
			VALUES (NULL,'$Titre', '$DateDebut_new','$DateFin_new','$Description','$CollaborateurAcademique','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2')";

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

    <label for="IDProjet">IDProjet</label>
    <input type="number" name="IDProjet" id="IDProjet">

    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="Date" name="DateFin" id="DateFin">

		<label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

		<label for="CollaborateurAcademique">Collaboration academique</label>
		<input type="text" name="CollaborateurAcademique" id="CollaborateurAcademique">

    <label for="CollaborateurIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaborateurIndustrielle" id="CollaborateurIndustrielle">

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
