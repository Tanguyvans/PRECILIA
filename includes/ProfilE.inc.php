<?php
require "../config.php";
$Matricule = $_SESSION["Esession"];

try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM ETUDIANT WHERE IDEMatricule= '$Matricule'";
    $resultat = $bdd->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $Nom = $row['Nom'];
    $Prenom = $row['Prenom'];
    $Email = $row['Email'];
    $Annee = $row['Annee'];


}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>