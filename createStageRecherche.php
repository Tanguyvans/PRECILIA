<?php

if (isset($_POST['submit'])) {
    //require "../config.php";

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=PRECILIA', 'root', 'root');
        echo "Connection réussie avec la base de données<br>";
        //$bdd = new PDO($dsn, $username, $password);

        $IDStageRecherche = $_POST['IDStageRecherche'];
        $DateDebut = $_POST['DateDebut'];
        $DateFin=$_POST['DateFin'];
        $Description=$_POST['Description'];
        $CollaborationAcademique = $_POST['CollababorationAcademique'];
        $CollaborationIndustrielle  = $_POST['CollaborationIndustrielle'];
        $NumeroContact=$_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $IDPMatricule=$_POST['IDPMatricule'];


        $sql = "INSERT INTO STAGE DE RECHERCHE (IDStageRecherche, DateDebut, DateFin , Description, CollababorationAcademique, CollaborationIndustrielle,NumeroContact, MotCle1, MotCle2, IDPMatricule)
			VALUES ('$IDStageRecherche','$DateDebut','$DateFin','$Description','$CollaborationAcademique','$CollaborationIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$IDPMatricule')";



        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

<?php include "templastes/header.php" ?>
<link rel="stylesheet" href="css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDStageRecherche">Identifiant du stage de recherche</label>
    <input type="number" name="IDStageRecherche" id="IDStageRecherche">

    <label for="DateDebut">Date de début</label>
    <input type="date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="date" name="DateFin" id="DateFin">

    <label for="CollababorationAcademique">Collababoration académique</label>
    <input type="text" name="CollababorationAcademique" id="CollababorationAcademique">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

    <label for="CollaborationIndustrielle">Collaboration industrielle</label>
    <input type="text" name="CollaborationIndustrielle" id="CollaborationIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="number" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="IDPMatricule">IDPMatricule</label>
    <input type="number" name="IDPMatricule" id="IDPMatricule">
    

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Retour en arrière</a>

<?php include "templates/footer.php" ?>