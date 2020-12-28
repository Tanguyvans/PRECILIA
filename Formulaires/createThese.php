<?php

require "../config.php";
$bdd = new PDO($dsn, $username, $password);

?>

<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">

    <label for="DateDebut">Date de début</label>
    <input type="date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="date" name="DateFin" id="DateFin">

    <label for="Description">Description</label>
    <textarea rows="5" name="Description" ></textarea>
    <!--<input type="textarea" name="Description" id="Description">-->

    <label for="CollaborateurAcademique">Collababorateur académique</label>
    <input type="text" name="CollaborateurAcademique" id="CollaborateurAcademique">

    <label for="CollaborateurIndustrielle">Collaborateur industrielle</label>
    <input type="text" name="CollaborateurIndustrielle" id="CollaborateurIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="number" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="DateDefence">Date de défense</label>
    <input type="date" name="DateDefence" id="DateDefence">

    <?php
      $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM PERSONNEL');
      foreach ($result as $row) {
        $IDPM[] = array('IDPMatricule' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
      }
    ?>

    <label for="IDPMatricule">IDPMatricule</label>

    <!--========== Input IDPMatricule ==============-->
    <select name="IDPMatricule" id="IDPMatricule">
      <option value="">Select one</option>
      <?php foreach ($IDPM as $test): ?>
      <option value="<?php print_r($test['IDPMatricule']); ?>"><?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
      <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if (isset($_POST['submit'])) {

    try {

        $Titre  = $_POST['Titre'];
        $DateDebut = $_POST['DateDebut'];
        $DateFin = $_POST['DateFin'];
        $Description = $_POST['Description'];
        $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
        $CollaborateurIndustrielle  = $_POST['CollaborateurIndustrielle'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1 = $_POST['MotCle1'];
        $MotCle2 = $_POST['MotCle2'];
        $DateDefence = $_POST['DateDefence'];
        $IDPMatricule = $_POST['IDPMatricule'];

        if ($DateFin == NUll){
            $DateFin = NULL;
        }

        $sql = "INSERT INTO THESE (IDThese, Titre, DateDebut,DateFin,Description,CollaborateurAcademique,CollaborateurIndustrielle,NumeroContact,MotCle1,MotCle2,DateDefence,IDPMatricule )
        VALUES (NULL,'$Titre','$DateDebut','$DateFin','$Description','$CollaborateurAcademique','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$DateDefence','$IDPMatricule')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout réussi à la base de données<br>";

        $sql = "SELECT IDThese, Titre FROM THESE ORDER BY IDThese DESC";
        $perso = $bdd->query($sql);
        $line = $perso->fetch(PDO::FETCH_ASSOC);
        $IDThese = $line['IDThese'];
        $Titre = $line['Titre'];

        echo "<h3><a href='../Formulaires/jointurePromoThese.php?ID=$IDThese'> Inscrire des participants au projet: $Titre</a></h3>";


    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

