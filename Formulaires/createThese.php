<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try {

        $bdd = new PDO($dsn, $username, $password);

        $IDThese = $_POST['IDThese'];
        $Titre  = $_POST['Titre'];
        $DateDebut = $_POST['DateDebut'];
        $DateDebut_new = date('Y-m-d', strtotime($DateDebut));

        $DateFin=$_POST['DateFin'];
        $DateFin_new = date('Y-m-d', strtotime($DateFin));

        $Description=$_POST['Description'];
        $CollaborationAcademique = $_POST['CollababorationAcademique'];
        $CollaborationIndustrielle  = $_POST['CollaborationIndustrielle'];
        $NumeroContact=$_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $DateDefence=$_POST['DateDefence'];
        $DateDefence_new = date('Y-m-d', strtotime($DateDefence));
        $IDPMatricule=$_POST['IDPMatricule'];


        $sql = "INSERT INTO THESE (IDThese, Titre, DateDebut,DateFin,Description,CollaborationAcademique,CollaborationIndustrielle,NumeroContact,MotCle1,MotCle2,DateDefence,IDPMatricule )
			VALUES ('$IDThese','$Titre','$DateDebut_new','$DateFin_new','$Description','$CollaborationAcademique','$CollaborationIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$DateDefence_new','$IDPMatricule')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout réussi à la base de données<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "../templates/header.php" ?>
<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDThese">Identifiant de la thèse</label>
    <input type="number" name="IDThese" id="IDThese">

    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">

    <label for="DateDebut">Date de début</label>
    <input type="date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="date" name="DateFin" id="DateFin">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

    <label for="CollaborationAcademique">Collababoration académique</label>
    <input type="text" name="CollaborationAcademique" id="CollaborationAcademique">

    <label for="CollaborationIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaborationIndustrielle" id="CollaborationIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="number" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="DateDefence">Date de défense</label>
    <input type="date" name="DateDefence" id="DateDefence">

    <label for="IDPMatricule">IDPMatricule</label>
    <input type="number" name="IDPMatricule" id="IDPMatricule">

    <input type="submit" name="submit" value="Submit">

</form>

<a href="../index.php">Retour en arrière</a>

<?php include "../templates/footer.php" ?>
