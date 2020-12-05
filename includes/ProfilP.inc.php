<?php
require "../config.php";
$Matricule = $_SESSION["Psession"];

try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM PERSONNEL WHERE IDPMatricule= '$Matricule'";
    $resultat = $bdd->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $Nom = $row['Nom'];
    $Prenom = $row['Prenom'];
    $Email = $row['Email'];
    $Telephone = $row['Telephone'];
    $Grade = $row['Grade'];

}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>