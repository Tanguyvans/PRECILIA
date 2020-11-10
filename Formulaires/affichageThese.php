<?php
    require "../config.php";
    try{
        $bdd = new PDO($dsn, $username, $password);

        $sql = "SELECT * FROM These";
        $resultat = $bdd->query($sql);

        echo "le nombre de these dans la base de donnees est : ".$resultat->rowCount().'</strong>';
        echo "<br>";
        echo "<br>";
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            $IDThese = $ligne['IDThese'];
            $Titre = $ligne['Titre'];
            $DateDebut = $ligne['DateDebut'];
            $DateFin = $ligne['DateFin'];
            $Description = $ligne['Description'];
            $CollaborateurAcademique = $ligne['CollaborateurAcademique'];
            $CollaborateurIndustrielle = $ligne['CollaborateurIndustrielle'];
            $NumeroContact = $ligne['NumeroContact'];
            $MotCle1 = $ligne['MotCle1'];
            $MotCle2 = $ligne['MotCle2'];
            $DateDefence = $ligne['DateDefence'];
            $IDPMatricule = $ligne['IDPMatricule'];
            echo "$IDThese, $Titre, $DateDebut, $DateFin, $Description, $CollaborateurAcademique, $CollaborateurIndustrielle, 
                  $NumeroContact, $MotCle1, $MotCle2, $DateDefence, $IDPMatricule";
        }
    }
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>