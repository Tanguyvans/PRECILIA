<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM tfe";
    $resultat = $bdd->query($sql);

    echo "le nombre de these dans la base de donnees est : ".$resultat->rowCount().'</strong>';
    echo "<br>";
    echo "<br>";
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
    {
        $IDTFE = $ligne['IDTFE'];
        $Titre = $ligne['Titre'];
        $DateDebut = $ligne['DateDebut'];
        $DateFin = $ligne['DateFin'];
        $CollaborateurAcademique = $ligne['CollaborateurAcademique'];
        $NumeroContact = $ligne['NumeroContact'];
        $MotCle1 = $ligne['MotCle1'];
        $MotCle2 = $ligne['MotCle2'];
        $IDPMatricule = $ligne['IDPMatricule'];
        $IDEMatricule = $ligne['IDEMatricule'];

        echo "$IDTFE, $Titre, $DateDebut, $DateFin, $CollaborateurAcademique, 
                  $NumeroContact, $MotCle1, $MotCle2, $IDPMatricule, $IDEMatricule";
    }
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>