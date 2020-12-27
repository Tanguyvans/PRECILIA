<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {

    try {

        $DateDebut = $_POST['DateDebut'];
        $DateFin=$_POST['DateFin'];
        $Description=$_POST['Description'];
        $CollaborateurAcademique = $_POST['CollaborateurAcademique'];
        $CollaborateurIndustrielle  = $_POST['CollaborateurIndustrielle'];
        $NumeroContact=$_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $IDPMatricule=$_POST['IDPMatricule'];

        if ($DateFin == NUll){
            $DateFin = NULL;
        }

        $sql = "INSERT INTO STAGEDERECHERCHE (IDStageRecherche, DateDebut, DateFin , Description, CollaborateurAcademique, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule)
			VALUES (NULL,'$DateDebut','$DateFin','$Description','$CollaborateurAcademique','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$IDPMatricule')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>
<link rel="stylesheet" href="../css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="DateDebut">Date de début</label>
    <input type="date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="date" name="DateFin" id="DateFin">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

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


    <!--========== connexion PERSONNEL et remplissage d'une liste ==============-->
    <?php
      $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM PERSONNEL');
      foreach ($result as $row) {
        $IDPM[] = array('IDPMatricule' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
      }
    ?>

    <label for="IDPMatricule">IDPMatricule</label>

    <!--========== Input IDPMatricule ==============-->
    <p>
      <select name="IDPMatricule" id="IDPMatricule">

      <option value="">Select one</option>
      <?php foreach ($IDPM as $test): ?>
      <option value="<?php print_r($test['IDPMatricule']); ?>"><?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
      <?php endforeach; ?>
      </select>
    </p>


    <input type="submit" name="submit" value="Submit">
</form>

