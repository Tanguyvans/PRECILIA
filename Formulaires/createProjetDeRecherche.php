
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
    <input type="textarea" name="Description" id="Description">

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

        if ($DateFin == NUll){
            $DateFin = NULL;
        }



        $sql = "INSERT INTO PROJETDERECHERCHE (IDProjet ,Titre, DateDebut, DateFin, Description, CollaborateurAcademique, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2)
			VALUES (NULL,'$Titre', '$DateDebut','$DateFin','$Description','$CollaborateurAcademique','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2')";

        $Resultat = $bdd -> exec($sql);

        echo "<h4>Ajout reussi à la base de donnée</h4>";

        $sql = "SELECT IDProjet, Titre FROM PROJETDERECHERCHE ORDER BY IDProjet DESC";
        $perso = $bdd->query($sql);
        $line = $perso->fetch(PDO::FETCH_ASSOC);
        $IDProjet = $line['IDProjet'];
        $Titre = $line['Titre'];

        echo "<h3><a href='../Formulaires/jointurePersonnelProjet.php?ID=$IDProjet'> Inscrire des participants au projet: $Titre</a></h3>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }


}
?>

