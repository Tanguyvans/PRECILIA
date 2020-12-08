<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {

    try {
        $Titre = $_POST['Titre'];
        $DateDebut  = $_POST['DateDebut'];
        $DateFin = $_POST['DateFin'];
        $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
        $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
        $Description = $_POST['Description'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];

        $sql = "INSERT INTO PROJETDERECHERCHE (IDProjet ,Titre, DateDebut, DateFin, Description, CollaborateurAcademique, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2)
			VALUES (NULL,'$Titre', '$DateDebut','$DateFin','$Description','$CollaborateurAcademique','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2')";

        $Resultat = $bdd -> exec($sql);

        $sql = "SELECT TOP 1 FROM ProjetDeRecherche WHERE Titre= '$Titre' AND  ";
        $resultat = $bdd->query($sql);


        echo "<p><em><a href='jointurePersonnelProjet.php?id=' >Commentaires</a></em></p>";


    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>
<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

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

<a href="../index.php" >Retour en arrière</a>
