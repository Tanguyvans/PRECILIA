<?php

if (isset($_POST['submit'])) {
    require "../config.php";

    try{
        $bdd = new PDO($dsn, $username, $password);

        $sql = "SELECT * FROM These";
        $resultat=$base->query($sql);
        echo "le nombre de clients dans la base de donnees est : ".$resultat->rowCount().'</strong>';
        echo "<br>";
        echo "<br>";
        while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
        {
            $IDThese = $ligne['Idclient'];
            $Titre = $ligne['Nom'];
            $DateDebut = $ligne['Prenom'];
            $DateFin = $ligne['Adresse'];
            $Description = $ligne['CodePostal'];
            $CollaborateurAcademique = $ligne['Ville'];
            $CollaborateurIndustrielle = $ligne['Email'];
            $NumeroContact = $ligne['Idclient'];
            $MotCle1 = $ligne['Idclient'];
            $MotCle2 = $ligne['Idclient'];
            DateDefence = $ligne['Idclient'];
            $IDPMatricule = ;
            echo "$id -Nom : $nom, Prénom : $prenom, Adresse : $Adresse, Code postale : $CodePostale, Ville : $Ville, Email : $Email <br> <strong> <a href='suppresion.php?chkid=$id'>Delete</a></strong><br/>";
        }
    }
    catch (Exception $e){
    //message en cas d'erreur
        die('Erreur : '.$e->getMessage());
    }
?>